<?php

class auditoria{

    private $conn;

    private $table_name = "auditoria";

    public $auditoria_id;
    public $fecha_acceso;
    public $user;
    public $response_time;
    public $endpoint;
    public $created;
    


    public function __construct($conn){
        $this->conn = $conn;
    }


    function read(){

        $query="SELECT * FROM " . $this->table_name . "";

        $stmt=$this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }



    
}


?>