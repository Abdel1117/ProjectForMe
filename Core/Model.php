<?php

/**
 * Class for the CRUD
 * @param none 
 * @return PDO 
 */
class Model
{
    private $login = "root";
    private $password = "";
    private $dbname = "test";
    private $host = "localhost";
    static private $pdo;
    private $db;

    public static function getPdo()
    {
        if (self::$pdo == null) {
            self::$pdo = new Model();

            return self::$pdo;
        }
        return self::$pdo;
    }

    private function __construct()
    {
        $adress_db = "mysql:dbname=$this->dbname;host=$this->host;charset=utf8;port=3306";
        $this->db = new PDO($adress_db, $this->login, $this->password);
    }

    public function query($sql, $data = [])
    {
        $requete = $this->db->prepare($sql);
        $requete->execute($data); //Evite les injections SQL 
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
}