<?php

use HP\SpaceExplorer\HTTPRequest;

/**
 * Controller for the Acceuil
 * Read URL and call the method needed
 * 
 */
class AcceuilController extends Controller
{
    public $meta = "Space-explorer est un site de type blog qui va parler d'astronomie, d'espace et de planète.Vous pourrez voir des video de type documentaire sur l'astronomie.";
    public function index()
    {
        if($this->displayByTag() == NULL){
            
            $data = [
                "title" => "Accueil",
                "meta" => $this->meta,
                "Contenue" => Model::getPdo()->query("SELECT * FROM space_news ORDER BY date_news ASC"),
                "Slider_accueil" => Model::getPdo()->query("SELECT Titre, image, resumé,id from space_news ORDER BY date_news DESC LIMIT 5"),
                "err_mode" => "0"
            ];
            $this->setdata($data);
            $this->render("acceuil");
        }else{
            $tag = $this->displayByTag();
            $donne = [
                ":tag" => $tag
            ];
            $data = [
                "title" => "Accueil",
                "meta" => $this->meta,
                "Contenue" => Model::getPdo()->query("SELECT * FROM space_news WHERE Tags = :tag ORDER BY date_news ASC",$donne),
                "Slider_accueil" => Model::getPdo()->query("SELECT Titre, image, resumé,id FROM space_news WHERE Tags = :tag ORDER BY date_news DESC LIMIT 5",$donne),
                
            ];
           
            $this->setdata($data);
            $this->render("acceuil");
        }
    }
    /**
     * Page of Login
     */
    public function login()
    {
        $data = [
            "title" => "Login",
            "meta" => $this->meta,
            "err_mode" => false
        ];
        if (!empty($this->donnee)) {
            if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                $username_send = htmlspecialchars($_POST['username']);
                $password_send = htmlspecialchars($_POST['password']);
                $donne = [
                    ":pseudo" => $username_send,
                ];

                $request = Model::getPdo()->query("SELECT * FROM user_data WHERE pseudo = :pseudo", $donne);

                if (empty($request)) {
                    $data["err_mode"] = "Votre Pseudo est incorrect";
                    
                } else {
                    $password_from_database = $request[0]->password;

                    if (password_verify($password_send, $password_from_database)) {
                        session_start();
                        $_SESSION['pseudo'] = $username_send;
                        $_SESSION['email'] =  $request[0]->email;
                        $_SESSION['age'] =    $request[0]->Age;
                        $_SESSION['id'] =     $request[0]->Id;  
                        $_SESSION['role'] = $request[0]->role;
                        $_SESSION['first_connect'] = true;
                        echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Acceuil/index');</script>";
                    } 
                    else {
                        $data["err_mode"] = "Votre Mot de passe est incorrect";

                    }
                }
            }else {
                $data["err_mode"] = "Veuillez remplir touts les champs nécessaire";
            }
        } 
        $this->setdata($data);
        $this->render("login");
    }

    public function newsSolo($id = null)
    {

        if ($id != null) {
            $title = Model::getPdo()->query("SELECT Titre FROM space_news WHERE id =" . $id);
            $data = [
                "contenue" => Model::getPdo()->query("SELECT * FROM space_news WHERE id =" . $id),
                "meta" => $this->meta,
                "title" => $title[0]->Titre
            ];
        }

        $this->setdata($data);
        $this->render("NewsSolo");
    }

    public function displayByTag(){
        if(isset($_POST["tags_display_article"]) && !empty($_POST["tags_display_article"])){
            return $_POST['tags_display_article'];
        }
    }

    public function mentionsLegales()
    {
        $data = [
            "title" => "Mentions Legales",
            "meta" => $this->meta
        ];
        $this->setdata($data);
        $this->render("Mentions_Legales");
    }
    public function politiqueDeConfidentialie(){
        $data = [
            "title" => "Politique de Confidentialité",
            "meta" => $this->meta
        ];
        $this->setdata($data);
        $this->render("PolitiqueDeConfidentialite");
    }


    public function contact()
    {
        $data = [
            "title" => "Contactez Nous",
            "meta" => $this->meta
        ];
        $this->setdata($data);
        $this->render("Contact");
    }
}
