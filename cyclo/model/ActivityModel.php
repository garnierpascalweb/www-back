<?php
abstract class ActivityModel {
    protected $pdo;

    /**
     * Methode abstraite obligeant les classes filles a dire quelle est le nom de la table
     */
    abstract public function getTableName();
    
    /**
     * Methode factorisee
     */
    public function getByYear($year) {
        $sqlSelectEntr = "SELECT * FROM ". $this->getTableName() ." WHERE DATE LIKE '".$year."%'";
        $results = $this->getArrayFromSelect($sqlSelectEntr);
        return $results;
    }    

    private function getArrayFromSelect($sqlSelectQuery) {
        $statement = $this->pdo->prepare($sqlSelectQuery);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);       
        return $results;
    }

    /**
     * Modificateur
     */
    public function setDb(PDO $pdo) {
        $this->pdo = $pdo;
    }
}
?>