<?php

use Hp\SpaceExplorer\HTTPRequest;
use Hp\SpaceExplorer\HTTPResponse;
use Hp\SpaceExplorer\UImessage;

/**
 * Main COntroller of the APP
 * @param none
 * @return none 
 */
class Controller {
    public $vars = [];
    protected $httpRequest;
    public function __construct()
    {   
        
        $this->httpRequest = new HTTPRequest;
        if(isset($_POST)){
            $this->donnee = $_POST;
            return $this->donnee;
        }
        
    }
    public function setdata(array $data){

        $this->vars = $data;
    }
    /**
     * Pick up the right page to render
     * @param nomView
     * @return None
     * 
     */
    public function render($nomView){
       
        $dossier = str_replace("Controller", "" , get_class($this));

        $dossier = strtolower($dossier);

        $filename = "View/$dossier/$nomView.php";
        if(file_exists($filename)){
            extract($this->vars);
            ob_start();
            require $filename;

            $_content_For_Template = ob_get_clean();
            require "View/template_for_content.php";
        }else{
            echo $filename . "</br>";
            echo "Veuillez crée la vu en question";
            die();
        }
    }
    
}