<?php
class vehiculo{

    // Connection instance
    private $connection;

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

    public function __construct($connection){
        $this->connection = $connection;
    }
