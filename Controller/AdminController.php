<?php

use Hp\SpaceExplorer\ImageOptimizer;

/**
 * Admin Controller
 * Send to Dashboard 
 * You have ofcourse to be admin to access to this page that's why a session need to be started to check if the user who is loged is admin
 * This class handle the render of the dashBoard and the management of the content
 * @return None 
 */
class AdminController extends Controller
{
    public $meta = "Section admin du site Space Explorer ou nous pourrons gérer le contenu du site en ajoutons des Articles";
    public function index()
    {
        session_start();
        if (!empty($_SESSION['pseudo'])) {
            if ($_SESSION['role'] === "admin" || $_SESSION['role'] === "superAdmin") {
                $data = [
                    "title" => "Bureau Administrative",
                    "meta" => "Page admin permétant de gérer le contenu du site Web et de gérer également les utilisateurs du site.",
                    "err_mode" => 0,
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
        
            if ( !empty($_SESSION['pseudo']) &&  $_SESSION['role'] === "superAdmin") {
        $data = [
                    "title" => "Bureau Administrative",
                    "meta" => "Page admin permétant de gérer le contenu du site Web et de gérer également les utilisateurs du site.",
                    "err_mode" => false,
                    "succes"  => false,
                    "users" => Model::getPdo()->query("SELECT Id, pseudo, email,Country, Age, role FROM user_data"),
                    "articles" => Model::getPdo()->query('SELECT id,Titre, news FROM space_news'),
                    "images" => Model::getPdo()->query('SELECT id, image FROM image_galerie'),
                    "videos" => Model::getPdo()->query('SELECT * FROM video_posted')
                ];

        $check = Model::getPdo()->query("SELECT * FROM user_data WHERE id = :id", [":id" => $id]);

        $id_user_to_ban = $check[0]->Id ;

        if($id_user_to_ban === $_SESSION["id"]){
            $_SESSION["err_mode"] = "Vous essayer de vous bannir vous même";
/*             echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";
 */        }
        elseif($check[0]->role === "admin" || $check[0]->role === "superAdmin"){
            $_SESSION["err_mode"] = "Vous ne pouvez bannir d'autre admin";
/*             echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";
 */        }
        else{   
             
            Model::getPdo()->query("DELETE FROM user_data WHERE id = :id", [":id" => $id]);
            $_SESSION["succes"] = "L'Utilisateur " .  $check[0]->pseudo . " à était Bannie";
/*             echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";
 */
/*             echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=Admin/index');</script>";
 */        header("Location:" . URL . "Admin/index");
}
        $this->setdata($data);
        $this->render("indexAdmin");
        
    }
        else{
            echo "Vous nêtes pas Super Admin";
            die();
        }
    }

    public function addAdmin($id = null)
    {   
        if ( !empty($_SESSION['pseudo']) &&  $_SESSION['role'] === "superAdmin") {
            $user_to_Update = Model::getPdo()->query("SELECT pseudo, role FROM user_data WHERE id = :id" , ["id" => $id]);
              
            if($user_to_Update[0]->role != "admin" &&  $user_to_Update[0]->role != "superAdmin"){

                Model::getPdo()->query("UPDATE user_data SET role = 'admin' WHERE id = :id", [":id" => $id]);   
                
                $_SESSION["succes"] = "L'utilisateur " . $user_to_Update[0]->pseudo. " est devenu admin";
                echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";        
            }else{
                $_SESSION["err_mode"] = "L'utilisateur " . $user_to_Update[0]->pseudo . " est déja admin";
                echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";        
            }
        }
        else{
            echo "Vous n'êtes pas Super Admin";
            die();
        }
    }

    public function removeAdmin($id = null)
    {
        if ( !empty($_SESSION['pseudo']) && $_SESSION['role'] === "superAdmin") {
            
            $userToBan = Model::getPdo()->query("SELECT pseudo, role FROM user_data WHERE id = :id", [":id" => $id]);
            
            if($userToBan[0]->role != "superAdmin"){
                
                Model::getPdo()->query("UPDATE user_data SET role = 'user'  WHERE id = :id", [":id" => $id]);
                $_SESSION["succes"] = "Droit d'admin enlevé à " . $userToBan[0]->pseudo;
                echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";        
            }
        else{
                $_SESSION['err_mode'] = "Vous ne pouvez pas retiré les droits du super Admin";
                echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";
            }
        }
        else{
            echo "Vous n'êtes pas Super Admin";
            die();
        }
    }
    
    public function removeArticle($id = null)
    {
        
        if ( !empty($_SESSION['pseudo']) && $_SESSION['role'] === "admin" || $_SESSION['role'] === "superAdmin") {
        $article = Model::getPdo()->query("SELECT Titre FROM space_news WHERE id = :id", [":id"=> $id]);
        
        Model::getPdo()->query("DELETE FROM space_news WHERE id = :id", [":id" => $id]);
        $_SESSION["succes"] = "L'article sur " . $article[0]->Titre .  " à était  Supprimé ";
        echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";        

        }
        else{
            echo "Vous n'êtes pas admin";
            die();
        }
    }

    public function removeImage($id = null)
    {
        if( !empty($_SESSION['pseudo']) && $_SESSION['role'] === "admin" || $_SESSION['role'] === "superAdmin") {
        
        $img_to_delete = Model::getPdo()->query("SELECT image FROM image_galerie WHERE id = :id", [":id"=>$id]);
        
        unlink($img_to_delete[0]->image);
        Model::getPdo()->query('DELETE FROM image_galerie WHERE id = :id ', [":id" => $id]);
        $_SESSION["succes"] = "Image Supprimé ";

        echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Admin/index');</script>";        
    }
        else{
            echo "Vous n'êtes pas admin";
            die();
        }
    }
    public function addArticle()
    {
        session_start();
        if ($_SESSION['role'] === "admin" || $_SESSION['role'] === "superAdmin") {
        $data = [
            "title" => "Ajoutez un article",
            "succes" => "0",
            "err_mode" => "0"
        ];
        if (isset($_POST) && !empty($_POST)) {
            $title_article = trim(htmlspecialchars($_POST['title_article']));
            $contenue_article = trim(htmlspecialchars($_POST['article_content']));
            $image_board = trim(htmlspecialchars($_FILES['image_place_holder']));
            $resume_board = trim(htmlspecialchars($_POST['resume_article']));
            $tags_article = trim(htmlspecialchars($_POST['tags_article']));
            
            if (
                !empty($tags_article) && 
                strlen($title_article) > 5
                && strlen($contenue_article) > 200
                && !empty($image_board)
                && strlen($resume_board) > 20
            ) { 


                


                $title_article_to_display = $title_article;
                $donne = [
                    ":tags" => $tags_article,
                    ":title" => $title_article,
                    ":contenue" => $contenue_article,
                    ":image_board" => $image_board,
                    ":resume" => $resume_board,
                ];

                Model::getPdo()->query("INSERT INTO space_news (Tags, Titre, news, image, resumé) VALUES (:tags, :title, :contenue, :image_board, :resume)", $donne);
                $_SESSION['succes'] = "Article sur " . $title_article_to_display ." ajouté";

                echo "<script>window.location.replace('https://localhost/Web/Space_explorer/Acceuil/index');</script>";               
             }
                else {
                $_SESSION['err_mode'] = "Veuillez remplir tous les champs nécessaire, l'article dois avoir un tag, le titre dois contenir au moins 5 charactères, le resumé dois en contenir au moins 20, l'article dois contenir au moins 200 charactère et sans oublier que l'article dois contenir une image";
            }
        }   
        $this->setdata($data);
        $this->render('addArticle');
        }else{
            echo "Vous n'êtes pas Admin";
            die();
        }
    }

    public function addImage()
    {

        session_start();
        if (!empty($_SESSION['pseudo']) && $_SESSION["role"] != "user") {

            $data = [
                "title" => "Ajoutez des image dans la galerie",
                "err_mode" => "0"
            ];
            if(isset($_POST) && !empty($_POST)){

                if(isset($_FILES['image_upload']) && !empty($_FILES['image_upload'])
                && isset($_POST['title_image']) && !empty($_POST['title_image'])
                && isset($_POST['desc_image']) && !empty($_POST['desc_image'])) {

                 
                    
                    $name = trim(htmlspecialchars(($_POST["title_image"])));
                    $desc =  trim(htmlspecialchars($_POST["desc_image"]));
                    
                    
                    if(strlen($name) > 5 && strlen($desc) > 10){
                    $img = $_FILES["image_upload"]["name"];
                    
                    $array_of_allowed_ext = array("jpg",  "jpeg", "png");
                    $image_Tmp =  $_FILES["image_upload"]["tmp_name"];
                    $size_of_image = $_FILES["image_upload"]["size"];
                    $ext_of_image = $_FILES['image_upload']['type'];
                    $file_response = $_FILES["image_upload"]['error'];
                
                    $name_of_image =  explode("." ,$_FILES["image_upload"]["name"]);
                    $ext = end($name_of_image);

                        if(in_array(strtolower($ext), $array_of_allowed_ext)){
                            if($file_response === 0){                        
                        
                                $_SESSION["err_mode"] = "Une erreur inconnue c'est produite";
                                if($size_of_image < 5000000){
                                
                                
                                $path = "src\\image\\uploads\\$img";    
                                move_uploaded_file($image_Tmp , "$path");
                                
                                $compress_file = $img;
                                $compressed_img = ".\\src\\image\\uploads\\" . $compress_file;
                                
                                ImageOptimizer::compressedImage($path,$compressed_img, 50);
                                
                                
                                $data_to_send = [
                                    ":title" => $name,
                                    ":img_path" => $path,
                                    ":description"=> $desc,
                                ];
                                
                                    Model::getPdo()->query("INSERT INTO image_galerie (titre_image, image, description) VALUES (:title , :img_path, :description)", $data_to_send);
                                
                                    $_SESSION["succes"] = "Image ajouté avec succes";                         
                                }
                                else{
                                $_SESSION['err_mode'] = "Le fichier est trop volumineux il dois faire moins de 5MO";
                                }
                            }else{
                             $_SESSION["err_mode"] = "Une erreur inconnue c'est produite";
                            }
                        }
                    else
                    {
                        $_SESSION["err_mode"] = "Le fichier dois etre une image JPEG, JPG ou PNG !";
                    }
                    } 
                    else{
                        $_SESSION['err_mode'] = "Le titre dois contenir au moins 5 charactères et la description au moins 10 charactères";
                        }
            }
            else{
             $_SESSION["err_mode"] = "Veuillez remplir les champs nécessaire à l'insertion d'image";
            } 
        } 
   
            $this->setdata($data);
            $this->render("addImage");
        }
        else{
            echo "Vous n'êtes pas admin" ;
            die();
        }
    }
    /**
     * Page adding Video
     * @return None
     */
    public function addVideo()
    {

        session_start();
        if (!empty($_SESSION['pseudo']  && $_SESSION["role"] != "user")) {

            $data = [
                "title" => "Ajoutez des vidéos",
                "err_mode" =>"0"
            ];
            if(isset($_POST) 
            && !empty($_POST) 
            && isset($_FILES) 
            && !empty($_FILES)){
            if (
                isset($_POST['title_video'])
                && isset($_POST['link_video'])
                && !empty($_POST['title_video'])
                && !empty($_POST['link_video'])
                && !empty($_FILES['image_thumb'])
                && strlen($_POST['title_video']) > 5
                && strlen($_POST["link_video"] > 10)
            ) { 
                $video_title = trim(htmlspecialchars($_POST['title_video']));
                $video_link = trim(htmlspecialchars($_POST['link_video']));
                $video_image = $_FILES['image_thumb']['name'];

                $img_check = ImageOptimizer::checkImageOfVideo("image_thumb");
                
                if($img_check === true ){
                    $img = $_FILES["image_thumb"]["name"];
		            $image_Tmp =  $_FILES["image_thumb"]["tmp_name"];
		            $size_of_image = $_FILES["image_thumb"]["size"];
		            $ext_of_image = $_FILES["image_thumb"]['type'];
		            $file_response = $_FILES["image_thumb"]['error'];

                   
                    $path = "src\\image_Video\\$img";    
                    move_uploaded_file($image_Tmp , "$path");
                    
                    $compress_file = $img;
                    $compressed_img = ".\\src\\image\\uploads\\" . $compress_file;
                    
                    ImageOptimizer::compressedImage($path,$compressed_img, 50);
                     $donne = [
                         ":video_title" => $video_title,
                         ":video_link" => $video_link,
                         ":video_image" => $path
                         
                     ];
                    Model::getPdo()->query("INSERT INTO video_posted (Titre_video, Video_link, image_video) VALUES (:video_title,:video_link,:video_image)",$donne);
                     
                    $_SESSION["succes"] = "Les videos on était ajouté ";
                    header("Location:" . URL . "Video/indexVideo");
                }

            }else{
               
                $_SESSION["err_mode"] = "Veuillez remplir tous les champs nécessaire";
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
        if (!empty($_SESSION['pseudo']  && $_SESSION["role"] != "user")) {       
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
            echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=Acceuil/newsSolo/$id');</script>";
        }
                
        else{
            $data['err_mode'] = true;
            }
        }
        $this->setdata($data);
        $this->render('changeArticle');
        }
        else{
            echo "Vous n'êtes pas Admin";
            die();
        }
    }
    public function removeVideo($id = null)
    {
        if ( !empty($_SESSION['pseudo']) && $_SESSION['role'] === "admin" || $_SESSION['role'] === "superAdmin") {
        $data = [
            "title" => "Video du site",
            "meta" => $this->meta,
            "videos" => Model::getPdo()->query("SELECT * FROM video_posted")
        ];

        if ($id != null) {
            Model::getPdo()->query('DELETE FROM video_posted WHERE Id_video = :id ', [":id" => $id]);
            echo "<script>window.location.replace('https://space-explorer.fr/index.php?p=Video/indexVideo');</script>";
        }
        $this->setdata($data);
        $this->render("removeVideo");
    }
    else{
        echo "Vous n'êtes pas admin";
        die();
    }
    }
}