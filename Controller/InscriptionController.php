<?php


/**
 * Controller For The Registration
 * Read URL to call the needed Methode
 * @return None
 */
class InscriptionController extends Controller
{

    public function inscription()
    {
        $data = [
            "title" => "Inscription",
            "err_mode" => "0"

        ];
        if (isset($_POST) && !empty($_POST)) {
            if (
                isset($_POST['user_Name'])
                && isset($_POST['email'])
                && isset($_POST['age'])
                && isset($_POST['password'])
                && isset($_POST['country'])
            ) {
                /**
                 * Creating Variable for the fields of the main Form to sign in
                 * 
                 */
                $userName =  htmlspecialchars(trim($_POST['user_Name']));
                $email =  htmlspecialchars(trim($_POST["email"]));
                $age = htmlspecialchars(trim($_POST["age"]));
                $password =  htmlspecialchars(trim(password_hash($_POST["password"], PASSWORD_DEFAULT)));
                $country =  htmlspecialchars(trim($_POST["country"]));

                $donne = [
                    ":user_Name" => $userName,
                    ":email" => $email,
                    ":age" => $age,
                    ":country" => $country,
                    ":password" => $password,
                ];

                if (
                    preg_match('/^[A-Za-z0-9_]+$/', $userName)
                    && filter_var($email, FILTER_VALIDATE_EMAIL)
                    && filter_var($age, FILTER_VALIDATE_INT)
                ) {

                    $donne = [
                        ":pseudo" => $userName,
                        ":email" => $email
                    ];
                    $request = Model::getPdo()->query("SELECT * FROM user_data WHERE pseudo =:pseudo OR email =:email", $donne);

                    if (empty($request)) {
                        $request2 = Model::getPdo()->query("INSERT INTO user_data (pseudo, email, Age, Country,password) VALUES (:user_Name, :email, :age, :country, :password)", $donne);
                        echo "Vous allez etre redirigez vers la page de login <a src=" . URL . "acceuil/index" . "> Acceuil</a>";
                        header("Location:" . URL . "acceuil/index");
                        exit;
                        
                    } else {
                        $data["err_mode"] = "err_mode_userName_Email_already_exist";
                    }
                } else {
                    $data["err_mode"] = "err_mode_userName_regexFalse";
                    
                };
            } else {
                $data["err_mode"] = "err_mode_field_empty";
                
            }
        }
        $this->setdata($data);
        $this->render("Inscription");
    }


    /**
     * Checking the FORM 
     */
    public function send()
    {
    }
}