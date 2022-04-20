<?php

/**
 * Controller For Managing the Account of the user
 * 
 */
class CompteController extends Controller
{

    /**
     * IndexAccount Homepage of user DashBoard
     * Manage Description and ImageProfile
     */
    public function indexAccount()
    {
        //From here we just check if the session_user isset to allow the acces of the page
        session_start();
        if (isset($_SESSION['pseudo'])) {
            $id = $_SESSION['id'];
            $data = [
                "title" => "Mon Compte",
                "err_mode" => "0",
                "image" => ModelChild::getPdo()->query("SELECT image, Idprofil FROM image WHERE Idprofil = " . $_SESSION['id']),
                "infos" => Model::getPdo()->query("SELECT pseudo, email, description, Country, Age FROM user_data WHERE Id=" .  $id),
                "favorite" => Model::getPdo()->query("SELECT id_user id_image FROM favorite INNER JOIN space_news ON favorite.id_image = space_news.id WHERE id_user = $id")
            ];

            //Here we check whenevere the Page is charged if they is a Post data loaded
            //If yes we check the value of the button if its SendImage we call the function to add a new Image profile if its addDesc we add a new Description of the user
            if (!empty($this->donnee)) {

                if (isset($_POST['description'])) {
                    $id = $_SESSION['id'];
                    $desc = htmlspecialchars($_POST['description']);
                    $donne = [
                        "description" => $desc
                    ];
                    if (
                        strlen(trim($desc)) > 15
                        && strlen(trim($desc)) <= 4000
                    ) {

                        $a = Model::getPdo()->query("SELECT description FROM user_data WHERE id = " . $id);

                        if ($a = !NULL) {
                            Model::getPdo()->query("UPDATE user_data set description = :description WHERE Id = $id ", $donne);
                            echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=compte/indexAccount');</script>";
                        } else {
                            Model::getPdo()->query("INSERT INTO user_data (description) :description WHERE Id = $id ", $donne);
                            echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=compte/indexAccount');</script>";
                        }
                    } else {
                        $data["err_mode"] = "Veuillez remplir le champs nécessaire";
                        $this->setdata($data);
                        $this->render("mon_Compte");
                    }
                } else {

                    if (!empty($_POST)) {
                        $file_name = $_FILES["image_profil"]['name'];
                        $file_type = $_FILES["image_profil"]['type'];
                        $file_tmp = $_FILES["image_profil"]['tmp_name'];
                        $file_response = $_FILES["image_profil"]['error'];
                        $file_size = $_FILES["image_profil"]["size"];

                        $file_ext =  explode(".", $file_name);
                        $extention_Of_File = strtolower(end($file_ext));

                        $extention_allowed = array("jpg", "pdf", "jpeg", "png");

                        if (in_array(
                            $extention_Of_File,
                            $extention_allowed,
                            true
                        )) {

                            if ($file_response === 0) {
                                if ($file_size < 5000000)
                                    $new_file_name  = uniqid("", true) . "." . $extention_Of_File;

                                $imagetosend = file_get_contents($file_tmp);
                                $bdd = new PDO('mysql:host=flex.o2switch.net;dbname=uqiv5705_Space-explorer;charset=utf8', 'uqiv5705', '5ye8gtfdHDUw');
                                $id = $_SESSION['id'];
                                $requete = $bdd->prepare("SELECT COUNT(*) FROM image WHERE Idprofil = $id");
                                $requete->execute();
                                $stm = $requete->fetchAll();

                                if ($stm[0][0] < 1) {

                                    $request = $bdd->prepare("INSERT INTO image (image, Name, Idprofil) VALUES (:image, :Name, :Idprofil)");
                                    $request->bindParam(":image", $imagetosend);
                                    $request->bindParam(':Name', $_FILES['image_profil']['name']);
                                    $request->bindParam(':Idprofil', $_SESSION["id"]);
                                    $request->execute();
                                    $request->closeCursor();
                                    echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=compte/indexAccount');</script>";
                                } else {
                                    $request = $bdd->prepare("UPDATE image SET image = :imagetosend, Name = :Name WHERE Idprofil = " . $_SESSION['id']);
                                    $request->bindParam(":imagetosend", $imagetosend);
                                    $request->bindParam(":Name", $_FILES['image_profil']['name']);
                                    $request->execute();
                                    $request->closeCursor();
                                    echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=compte/indexAccount');</script>";
                                }
                            } else {
                                $data["err_mode"] = "Une erreur inconnue est survenue veuillez réesayer plus tard";
                            }
                        } else {
                            $data["err_mode"] = "Le site n'accepte que les images de type JPG, PDF, JPEG ou PNG";

                        }
                    }
                }
            }

            $this->setdata($data);

            $this->render("mon_Compte");
        } else {
            $data["err_mode"] =  "Il faut posseder un Compte afin d'acceder a cette page";
        }
    }
    /**
     * Function to get the image sended by the users
     * Use of the global $_FILES
     * Check if the extention are JPEG JPG PNG or PDF
     * File must not exceed 5 MO
     */
    public function addImageProfil()
    {
    }
    public function addDesc()
    {
        session_start();
        $data = [
            "err_mode" => "0"
        ];
        if (!empty($this->donnee)) {
            $id = $_SESSION['id'];
            $desc = htmlspecialchars($_POST['description']);
            $donne = [
                "description" => $desc,
                
            ];
            if (
                strlen(trim($desc)) > 15
                && strlen(trim($desc)) <= 4000
            ) {

                $a = Model::getPdo()->query("SELECT description FROM user_data WHERE id = " . $id);

                if ($a = !NULL) {
                    Model::getPdo()->query("UPDATE user_data set description = :description WHERE Id = $id ", $donne);
                    header("Location:" . URL . "Compte/indexAccount");
                } else {
                    Model::getPdo()->query("INSERT INTO user_data (description) :description WHERE Id = $id ", $donne);
                    echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=indexAccount');</script>";
                }
            } else {
                $data["err_mode"] = "Veuillez remplir tous les champs nécessaire";
                $this->setdata($data);
                $this->render("mon_Compte");
            }
        }
    }

    /**
     * Add Favorite Image Article OR video to the accoutn
     * take the id of the specified object as parameter
     * Return VOID
     */
    public function addFavoriteImage($id = null)
    {
        session_start();
        if (!empty($_SESSION['pseudo'])) {

            $data = [
                ":id_user" => $_SESSION['id'],
                ":id_image" => $id
            ];
            $check = Model::getPdo()->query("SELECT * FROM favorite WHERE id_image = $id AND id_user =" .$_SESSION['id']);

            if(empty($check)){
                Model::getPdo()->query("INSERT INTO favorite (id_user, id_image) VALUES (:id_user, :id_image) ", $data);
                echo "<script>window.location.replace('https://space-explorer.fr/');</script>";
            }
            else{
                echo "<script>alert('Vous possédez déja cette article dans vos favoris');
                </script>" ;
                echo "<script>window.location.replace('https://space-explorer.fr/');</script>";
            }
        } else {
            echo "<script>alert('Vous possédez déja cette article dans vos favoris');
                </script>" ;
                echo "<script>window.location.replace('https://space-explorer.fr/');</script>";
        }
    }
    public function deconection()
    {
        session_start();
        session_unset();
        echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=Acceuil/index');</script>";
    }
}