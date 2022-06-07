<?php
/**
 * Class for the CRUD
 * @param none 
 * @return PDO 
 */
class ModelChild extends Model
{

    public function query($sql, $data = [])
    {
        $requete = $this->db->prepare($sql);
        $requete->execute($data); //Evite les injections SQL 
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}