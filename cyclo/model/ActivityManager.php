<?php
/**
 * Classe ActiviteManager
 */
class ActivityManager {
    private $pdo;
    protected $entrModel;
    protected $coursesModel;

    public function __construct($pdo){
        // initialisation de la connexion
        $this->setDb($pdo);
        $entrModel = new EntrainementsModel($pdo);
        $coursesModel = new CoursesModel($pdo);
    }

    /**
     * Permet de recuperer les activites pour une annee
     */
    public function getActivitiesByYear($year) {
        // $year a sanitizer
        //$stmt=$pdo->prepare('SELECT * FROM ENTRAINEMENTS WHERE DATE LIKE %:id');
        //$sqlSelectEntr = "SELECT * FROM ENTRAINEMENTS WHERE DATE LIKE '".$year."%'";
        $jsonEntr = $this->getArrayFromSelect($sqlSelectEntr);
        
        $sqlSelectCourses = "SELECT * FROM COURSES WHERE DATE LIKE '".$year."%'";
        $jsonCourses = $this->getArrayFromSelect($sqlSelectCourses);
        $res=array_merge($jsonEntr,$jsonCourses);

        return json_encode($res);
    }    

    /**
     * Permet de rendre un tableau  de resultats depuis une requete SQL
     */
    private function getArrayFromSelect($sqlSelectQuery) {
        $statement = $this->pdo->prepare($sqlSelectQuery);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);       
        return $results;
    }

    public function setDb(PDO $pdo) {
      $this->pdo = $pdo;
    }
}
?>