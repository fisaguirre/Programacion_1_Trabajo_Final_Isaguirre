<?php

//$this-> = se utiliza para hacer referencia al objeto(instancia) actual, para variables o metodos no estaticos
//no se puede hacer referencia a metodos estaticos con this, pero si a privados,protegidos y publicos
//self = se utiliza para referenciar a la clase actual, para variables o metodos estaticos
//parent = se utiliza cuando se quiere acceder a una constante o metodo de la clase padre
//:: = se utiliza para referenciar funciones en clases que aun no tienen instancias
class Chofer{

    // Connection instance
    private $conn;

    // table name
    private $table_name = "chofer";

    // table columns, object properties
    public $chofer_id;
    public $apellido;
    public $nombre;
    public $documento;
    public $email;
    public $vehiculo_id;
    public $sistema_id;
    public $created;
    public $updated;

    //creo el constructor con parametro $db
    //accedo a la variable connection y guardo el valor $db
    public function __construct($db){
        $this->conn = $db;
    }


    /*
    public function create(){
      $sql = "INSERT INTO ". $this->table_name ." SET chofer_id=:chofer_id, apellido=:apellido, nombre=:nombre, document=:documento, email=:email, vehiculo_id=:vehiculo_id, created=:created, updated=:updated";

      //preparar sql
      $stmt = $this->connection->prepare($sql);

      // Sanitize - Security!
      //stripp_tags -> elimina toda etiqueta html
      //htmlspecialchars-> convierte caracteres especiales a entidades HTML

      $this->chofer_id=htmlspecialchars(strip_tags($this->chofer_id));
      $this->apellido=htmlspecialchars(strip_tags($this->apellido));
      $this->nombre=htmlspecialchars(strip_tags($this->nombre));
      $this->documento=htmlspecialchars(strip_tags($this->documento));
      $this->email=htmlspecialchars(strip_tags($this->email));
      $this->vehiculo_id=htmlspecialchars(strip_tags($this->vehiculo_id));
      $this->sistema_id=htmlspecialchars(strip_tags($this->sistema_id));
      $this->created=htmlspecialchars(strip_tags($this->created));
      $this->updated=htmlspecialchars(strip_tags($this->updated));



    }*/

    // read products
function read(){

    // select all query
  //pos  $query = "SELECT chofer.nombre, sistema_vehiculo.sistemavehiculo_id FROM chofer LEFT JOIN sistema_vehiculo ON chofer.vehiculo_id = sistema_vehiculo.sistemavehiculo_id";
/*
               $query = "SELECT
                         c.chofer_id, c.apellido, c.nombre, c.documento, c.email, v.vehiculo_id, c.sistema_id, c.created, c.updated, v.patente
                      FROM
                          " . $this->table_name . " c
                          INNER JOIN
                          vehiculo v
                              ON c.vehiculo_id = v.vehiculo_id
                          INNER JOIN
                          sistema_transporte s
                              ON c.sistema_id = s.sistema_id
                      ORDER BY
                          c.created DESC";*/
$query= "SELECT * FROM chofer";


  /*  $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";
*/
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}

}
