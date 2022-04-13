<?php



/**
 * Controller For The Forum
 * Read URL to call the needed Methode
 * @return None
 */
class ForumController extends Controller
{

    public function indexForum()
    {
        $data = [
            "title" => "Forum de discussion de Space Explorer",
            "post" => Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data ON user_data.Id = forum_discussion.Id_profil"),
            "hot_today" => Model::getPdo()->query("SELECT * FROM forum_discussion ORDER BY Date_post DESC LIMIT 5")
        ];
        if (!empty($_POST['order_by'])) {
            if ($_POST['order_by']) {
                $data = [
                    "title" => "Forum de discussion",
                    "post" => Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data ON user_data.Id = forum_discussion.Id_profil ORDER BY     Date_post " .  $_POST['order_by']),
                    "hot_today" => Model::getPdo()->query("SELECT * FROM forum_discussion ORDER BY Date_post DESC LIMIT 5")
                ];
            } else {
                $data = [
                    "title" => "Forum de discussion",
                    "post" => Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data ON  user_data.Id = forum_discussion.Id_profil"),


                ];
            }
            $this->setdata($data);
            $this->render("forum");
        } else {
            $this->setdata($data);
            $this->render("forum");
        }
    }

    public function OrderBy()
    {
        if (!empty($_POST['order_by'])) {
            if ($_POST['order_by']) {
                $data = [
                    "title" => "Forum de discussion",
                    "post" => Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data ON user_data.Id = forum_discussion.Id_profil ORDER BY Date_post " .  $_POST['order_by']),
                    "hot_today" => Model::getPdo()->query("SELECT * FROM forum_discussion ORDER BY Date_post DESC LIMIT 5")
                ];
            } else {
                $data = [
                    "title" => "Forum de discussion",
                    "post" => Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data ON  user_data.Id = forum_discussion.Id_profil"),


                ];
            }
            $this->setdata($data);
            $this->render("forum");
        }
    }

    public function ForumSolo($id = null)
    {

        $response = Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data
        ON forum_discussion.Id_profil = user_data.Id
        LEFT JOIN image ON user_data.Id = image.Idprofil
        WHERE Id_forum = :id", [":id" => $id]);

        $response_2  = Model::getPdo()->query("SELECT * FROM post 
        INNER JOIN user_data
        ON post.id_profil = user_data.Id
        LEFT JOIN image
        ON user_data.Id = image.Idprofil
        WHERE id_forum_discussion = :id", ["id" => $response[0]->Id_forum]);


        $image = Model::getPdo()->query('SELECT Name FROM image
        INNER JOIN post
        WHERE image.Idprofil  = post.id_profil');

        if (empty($image)) {
            $image = '<img class ="image_profil_compte" 
            src="../src/image/profil-astronaute-côté-banque-dillustrations_csp0954785.webp" 
            alt="Profil_image" />';
        }
        $data = [
            "title" => $response[0]->Titre,
            "Post" =>  $response,
            "Responses" => $response_2,
            "image"  => $image
        ];

        /*Check if they is a post request to handle the submision */
        if (isset($_POST['answear']) && !empty($_POST['answear'])) {
            $post = trim(htmlspecialchars($_POST['answear']));

            $donne = [
                "profil" => $_SESSION['id'],
                "id_forum" => $id,
                "reponse" => htmlspecialchars($post)
            ];
            if (
                isset($_SESSION['id'])
                && isset($_SESSION['pseudo'])
            ) {
                if (strlen($post) > 3) {

                    Model::getPdo()->query("INSERT INTO post (id_profil, id_forum_discussion, post) 
                    VALUES(:profil, :id_forum, :reponse)", $donne);
                    
                    echo "<script>window.location.replace('http://space-explorer.fr/Forum/ForumSolo/$id');</script>";
                } else {
                    echo "Veuillez tapez un message suffisament longs pour que l'on puisse vous comprendre";
                }
            }
        }

        $this->setdata($data);
        $this->render("ForumSolo");
    }

    public function addPost()
    {
        session_start();
        if (
            isset($_SESSION['id'])
            && isset($_SESSION['pseudo'])
        ) {
            $data = [
                "title" => "Ajoutez Votre propre Sujet"
            ];


            if (!empty($_POST)) {
                if (
                    isset($_SESSION['id'])
                    && isset($_SESSION['pseudo'])
                ) {
                    $title = trim(htmlspecialchars($_POST['Title_Forum']));
                    $text_to_send = trim(htmlspecialchars($_POST['Text_Forum']));
                    $id = $_SESSION['id'];
                    $data = [
                        "Titre" => $title,
                        "Discussion" => $text_to_send,
                        "Id_profil" => $id
                    ];
                    if (
                        strlen(trim($title)) > 5 &&
                        strlen(trim($text_to_send)) > 10
                    ) {
                        Model::getPdo()->query(
                            "INSERT INTO forum_discussion 
                            (Titre, Discussion, Id_profil) 
                            VALUES (:Titre,:Discussion ,:Id_profil)",
                            $data
                        );
                        header("Location:" . URL . "Forum/indexForum");
                    } else {

                        echo "Veuillez tapez un tittre avec plus de 5 characteres et un texte avec au moins 15 characteres <a href=" . URL . "Forum/indexForum>Réessayer Ici</a>";
                    }
                } else {
                    echo "Il faut possedez un compte sur notre plateforme afin de pouvoir poster quelque chose <a href=" . URL . "Forum/indexForum>Réessayer Ici</a>";
                }
            }

            $this->setdata($data);
            $this->render("addPost");
        } else {

            header("Location:" . URL . "Forum/indexForum");
        }
    }

    public function addAnswer($id = null)
    {
        session_start();
        $post = trim(htmlspecialchars($_POST['answear']));

        $data = [
            "profil" => $_SESSION['id'],
            "id_forum" => $id,
            "reponse" => htmlspecialchars($post)
        ];
        if (
            isset($_SESSION['id'])
            && isset($_SESSION['pseudo'])
        ) {
            if (strlen($post) > 3) {

                Model::getPdo()->query("INSERT INTO post (id_profil, id_forum_discussion, post) VALUES(:profil, :id_forum, :reponse)", $data);
                header("location:" . URL . "Forum/ForumSolo/" . $id);
            } else {
                echo "Veuillez tapez un message suffisament longs pour que l'on puisse vous comprendre";
            }
        } else {
            echo "An Error as occured <a href=" . URL . "Forum/indexForum>Réessayer Ici</a>";
        }
    }
    public function sendPost()
    {
        session_start();
    }
    public function search()
    {

        if (!empty($_POST)) {
            $search =  trim(htmlspecialchars(ucfirst($_POST['recherche'])));
            $donne = [
                "recherche" => $search
            ];
            if (strlen($search) > 4) {
                $result = Model::getPdo()->query("SELECT * FROM forum_discussion INNER JOIN user_data ON user_data.Id = forum_discussion.Id_profil WHERE Titre = :recherche", $donne);

                if ($result >  0) {
                    $data = [
                        "title" => "Forum_discussion",
                        "post" => $result,
                        "hot_today" => Model::getPdo()->query("SELECT * FROM forum_discussion ORDER BY Date_post DESC LIMIT 5")
                    ];
                    $this->setdata($data);
                    $this->render('forum');
                } else {
                    echo "Aucun fil de discussion qui correspond désolè <a href=" . URL . "Forum/indexForum>Réessayer Ici</a>";
                }
            } else {
                echo "Pas assez d'info dans la recherche <a href=" . URL . "Forum/indexForum>Réessayer Ici</a> ";
            }
        } else {
            echo "Pas assez d'info dans la recherche <a href=" . URL . "Forum/indexForum>Réessayer Ici</a>";
        }
    }
}