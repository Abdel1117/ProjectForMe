<?php
/**
 * Class Config 
 * 
 * @param NONE
 */
class Config{

/**
 * @param text 
 * Methode that return the text with space and linebreak
 */
    static public function esc($text){
        return nl2br(htmlspecialchars($text));
    }

    /**
     * @param None
     * @return $show_cookie @bool 
     */
    static public function cookie(){
        if(isset($_COOKIE['cookie_accepter']) && !empty($_COOKIE['cookie_accepter'])){
            $show_cookie = false;
            return $show_cookie;
            exit;
        }
        else{
            $show_cookie = true;
            return $show_cookie;
        }
    }
}