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

}

?>