<?php 

require_once __DIR__ . '/DbObject.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
        $in = $this->db->prepare($sql);
        // $in->execute($data);
        
    }

    function insert_advanced(DbObject $dbObj) {
       
    }
    

    function select(string $sql, array $data, string $className) {
        $sel = $this->db->prepare($sql);
        $sel->execute($data);
        $sel->setFetchMode(PDO::FETCH_CLASS, $className);
        return $sel->fetchAll();
    }
    

    function getById(string $tableName, $id, string $className) {
        $query = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE `id` = ?');
        $query->execute([$id]);
        return $query->fetchObject($className);
    }
    

    function getById_advanced($id, string $className) {
       
    }
    

    function getBy(string $tableName, string $column, $value, string $className) {
        
    }
    

    function getBy_advanced(string $column, $value, string $className) {
        
    }
    

    function removeById(string $tableName, $id) {
       
    }
    

    function update(string $tableName, array $data) {
    //     $var = $this->db->prepare('UPDATE '.$tableName.' SET ? = ? WHERE ? = ?');
    //     $params = [];
    //     foreach ($data as $key => $value) {
    //         array_push($params, $key, $value,);
    //     }
    //     $var->execute($params);
    }
    
    function update_advanced(DbObject $dbObj) {
        
    }
    

}