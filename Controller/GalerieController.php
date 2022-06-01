<?php


/**
 * Controller For The Galerie
 * Read URL to call the needed Methode
 * @return None
 */
class GalerieController extends Controller{
    public $meta = "Space Explorer section Galerie, image n'astronomie, de planète, méteorite ou de station spatial";


    
    public function showGallerie(){
        $data = [
            "title" => "Galerie Photo",
            "meta" => $this->meta,
            "carousel_photo" => Model::getPdo()->query("SELECT image, id, description FROM image_galerie"),
            "photo_galerie" => Model::getPdo()->query("SELECT titre_image, image, description FROM image_galerie")
        ];
        if(!empty($_POST)){
            $search = trim(htmlspecialchars($_POST['search']));
            $donne = [
                "recherche" => $search
            ];
            if($search > 4){
                $result = Model::getPdo()->query("SELECT * FROM image WHERE Name = :recherche ",$donne);
                
                if($result > 0 ){
                    $data = [
                        "title" => "Galerie Photo",
                        "Photo" =>  $result
                    ];
                
                    $this->setdata($data);
                    $this->render("Galerie");
                }
                else{
                    echo "Aucun Element ne correspond a votre recherche <a href=".URL."Forum/indexForum>Réessayer Ici</a>";
                }
            }
            
        }
        $this->setdata($data);

        $this->render("Galerie");
    }

    public function search(){
        
    }
    public function setResolution(){
        
    }
}