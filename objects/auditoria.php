<?php


class auditoria{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "auditoria";

    // table columns
    public $auditoria_id;
    public $fecha_acceso;
    public $user;
    public $response_time;
    public $endpoint;
    public $created;
    


    public function __construct($connection){
        $this->connection = $connection;
    }


    function acceso(){
        $query="INSERT INTO " . $this->table_name . " SET fecha_acceso=:fecha_acceso, user=:user, response_time=:response_time, endpoint=:endpoint";

        $stmt=$this->prepare->conn($query);

        

        $stmt->bindParam(":fecha_acceso",$this->fecha_acceso);
        $stmt->bindParam(":user",$this->user);
        $stmt->bindParam(":response_time",$this->response_time);
        $stmt->bindParam(":endpoint",$this->endpoint);



    }








}


?>