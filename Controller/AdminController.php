<?php


/**
 * Admin Controller
 * Send to Dashboard 
 * You have ofcourse to be admin to access to this page that's why a session need to be started to check if the user who is loged is admin
 * This class handle the render of the dashBoard and the management of the content
 * @return None 
 */
class AdminController extends Controller
{

    public function index()
    {
        session_start();
        if (!empty($_SESSION['pseudo'])) {
            if ($_SESSION['role'] === "admin") {
                $data = [
                    "title" => "Bureau Administrative",
                    "admin" => Model::getPdo()->query("SELECT pseudo, email, age, Country FROM user_data"),
                    "users" => Model::getPdo()->query("SELECT Id, pseudo, email,Country, Age, role FROM user_data"),
                    "articles" => Model::getPdo()->query('SELECT id,Titre, news FROM space_news'),
                    "images" => Model::getPdo()->query('SELECT id, image FROM image_galerie'),
                    "videos" => Model::getPdo()->query('SELECT * FROM video_posted')

                ];

                $this->setdata($data);
                $this->render("indexAdmin");
            } else {
                echo "Vous n'êtes pas Admin ";
                die();
            }
        } else {
            echo "Vous n'êtes pas un admin";
            die();
        }
    }
    public function ban($id = null)
    {
        Model::getPdo()->query("DELETE FROM user_data WHERE id = :id", [":id" => $id]);
        header("location:" . URL . "Admin/index");
    }

    public function addAdmin($id = null)
    {
        Model::getPdo()->query("UPDATE user_data SET role = 'admin' WHERE id = :id", [":id" => $id]);
        header("location:" . URL . "Admin/index");
    }
    public function removeAddmin($id = null)
    {
        Model::getPdo()->query("UPDATE user_data SET role = 'user' WHERE id = :id", [":id" => $id]);
        header("location:" . URL . "Admin/index");
    }
    public function removeArticle($id = null)
    {
        Model::getPdo()->query('DELETE FROM space_news WHERE id = :id ', [":id" => $id]);
        header("location:" . URL . "Admin/index");
    }

    public function removeImage($id = null)
    {
        Model::getPdo()->query('DELETE FROM image_galerie WHERE id = :id ', [":id" => $id]);
        header("location:" . URL . "Admin/index");
    }
    public function addArticle()
    {
        session_start();
        $data = [
            "title" => "Ajoutez un article",
            "err_mode" => "0"
        ];
        if (isset($_POST) && !empty($_POST)) {
            $title_article = trim(htmlspecialchars($_POST['title_article']));
            $contenue_article = trim(htmlspecialchars($_POST['article_content']));
            $image_article1 = $_POST['link_image1'];
            $image_article2 = $_POST['link_image2'];
            $image_article3 = $_POST['link_image3'];
            $image_article4 = $_POST['link_image4'];
            $image_article5= $_POST['link_image5'];

                   
            if (
                strlen($title_article) > 5
                && strlen($contenue_article) > 200
                && !empty($_POST['link_image1'])
                && !empty($_POST['link_image2'])
                && !empty($_POST['link_image3'])
                && !empty($_POST['link_image4'])
                && !empty($_POST['link_image5'])   
            ) { 
                $donne = [
                    "title" => $title_article,
                    "contenue" => $contenue_article,
                    "img1" => $image_article1,
                    "img2" => $image_article2,
                    "img3" => $image_article3,
                    "img4" => $image_article4,
                    "img5" => $image_article5,
                ];

                Model::getPdo()->query("INSERT INTO space_news (Titre, news, image, image2, image3, image4, image5) VALUES (:title, :contenue, :img1, :img2, :img3, :img4, :img5)", $donne);
                header("location:" . URL . "/admin/index");
            } 
            }   
            else {
                $data['err_mode'] = true;
            }
        
        $this->setdata($data);
        $this->render('addArticle');
    }

    public function addImage()
    {

        session_start();
        if (!empty($_SESSION['pseudo'])) {

            $data = [
                "title" => "Ajoutez des image dans la galerie",
                "err_mod" => "0"
            ];
            if (isset($_POST) && !empty($_POST)) {
                if (isset($_POST['link_image_1']) && !empty($_POST["link_image_1"])) {
                    $len = count($_POST);
                    for ($i = 1; $i <= $len; $i++) {
                        $nm = $_POST['link_image_' . $i];
                        $db = new PDO('mysql:host=flex.o2switch.net;dbname=uqiv5705_Space-explorer;charset=utf8', 'uqiv5705', '5ye8gtfdHDUw');

                        $stm = $db->prepare("INSERT INTO image_galerie (image) VALUES ('$nm') ");
                        $stm->execute();
                        $stm->closeCursor();
                    }
                    header("Location:" . URL . "Galerie/showGallerie");
                    exit;
                } else {
                    $data["err_mod"] = true;
                }
            }
            $this->setdata($data);
            $this->render("addImage");
        }
    }
    /**
     * Page adding Video
     * @return None
     */
    public function addVideo()
    {

        session_start();
        if (!empty($_SESSION['pseudo'])) {

            $data = [
                "title" => "Ajoutez la video",
                "err_mode" =>"0"
            ];
            if(isset($_POST) && !empty($_POST)){
            if (
                isset($_POST['title_video_1'])
                && isset($_POST['link_video_1'])
                && !empty($_POST['title_video_1'])
                && !empty($_POST['link_video_1'])
            ) {
                $len = count($_POST) / 2;
                for ($i = 1; $i <= $len; $i++) {
                    $tm = htmlspecialchars(addslashes($_POST['title_video_' . $i]));
                    $nm = htmlspecialchars(addslashes($_POST['link_video_' . $i]));

                    $db = new PDO('mysql:host=flex.o2switch.net;dbname=uqiv5705_Space-explorer;charset=utf8', 'uqiv5705', '5ye8gtfdHDUw');
                    $stm = $db->prepare("INSERT INTO video_posted (Titre_video, Video_link)VALUES ('$tm','$nm')");

                    $stm->execute();
                    $stm->closeCursor();
                }
                header("Location:" . URL . "Video/indexVideo");
            }else{
                $data["err_mode"] = true;
            }
            }
            $this->setdata($data);
            $this->render("addVideo");
        } else {
            echo "Vous ne pouvez pas ajouter de video car vous n'avez pas de compte ou n'êtes pas admin";
            die();
        }
    }

    public function changeArticle($id = null)
    {
        $data = [
            "title" => "Modifier L'article N°" . $id,
            "article" => Model::getPdo()->query("SELECT * FROM space_news WHERE id = :id", [":id" => $id]),
            "err_mode" => 0
        ];
        /**Condition to change the article who was selected */
        if (isset($_POST) && !empty($_POST)) {
            $donne = [
                "id" => $id,
                "news" => trim(htmlspecialchars(($_POST['Updated_article'])))
            ];
            if(strlen($_POST['Updated_article']) > 350){

            Model::getPdo()->query('UPDATE space_news SET news = :news WHERE id = :id ', $donne);
            echo "<script>window.location.replace('http://space-explorer.fr/index.php?p=Acceuil/newsSolo/$id');</script>";
        }
                
        else{
            $data['err_mode'] = true;
            }
        }
        $this->setdata($data);
        $this->render('changeArticle');
    }
    public function removeVideo($id = null)
    {
        $data = [
            "title" => "Video du site",
            "videos" => Model::getPdo()->query("SELECT * FROM video_posted")
        ];

        if ($id != null) {
            Model::getPdo()->query('DELETE FROM video_posted WHERE Id_video = :id ', [":id" => $id]);
            echo "<script>window.location.replace('http://space-explorer.fr/index.php?p=Video/indexVideo');</script>";
        }
        $this->setdata($data);
        $this->render("removeVideo");
    }
}