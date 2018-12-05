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

    public $primera_fecha;
    public $segunda_fecha;
    


    public function __construct($conn){
        $this->conn = $conn;
    }


    function read(){

        $query="SELECT * FROM " . $this->table_name . "";

        $stmt=$this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

    function export(){

        $query = "SELECT * FROM (" . $this->table_name . ") WHERE fecha_acceso BETWEEN CAST(? AS DATE) AND CAST(? AS DATE) ORDER BY auditoria_id ASC";


        $stmt=$this->conn->prepare($query);

        $stmt->bindParam(1,$this->primera_fecha);
        $stmt->bindParam(2,$this->segunda_fecha);

        $stmt->execute();

        return $stmt;


    }



    
}


?>