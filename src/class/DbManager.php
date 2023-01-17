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
        $var = $this->db->prepare($sql);
        // $var->execute($data);
    }

    function insert_advanced(DbObject $dbObj) {
        
    }

    function select(string $sql, array $data, string $className) {
        $var = $this->db->prepare($sql);
        $var->execute();
        $var->setFetchMode(PDO::FETCH_CLASS, $className);
        $result = $var->fetchAll();
        return $result;
    }

    function getById(string $tableName, $id, string $className) {
        $var = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE id = ?');
        $var->execute([$id]);
        $var->setFetchMode(PDO::FETCH_CLASS, $className);
        $result = $var->fetchAll();
        return $result;
    }

    function getById_advanced($id, string $className) {

    }

    function getBy(string $tableName, string $column, $value, string $className) {
        $var = $this->db->prepare('SELECT ? FROM ?');
        $var->execute([$column, $tableName]);
        $var->setFetchMode(PDO::FETCH_CLASS, $className);
        $result = $var->fetchAll();
        return $result;
    }

    function getBy_advanced(string $column, $value, string $className) {

    }

    function removeById(string $tableName, $id) {
        $var = $this->db->prepare('DELETE * FROM '.$tableName.' WHERE id = ?');
        $var->execute([$id]);
    }

    function update(string $tableName, array $data) {
        $var = $this->db->prepare('UPDATE '.$tableName.' SET ? = ? WHERE ? = ?');
        $params = [];
        foreach ($data as $key => $value) {
            array_push($params, $key, $value,);
        }
        $var->execute($params);
    }

    function update_advanced(DbObject $dbObj) {
        
    }

}