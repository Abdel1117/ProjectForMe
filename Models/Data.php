<?php


class Data{
    protected static $db;

    public function __construct($db)
    {
        $this->setdb($db);
        $this->getdb($db);
        

    }

    //SETTER AND GETTER

    public function setdb($db){
        $db = new PDO("mysql:host=localhost;dbname=test","root","");
        $this->db = $db;
    }

    public static function getdb(){
        return self::$db;
    }

    public function getColumnName($db,$tableName){
        $result = $this->db->query("SELECT * FROM $tableName LIMIT 1");  
        $fields = array_keys($result->fetch(PDO::FETCH_ASSOC));   
            unset($fields[0]);
        return $fields;

    }
    
}