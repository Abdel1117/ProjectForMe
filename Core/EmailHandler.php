<?php

namespace Hp\SpaceExplorer;


class EmailHandler{

    public function test(){
        echo "hello";
    }
    
    public static function sendEmail($receiver, $subject, $msg){
        
        mail($receiver,$subject,$msg);
        
    }



}

