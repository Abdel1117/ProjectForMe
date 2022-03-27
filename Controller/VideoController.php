<?php


/**
 * Controller For The Video Page
 * Read URL to call the needed Methode
 * @return None 
 */
class VideoController extends Controller{

    public function indexVideo(){
        session_start();
        $data = [
            "title" => "Video",
            "video" => Model::getPdo()->query('SELECT * FROM video_posted')
        ];
        $this->setdata($data);
        $this->render("video");

    }
    
    
}
