<?php

class ModelForSign extends Model{

    public static function Doexist($userName, $email){
        $data = [$userName, $email];

        $request =  Model::getPdo()->query("SELECT COUNT(*) FROM user_data WHERE    pseudo = :userName AND email = :email",$data );
        
        echo $request; 
        if($request == 1 ){
            return false;
        }
        
    }
}