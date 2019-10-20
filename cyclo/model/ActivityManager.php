<?php
/**
 * 
 */
class ActivityManager {
    private $pdo;

    public function __construct($pdo){
        // initialisation de la connexion
        $this->setDb($pdo);
    }

    public function getActivitiesByYear($year) {
        // $year a sanitizer
        $sqlSelectEntr = "SELECT * FROM ENTRAINEMENTS WHERE DATE LIKE '".$year."%'";
        $jsonEntr = $this->getArrayFromSelect($sqlSelectEntr);
        $sqlSelectCourses = "SELECT * FROM COURSES WHERE DATE LIKE '".$year."%'";
        $jsonCourses = $this->getArrayFromSelect($sqlSelectCourses);
        $json=array_merge($jsonEntr,$jsonCourses);
        return $json;
    }    

    /**
     * Permet de rendre un tableau JSON contre une requete SQL
     */
    public function getArrayFromSelect($sqlSelectQuery) {
        $statement = $this->pdo->prepare($sqlSelectQuery);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        //$json = json_encode($results);
        return $results;
    }

    public function setDb(PDO $pdo)
    {
      $this->pdo = $pdo;
    }
}
?>