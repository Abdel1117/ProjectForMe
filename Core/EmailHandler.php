<?php

namespace Hp\SpaceExplorer;


class EmailHandler{

    public static function sendEmail($receiver, $subject, $msg ){
    
    mail($receiver , $subject, $msg);
    }



}

