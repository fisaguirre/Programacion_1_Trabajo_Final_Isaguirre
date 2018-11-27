<?php
class Vehiculo{

    // Connection instance
    private $conn;

    // table name
    private $table_name = "vehiculo";

    // table columns
    public $vehiculo_id;
    public $patente;
    public $anho_patente;
    public $anho_fabricacion;
    public $marca;
    public $modelo;
    public $created;
    public $updated;

    public function __construct($conn){
        $this->conn = $conn;
    }


    function read()
    {
        $query="SELECT * FROM " . $this->table_name . " ORDER BY patente";
       // $query="SELECT patente FROM " . $this->table_name . " ";

        $stmt=$this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }


    function create()
    {
        $query="INSERT INTO " . $this->table_name . " SET patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion,
        marca=:marca, modelo=:modelo, created=:created";

        $stmt=$this->conn->prepare($query);

        $this->patente=strip_tags($this->patente);
        $this->anho_patente=strip_tags($this->anho_patente);
        $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
        $this->marca=strip_tags($this->marca);
        $this->modelo=strip_tags($this->modelo);
        $this->created=strip_tags($this->created);


        $stmt->bindParam(":patente",$this->patente);
        $stmt->bindParam(":anho_patente",$this->anho_patente);
        $stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
        $stmt->bindParam(":marca",$this->marca);
        $stmt->bindParam(":modelo",$this->modelo);
        $stmt->bindParam(":created",$this->created);

        if($stmt->execute())
        {
            return true;
        }
        return false;

    }

    function update()
    {

        //nunca poner FROM con UPDATE
        $query="UPDATE " . $this->table_name . " SET patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion,
         marca=:marca, modelo=:modelo WHERE vehiculo_id=:vehiculo_id";
         
         $stmt=$this->conn->prepare($query);

         //sacamos etiquetas
         $this->patente=strip_tags($this->patente);
         $this->anho_patente=strip_tags($this->anho_patente);
         $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
         $this->marca=strip_tags($this->marca);
         $this->modelo=strip_tags($this->modelo);
         $this->vehiculo_id=strip_tags($this->vehiculo_id);

         

         //relacionamos
         $stmt->bindParam(":patente",$this->patente);
         $stmt->bindParam(":anho_patente",$this->anho_patente);
         $stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
         $stmt->bindParam(":marca",$this->marca);
         $stmt->bindParam(":modelo",$this->modelo);
         $stmt->bindParam(":vehiculo_id",$this->vehiculo_id);

         if($stmt->execute()){
            return true;
        }
        
        return false;
        

    }

}

?>