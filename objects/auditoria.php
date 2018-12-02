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

/*
    function acceso(){
        $query="INSERT INTO " . $this->table_name . " SET fecha_acceso=:fecha_acceso, user=:user, response_time=:response_time, endpoint=:endpoint";

        $stmt=$this->prepare->conn($query);

        

        $stmt->bindParam(":fecha_acceso",$this->fecha_acceso);
        $stmt->bindParam(":user",$this->user);
        $stmt->bindParam(":response_time",$this->response_time);
        $stmt->bindParam(":endpoint",$this->endpoint);



    }
*/

    function create($name,$total_time){

        $query="INSERT INTO " . $this->table_name . " SET fecha_acceso=:fecha_acceso, user=:user, response_time=:response_time, 
        endpoint=:endpoint, created=:created";

        $stmt=$this->conn->prepare($query);

        $this->fecha_acceso=$total_time;
        $this->user=$name;

        $stmt->bindParam(":fecha_acceso",$this->fecha_acceso);
        $stmt->bindParam(":user",$this->user);
        $stmt->bindParam(":response_time",$this->response_time);
        $stmt->bindParam(":endpoint",$this->endpoint);

        echo json_encode(array("message"=>"el coso es: ","da"=>$name));
        echo json_encode($name);
        return $name;

        if($stmt->execute()){
            return true;
        }
        return false;


    }









}


?>