<?php



/**
 * Controller For The Login
 * Read URL to call the needed Methode
 * @return None
 */
class LoginController extends Controller
{
    /**
     * Display the login Page
     */
    public function login()
    {
        $data = [
            "title" => "Login",
            "donne" => $this->donnee,
            "err_mode" => "0"
        ];
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username_send = htmlspecialchars($_POST['username']);
                $password_send = htmlspecialchars($_POST['password']);
                $donne = [
                    ":pseudo" => $username_send,
                ];

                $request = Model::getPdo()->query("SELECT * FROM user_data WHERE pseudo = :pseudo", $donne);

                if (empty($request)) {
                    echo "<h1> Pseudo Incorect veuillez reassayer sur le lien suivant <a href=" . URL . "Acceuil/login>ICI</a></h1>";
                    die();
                } else {
                    $password_from_database = $request[0]->password;

                    if (password_verify($password_send, $password_from_database)) {
                        session_start();
                        $_SESSION['pseudo'] = $username_send;
                        $_SESSION['email'] =  $request[0]->email;
                        $_SESSION['age'] =    $request[0]->Age;
                        $_SESSION['id'] =     $request[0]->Id;
                        $_SESSION['role'] = $request[0]->role;

                        header("location:" . URL . "acceuil/index");
                    } else {
                        echo "<h1> Mot de passe Incorect veuillez reassayer sur le lien suivant <a href=" . URL . "Acceuil/login>ICI</a></h1>";
                        die();
                    }
                }
            }
        } else {
            "Veuillez remplir les champs Pseudo et Mot de passe <a href=" . URL . "Acceuil/login>ICI</a></h1>";
        }
        $this->setdata($data);
        $this->render("login");
    }
    /**
     * Function for connecting the user to the site and check if the information are right
     * @Param string $pseudo
     * @Param string $password
     * 
     */
    public function checkLogin()
    {

    }

}