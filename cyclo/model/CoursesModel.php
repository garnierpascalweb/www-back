<?php
class CoursesModel extends ActivityModel {

    public function __construct($pdo){       
        $this->setDb($pdo);
    }

    public function getTableName() {
        return "COURSES";
    }
}
?>