<?php


/**
 * Controller for the Acceuil
 * Read URL and call the method needed
 * 
 */
class AcceuilController extends Controller
{

    public function index()
    {
        
        $data = [
            "title" => "Accueil",
            "Contenue" => Model::getPdo()->query("SELECT * FROM space_news ORDER BY date_news DESC")
            
        ];
        $this->setdata($data);
        $this->render("acceuil");
    }
    /**
     * Page of Login
     */
    public function login()
    {
        $data = [
            "title" => "Login",
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
                    $data["err_mode"] = "pseudo_inccorect";
                    
                } else {
                    $password_from_database = $request[0]->password;

                    if (password_verify($password_send, $password_from_database)) {
                        session_start();
                        $_SESSION['pseudo'] = $username_send;
                        $_SESSION['email'] =  $request[0]->email;
                        $_SESSION['age'] =    $request[0]->Age;
                        $_SESSION['id'] =     $request[0]->Id;  
                        $_SESSION['role'] = $request[0]->role;

                        echo "<script>window.location.replace('http://space-explorer.fr/index.php?p=Acceuil/index');</script>";
                    } else {
                        $data["err_mode"] = "mot_de_passe_inccorect";

                    }
                }
            }else {
                $data["err_mode"] = "aucun_champs_remplie";
            }
        } 
        $this->setdata($data);
        $this->render("login");
    }

    public function newsSolo($id = null)
    {

        if ($id != null) {

            $data = [
                "title" => "News" . $id,
                "contenue" => Model::getPdo()->query("SELECT * FROM space_news WHERE id =" . $id)
            ];
        }

        $this->setdata($data);
        $this->render("NewsSolo");
    }

    public function mentionsLegales()
    {
        $data = [
            "title" => "Mentions Legales"
        ];
        $this->setdata($data);
        $this->render("Mentions_Legales");
    }
    public function contact()
    {
        $data = [
            "title" => "Contactez Nous"
        ];
        $this->setdata($data);
        $this->render("Contact");
    }
}
