<?php


/**
 * Controller For The Video Page
 * Read URL to call the needed Methode
 * @return None 
 */
class VideoController extends Controller{

    public function indexVideo(){
        session_start();
        
        if(!empty($_POST['order_by'])){
            if($_POST['order_by']){
                $data = [
                    "title" => "Video Space Explorer",
                    "video" => Model::getPdo()->query("SELECT * FROM video_posted ORDER BY Date_post " . $_POST['order_by'])

                ];
            }
            $this->setdata($data);
            $this->render("video");
        }else{

            $data = [
                "title" => "Video Space Explorer",
                "video" => Model::getPdo()->query('SELECT * FROM video_posted')
            ];
            $this->setdata($data);
            $this->render("video");
        }
       

    }
    
    
}
