<?php 

/**
 * Class Database for the interaction with the user and the data Server
 * DataManager
 * @var $db PDO Object
 * 
 */
class DataManager extends Data {
    
    protected $db;

    

    public function __construct($db)
    {
        parent::setdb($db);
        if(isset($_GET['send'])){
            $this->write($db,$_GET['typeof'],$_POST);
        }
    }

    /**
     * SELECT
     * @param  PDO OBJECT $db
     * @param  string $tableName
     * @return $donne
     */
    public function select($db,$tableName){

        
        $statement = $this->db->prepare("SELECT * FROM $tableName");
        $statement->execute();
        $donne = $statement->fetchAll(PDO::FETCH_ASSOC);
        $columninfo = $this->getColumnName($db,$tableName);

        foreach ($donne as $key => $value) {
            for($i = 0 ; $i<count($columninfo); $i++){
                echo  $value[$columninfo[$i]] ;                  echo "</br>";    

            }
        }
        return $donne;
    
    }
    /**
     * @param int $id
     * @return void 
     */
    public function delete($db,string $tablename, int $id){
        $statement = $this->db->prepare("DELETE * FRom $tablename WHERE(Id = :id)");
        $statement->bindParam(":id", $id,PDO::PARAM_INT);
        $statement->execute();
    }
        
    /**
     * WRITE
     *
     * @param  object $db
     * @param  array $params
     * @return array $donne
     */
    public function write($db,$nomdelatable,array $params){
        $columninfo = $this->getColumnName($db,$nomdelatable);
        $statement = $this->db->prepare("INSERT INTO $nomdelatable (pseudo,email,Age,password, Country) VALUES (:".implode(" , :" , array_keys($params)).")") ;
        foreach ($params as $key => $value) {
            $statement->bindValue(":" . $key, $value,PDO::PARAM_STR);
            //binding Value to the query with key being the name of the colum and value the VALUE of the column entry

        }
        $statement->execute();

    }

    /**
     * UPDATE
     * @var $db PDO Object
     */
    public function update($db){
        
    }

    /**
     * @param PDO    db
     * @param string email
     * @param string pseudo
     */
    public function doExist($email,$pseudo){
        //SELECT * FROM produit WHERE categorie = 'informatique' AND stock < 20
        $statement = $this->db->prepare("SELECT COUNT(*) FROM user_data WHERE pseudo = :pseudo AND email = :email");
        
        $statement->bindParam(":pseudo", $pseudo,PDO::PARAM_STR);
        $statement->bindParam(":email", $email,PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchColumn();
        echo $pseudo . " " . $email . "</br>";
        echo "Il y a   $result  ligne ";
        return $result;
    }

    /**
     * Checking in the login procces
     * @param string $user
     * @param string $password
     * @return void 
     */
    public function checkLogin(PDO $db,string $user,string $password){
        $statement = $this->db->prepare("SELECT * FROM  user_data WHERE(pseudo = :user )");
        $statement->bindParam(":user",$user,PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);            
        $url = dirname(__DIR__) . "\\View\\erreur.php";
        $url2 = dirname(__DIR__)."\\View\\mon_Compte.php";
        if(empty($result)){
            //header("location:" . (dirname(__DIR__) . "View\\erreur.php"));
            echo "Mauvaise Pseudo";
        }
        $password_to_check = password_verify($password,$result[0]['password']);
        
        
        if($password_to_check === false){
            header("location:../View/erreur.php");
        }
        else{
            session_start();
            $_SESSION['compte_pseudo'] = $user;
            header("location:../View/mon_Compte.php");
            
        }
    }
}
