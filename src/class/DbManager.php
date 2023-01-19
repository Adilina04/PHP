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

    function check_roles($role, $requiredLevel){
        if($role < $requiredLevel){
            return false;
        } else {
            return true;
        }
    }
    // return l'id inseré
    function insert(string $sql, array $data) {
        $sth = $this->db->prepare($sql);
        $sth->execute($data);
    }

    function insert_advanced(DbObject $dbObj) {
        $tableName = strtolower(get_class($dbObj)).'s';
        $sql = 'INSERT INTO '.$tableName.'(';
        $cpt = 0;
        $data = [];
        foreach($dbObj as $clef => $value){
            if (!empty($value)){
                $sql = $sql.$clef.', ';
                array_push($data, $value);
                $cpt += 1;
            }
        }
        $sql = substr($sql,0,-2).') VALUES (';
        for ($i = 1; $i<$cpt+1; $i++){
            $sql = $sql.'?, ';
        }
        $sql = substr($sql,0,-2).')';
        return $this->insert($sql, $data);
    }

    function select(string $sql, array $data, string $className) {
        $req = $this->db->prepare($sql);
        $req->execute($data);
        $req->setFetchMode(PDO::FETCH_CLASS, $className);
        $resultat = $req->fetchAll();
        return $resultat;
    }

    function getById(string $tableName, $id, string $className) {
        $req = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE id = ?');
        $req->execute([$id]);
        $req->setFetchMode(PDO::FETCH_CLASS, $className);
        $resultat = $req->fetch();
        return $resultat;
    }

    function getById_advanced($id, string $className) {
        $tableName = strtolower($className).'s';
        return $this->getById($tableName, $id, $className);
    }

    function getBy(string $tableName, string $column, $value, string $className) {
        $req = $this->db->prepare('SELECT * FROM '.$tableName.' WHERE '.$column.' = ?');
        $req->execute([$value]);
        $req->setFetchMode(PDO::FETCH_CLASS, $className);
        $resultat = $req->fetch();
        return $resultat;
    }

    function getBy_advanced(string $column, $value, string $className) {
        $tableName = strtolower($className).'s';
        return $this->getBy($tableName, $column, $value, $className);
    }

    function removeById(string $tableName, $id) {
        $req = $this->db->prepare('DELETE FROM '.$tableName.' WHERE id=?');
        $req->execute([$id]);
    }

    function update(string $tableName, array $data) {
        $sql = 'UPDATE '.$tableName.' SET ';
        foreach($data as $clef => $value){
            if ($clef != 'id'){
                $sql = $sql.$clef.'=:'.$clef.', ';
            }
        }
        $sql = substr($sql,0,-2);
        var_dump($sql);
        $req = $this->db->prepare($sql.' WHERE id=:id');
        $req->execute($data);
    }

    function update_advanced(DbObject $dbObj) {
        $tableName = strtolower(get_class($dbObj)).'s';
        echo $tableName;
        $data = get_object_vars($dbObj);
        $this->update($tableName, $data);
        var_dump($data);
    }
}