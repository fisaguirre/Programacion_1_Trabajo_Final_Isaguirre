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


}
