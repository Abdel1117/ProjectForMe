<?php


namespace Hp\SpaceExplorer;


class UImessage {

    const MESSAGE_SUCCES = [
        "Succes_inscription" => "Vous vous êtes inscrit avec succès",
        "Succes_connexion"=> "Connexion réussi",
        "Succes_message_send" => "Message poster avec succès  " ,
        "Succes_video_posted" => "Vidéo ajouté",
        "Succes_image_posted" =>  "Image posté",
        "Succes_article_posted" => "Article posté" ,

    ];
    public static function message_To_Send(){

        if(isset($_SESSION['succes']) && $_SESSION["succes"] != false ){
            
            echo '
            <div class="alert alert-success" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>
            '.
                    $_SESSION["succes"]
            .'</div>
            ';       
            unset($_SESSION['succes']);
        }elseif (isset($_SESSION['err_mode']) && $_SESSION['err_mode'] != false) {
            echo '
            <div class="alert alert-warning" role="alert">    
            <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>
            '.
                    $_SESSION["err_mode"]
            .'</div>
            ';               
            unset($_SESSION['err_mode']);
        }
    }

}