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
        $in->execute($data);
        return $this->db->lastInsertId();
    }

    function insert_advanced(DbObject $dbObj) {

     



    }
    

    function select(string $sql, array $data, string $className) {
        $select = $this->db->prepare($sql);
        $select->execute($data);
        return $select->fetchAll(PDO::FETCH_CLASS, $className);

    }
    

    function getById(string $tableName, $id, string $className) {
        $query = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE `id` = ?');
        $query->execute([$id]);
        return $query->fetchObject($className);



    }
    

    function getById_advanced($id, string $className) {
        


    }
    

    function getBy(string $tableName, string $column, $value, string $className) {
        $query = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE `'.$column.'` = ?');
        $query->execute([$value]);
        return $query->fetchObject($className);

    }
    

    function getBy_advanced(string $column, $value, string $className) {
        
    }
    

    function removeById(string $tableName, $id) {
        $query = $this->db->prepare('DELETE FROM '.$tableName.' WHERE `id` = ?');
        $query->execute([$id]);


    }
    

    function update(string $tableName, array $data) {
        $query = $this->db->prepare('UPDATE '.$tableName.' SET `name` = ?, `description` = ?, `price` = ?, `quantity` = ? WHERE `id` = ?');
        $query->execute([$data['name'], $data['description'], $data['price'], $data['quantity'], $data['id']]);
    }
    
    function update_advanced(DbObject $dbObj) {
        
    }
    

}