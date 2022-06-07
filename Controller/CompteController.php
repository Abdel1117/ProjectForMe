<?php


use Hp\SpaceExplorer\EmailHandler;
use Hp\SpaceExplorer\UImessage;
use Hp\SpaceExplorer\TokenHandler;

/**
 * Controller For Managing the Account of the user
 * 
 */
class CompteController extends Controller
{
    public $meta = "Gerer votre compte sur cette page, ici vous pourrez choisir l'image qui apparaitra sur le Forum ainsi qu'une description sur vous";
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
                "meta" => $this->meta,
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
            "err_mode" => "0",
            "meta" => $this->$meta
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


    public function passwordLost(){


        $data = [ 
            "title" => "Changement de Mot de passe",
            "meta" => $this->meta,
            
        ];
      
        if(isset($_GET['selector']) && isset($_GET['validator'])){
            
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];

            $verif = [
                ":selector" => $_GET["selector"],
                ":validator" => $_GET['validator']
            ];


            $check_validator = Model::getPdo()->query("SELECT * FROM passwordresset WHERE pwResetSelector = :selector AND pwResetToken = :validator ",$verif);
           

            $expire = $check_validator[0]->pwResetExpire;
            $date_now = date("U");
            $result =  $date_now - $expire ;
            
            if($result){
                if(isset($_POST['passwordChanged']) && isset($_POST['secondPassword'])){

                        $password = trim(htmlspecialchars($_POST['passwordChanged']));
                        $password_verifie = trim(htmlspecialchars($_POST['secondPassword']));

                        if(strlen($password) >= 8 
                        && preg_match("^(?=.*[A-Z])(?=.*\d).{8,20}$^",$password)
                        && strlen($password_verifie)>=8
                        && preg_match("^(?=.*[A-Z])(?=.*\d).{8,20}$^", $password_verifie)
                        
                        ){
                            if($password === $password_verifie){
                                
                                $data_email = [":email" => $check_validator[0]->pwResetEmail];
                                
                                $donne = [
                                    "email" => $check_validator[0]->pwResetEmail,
                                    ":password_reset" => password_hash($password,PASSWORD_DEFAULT)
                                ];
                                Model::getPdo()->query("UPDATE user_data set password = :password_reset WHERE email = :email" , $donne);
                                Model::getPdo()->query("DELETE FROM passwordresset WHERE :email = pwResetEmail", $data_email);
                                $_SESSION["succes"] = "Votre mot de passe à bien était changer";
                                header("Location:" . URL . "Acceuil/index");
                            }
                            else{
                               
                                $_SESSION["err_mode"] = "Vos deux mot de passe ne sont pas identique ! ";
                            }
                        }
                        else{
                            $_SESSION["err_mode"] = "Votre Mot de passe dois contenir au moins 8 charactères avec une majuscule et au moins un chiffre";
                        }

                        
                }
                $this->setdata($data);
                $this->render("mot_de_passe_reset"); 
            }
            else{
                $_SESSION["err_mode"] = "Vous ne pouvez changer de mot passe car une demande à déja effectuer il y à moins de 30 minutes ";
            }
        }
    }


    public function mot_de_passe_oublie(){
        
        $data = [
            "title" => "Mot de passe oublié ",
            "meta" => $this->meta,
            "err_mode" => "0"
        ];
        if(isset($_POST) && !empty($_POST)){
            
            $email = trim(htmlspecialchars($_POST['email']));
            
            $donne = [
                ":email" => $_POST["email"],

            ];

            $check_if_exist = Model::getPdo()->query("SELECT COUNT(email) as count FROM user_data WHERE email = :email", $donne);

            if($check_if_exist[0]->count > 0 ){

                $if_token_exist = Model::getPdo()->query("SELECT COUNT(*) FROM passwordresset WHERE pwResetEmail = :email", $donne);                                

                $token = bin2hex(random_bytes(8));;
                $selector = bin2hex(random_bytes(32));
                $expire = date("U") + 1800;

                $donne = [
                    ":email" => $_POST["email"],
                    ":selector" => $selector,
                    ":token" => $token,
                    ":expire" => $expire
                ];

               
                $url = URL . "compte/passwordLost?selector=".$selector."&validator=".$token;

                $check = Model::getPdo()->query("SELECT * FROM user_data INNER JOIN passwordresset ON user_data.email = passwordresset.pwResetEmail WHERE email = '$email'");

               
                if(empty($check)){ 
                
                Model::getPdo()->query("INSERT INTO passwordresset (pwResetEmail, pwResetSelector, pwResetToken, pwResetExpire) VALUES (:email, :selector, :token, :expire)",$donne);

                $message_mail = "Vous avez demandé une réinitialisation de mot de passe, veuillez cliquer sur ce lien afin de pouvoir le changer " . $url ;


                EmailHandler::sendEmail($donne[':email'],"Demande de Nouveau mot de passe", $message_mail);   


                $_SESSION['succes'] = "Nous allons vous envoyer un mail avec un lien afin de pouvoir changer votre mot de passe perdu ! ";


               }
               else{
                    $expire = $check[0]->pwResetExpire;
                    $date_now = date("U");

                    if($expire <= $date_now){

                        $user_data = [
                            ":email" => trim(htmlspecialchars($_POST['email']))
                        ];
                        Model::getPdo()->query("DELETE FROM passwordresset WHERE :email = pwResetEmail" ,$user_data);
                        Model::getPdo()->query("INSERT INTO passwordresset (pwResetEmail, pwResetSelector, pwResetToken, pwResetExpire) VALUES (:email, :selector, :token, :expire)",$donne);

                        $message_mail = "Vous avez demandé une réinitialisation de mot de passe, veuillez cliquer sur ce lien afin de pouvoir le changer " . $url ;
        
        
                        EmailHandler::sendEmail($donne[':email'],"Demande de Nouveau mot de passe", $message_mail);   
        
        
                        $_SESSION['succes'] = "Nous allons vous envoyer un mail avec un lien afin de pouvoir changer votre mot de passe perdu ! ";
        
        
                    }else{
                        $_SESSION["err_mode"] = "Vous ne pouvez pas effectuer plusieurs fois votre demande de mot de passe veuillez attendre 20 min après votre dérnière demande";
                        
                    }
                }
                
                    
                
            }else{
                $_SESSION['err_mode'] = "L'adresse email que vous nous avez indiqué n'éxiste pas";
                header("Location:" . URL . "Compte/mot_de_passe_oublie");
                die();
            }
            
        }

    $this->setdata($data);
    $this->render("mot_de_passe_oublie");
    }
}