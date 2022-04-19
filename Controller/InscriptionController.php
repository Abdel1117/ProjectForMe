<?php


/**
 * Controller For The Registration
 * Read URL to call the needed Methode
 * @return None
 */
class InscriptionController extends Controller
{
    public $meta = "Inscivez vous sur notre site web ou nous parlons d'astrnonomie et d'éspace, ce faisant vous pourrez poster dans notre section forum";

    public function inscription()
    {
        $data = [
            "title" => "Inscription",
            "meta" => $this->meta,
            "err_mode" => "0"

        ];
        if (isset($_POST) && !empty($_POST)) {
            if (
                isset($_POST['user_Name'])
                && !empty($_POST['user_Name'])
                && isset($_POST['email'])
                && !empty($_POST['email'])
                && isset($_POST['age'])
                && !empty($_POST['age'])
                && isset($_POST['password'])
                && !empty($_POST['password'])
                && isset($_POST['country'])
                && !empty($_POST['country'])

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

                $donnes = [
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
                    $request = Model::getPdo()->query("SELECT * FROM user_data 
                    WHERE pseudo =:pseudo OR email =:email", $donne);

                    if (empty($request)) {
                        $request2 = Model::getPdo()->query("INSERT INTO user_data 
                        (pseudo, email, Age, Country,password) 
                        VALUES (:user_Name, :email, :age, :country, :password)", $donnes);

                        header("Location:" . URL . "acceuil/index");
                        exit;
                        
                    } else {
                        $data["err_mode"] = "Le pseudo ou l'email existe déja";
                    }
                } else {
                    $data["err_mode"] = "Veuillez tapez un Pseudo valide, le pseudo dois contenir une majuscule";
                    
                };
            } else {
                $data["err_mode"] = "Veuillez remplir tous les champs du formulaire";
                
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