<?php


use Hp\SpaceExplorer\EmailHandler;
use Hp\SpaceExplorer\UImessage;

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
                "succes" => "0",
                "image" => ModelChild::getPdo()->query("SELECT image, Idprofil FROM image WHERE Idprofil = " . $_SESSION['id']),
                "infos" => Model::getPdo()->query("SELECT pseudo, email, description, Country, Age FROM user_data WHERE Id=" .  $id),
               
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
                            $_SESSION['succes'] = "Description ajouté";
                            header("Location:" . URL . "Compte/indexAccount");
                            exit;
                        } else {
                            Model::getPdo()->query("INSERT INTO user_data (description) :description WHERE Id = $id ", $donne);
                            $_SESSION['succes'] = "Description ajouté";
                            
                            header("Location:" . URL . "Compte/indexAccount");
                            exit;
                        }
                    } else {
                        $_SESSION["err_mode"] = "Veuillez remplir le champs nécessaire";
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

                        $extention_allowed = array("jpg",  "jpeg", "png");

                        if (in_array(
                            $extention_Of_File,
                            $extention_allowed,
                            true
                        )) {

                            if ($file_response === 0) {
                                if ($file_size < 5000000)
                                    $new_file_name  = uniqid("", true) . "." . $extention_Of_File;

                                $imagetosend = file_get_contents($file_tmp);
                                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
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
                                    $_SESSION["succes"] = "L'image à belle est bien était insérer";
                                    header("Location:" . URL ."Compte/indexAcount");
                                    exit;
                                    
                                } else {
                                    $request = $bdd->prepare("UPDATE image SET image = :imagetosend, Name = :Name WHERE Idprofil = " . $_SESSION['id']);
                                    $request->bindParam(":imagetosend", $imagetosend);
                                    $request->bindParam(":Name", $_FILES['image_profil']['name']);
                                    $request->execute();
                                    $request->closeCursor();

                                    $_SESSION["succes"] = "L'image à belle est bien était modifier";
                                    
                                   
                                    header("Location:" . URL ."Compte/indexAccount");
                                    exit;
                                }
                            } else {
                                $_SESSION["err_mode"] = "Une erreur inconnue est survenue veuillez réesayer plus tard";
                                header("Location:" . URL . "Compte/indexAccount");

                                exit;
                            }
                        } else {
                            $_SESSION["err_mode"] = "Le site n'accepte que les images de type JPG, JPEG ou PNG";
                            header("Location:" . URL ."Compte/indexAccount");
                            exit;

                        }
                    }
                }
            }

            $this->setdata($data);

            $this->render("mon_Compte");
        } else {
            $_SESSION["err_mode"] = "Il faut posseder un Compte afin d'acceder a cette page";
            header("Location:" . URL . "Acceuil/index");
            exit;
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
      
    }
    public function deconection()
    {
        session_start();
        session_unset();
        $_SESSION["deco"] = "deco";

        echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Acceuil/index');</script>";
    }


    /**
     * @param 
     */
    public function mot_de_passe_oublie(){
        
        $data = [
            "title" => "Mot de passe oublié ",
            "err_mode" => "0"
        ];
        if(isset($_POST) && !empty($_POST)){
            
            $email = trim(htmlspecialchars($_POST['email']));
            
            $donne = [
                ":email" => $_POST["email"],

            ];

            $check_if_exist = Model::getPdo()->query("SELECT COUNT(*) FROM user_data WHERE email = :email ", $donne);

            var_dump($check_if_exist);

            if($check_if_exist > 0 ){
                echo "Email trouvé"; 
                EmailHandler::sendEmail("abderahmane.adjali@live.fr","Test","Test");

                
            }
            die();
        }

    $this->setdata($data);
    $this->render("mot_de_passe_oublie");
    }
}