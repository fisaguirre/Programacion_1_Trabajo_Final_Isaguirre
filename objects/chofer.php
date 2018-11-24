<?php

//$this-> = se utiliza para hacer referencia al objeto(instancia) actual, para variables o metodos no estaticos
//no se puede hacer referencia a metodos estaticos con this, pero si a privados,protegidos y publicos
//self = se utiliza para referenciar a la clase actual, para variables o metodos estaticos
//parent = se utiliza cuando se quiere acceder a una constante o metodo de la clase padre
//:: = se utiliza para referenciar funciones en clases que aun no tienen instancias

//clase Chofer del objeto chofer
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

function read(){

    // select all query
    $query = "SELECT v.modelo as modelo_vehiculo, c.apellido, c.nombre, c.documento,
     c.email, c.vehiculo_id, c.sistema_id
      FROM " . $this->table_name . " c LEFT JOIN vehiculo v ON c.vehiculo_id = v.vehiculo_id
       ORDER BY c.documento";


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

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}


function create()
{
  $query="INSERT INTO " . $this->table_name . " SET nombre=:nombre, apellido=:apellido, documento=:documento, email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";

  $stmt = $this->conn->prepare($query);

      //retira las etiquetas HTML y PHP de un string
      $this->apellido=strip_tags($this->apellido);
      $this->nombre=strip_tags($this->nombre);
      $this->documento=strip_tags($this->documento);
      $this->email=strip_tags($this->email);
      $this->vehiculo_id=strip_tags($this->vehiculo_id);
      $this->sistema_id=strip_tags($this->sistema_id);
      $this->created=strip_tags($this->created);

      // bind values
      //bindParam= Agrega variables a una sentencia preparada como parámetros(en este caso la query que hicimos)
      //$this->apellido es lo que mando por POSTMAN
      //aca lo blinqueo y lo guardo en :"nombre_campo", porque cuando hago la consulta todavia no tengo guardados los valores mandados por POST
      //por tema de seguridad no se puede poner en la consulta el this
      $stmt->bindParam(":apellido", $this->apellido);
      $stmt->bindParam(":nombre", $this->nombre);
      $stmt->bindParam(":documento", $this->documento);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
      $stmt->bindParam(":sistema_id", $this->sistema_id);
      $stmt->bindParam(":created", $this->created);
      // execute query
      if($stmt->execute()){
          return true;
      }
      return false;

}

}
