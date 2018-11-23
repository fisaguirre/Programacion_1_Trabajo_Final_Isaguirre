<?php
class sistema_transporte{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "sistema_transporte";

    // table columns
    public $id;
    public $nombre;
    public $pais_procedencia;
    public $created;
    public $updated;


    public function __construct($connection){
        $this->connection = $connection;
    }


}
