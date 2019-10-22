<?php
class EntrainementsModel extends ActivityModel {

    public function __construct($pdo){       
        $this->setDb($pdo);
    }
    
    public function getTableName() {
        return "ENTRAINEMENTS";
    }
}
?>