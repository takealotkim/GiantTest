<?php

class ResultDao{

    private static $_DB_NAME = "test.db";
    
    function __construct(){
        $this->db = new SQLite3(self::$_DB_NAME);
        $this->db->exec("CREATE TABLE IF NOT EXISTS results(id INTEGER PRIMARY KEY AUTOINCREMENT, instruction STRING, result REAL, created_at STRING)");
    }

    function create($result){
        $stm = $this->db->prepare("INSERT INTO results(instruction, result, created_at) VALUES (?, ?, ?)");
        $stm->bindParam(1, $result->getInstruction());
        $stm->bindParam(2, $result->getResult());
        $stm->bindParam(3, $result->getCreatedAt());
        $result = $stm->execute();
    }

    function close(){
        $db->close();
    }
}

?>