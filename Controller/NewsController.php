<?php
/**
 * Controller For The NewsSolo
 * Read URL to call the needed Methode
 * @return None 
 */
class NewsController extends Controller{


    public function newsSolo($id = null){

        if($id != null){
            
            $data = [
                "title" => "News" . $id,
                "contenue" => Model::getPdo()->query("SELECT * FROM space_news WHERE id =" . $id)
            ];
        }
        $this->setdata($data);
        $this->render("NewsSolo");
    }
}