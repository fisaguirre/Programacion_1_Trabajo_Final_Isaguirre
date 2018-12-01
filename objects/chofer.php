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

    
    $query = "SELECT v.modelo as modelo_vehiculo, c.apellido, c.nombre, c.documento,
     c.email, c.vehiculo_id, c.sistema_id, c.created, c.updated
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

      $variable=$this->apellido;

      $stmt->bindParam(":apellido", $variable);
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



function update()
{


  $query="UPDATE " . $this->table_name . " SET nombre=:nombre, apellido=:apellido, documento=:documento,
  email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id WHERE chofer_id=:chofer_id";

  $stmt=$this->conn->prepare($query);

  //retiramos etiquetas de lo enviado por POST
  
  $this->nombre=strip_tags($this->nombre);
  $this->apellido=strip_tags($this->apellido);
  $this->documento=strip_tags($this->documento);
  $this->email=strip_tags($this->email);
  $this->vehiculo_id=strip_tags($this->vehiculo_id);
  $this->sistema_id=strip_tags($this->sistema_id);
  $this->chofer_id=strip_tags($this->chofer_id);

  //vinculamos el parametro $this->"campo" a la variable :"nombre"
  //(guardamos lo que hay en la referencia en :"nombre")
  //$this->"nombre_campo" es lo enviado por POST


  //$stmt->????
  $stmt->bindParam(":nombre",$this->nombre);
  $stmt->bindParam(":apellido",$this->apellido);
  $stmt->bindParam(":documento",$this->documento);
  $stmt->bindParam(":email",$this->email);
  $stmt->bindParam(":vehiculo_id",$this->vehiculo_id);
  $stmt->bindParam(":sistema_id",$this->sistema_id);
  $stmt->bindParam(":chofer_id",$this->chofer_id);



  if($stmt->execute()){
    return true;
}

return false;


}
/*
function verificar($id){
    $query="SELECT chofer_id FROM " . $this->table_name . "";

    $stmt=$this->conn->prepare($query);
    
    $array=array();

    $a=$stmt->fetch
}
*/
function delete()
{


    $query="DELETE FROM " . $this->table_name . " WHERE chofer_id = ?";

    $stmt=$this->conn->prepare($query);

    $this->chofer_id=strip_tags($this->chofer_id);

    $stmt->bindParam(1,$this->chofer_id);


    //si le paso como parametro "$query" no funciona
    //porque ya esta preparada anteriormente(le habia pasado la $query)
    if($stmt->execute())
    {
        return true;
    }

    return false;

}


function search($keyword)
{
/*
    $query="SELECT c.nombre, c.apellido, c.documento, c.email, c.vehiculo_id, c.sistema_id, v.modelo as modelo_nombre FROM " . $this->table_name . " c 
    LEFT JOIN vehiculo v ON c.vehiculo_id = v.vehiculo_id WHERE c.nombre LIKE ? OR v.modelo LIKE ? ORDER BY c.created DESC";
*/
    $query="SELECT * FROM " . $this->table_name . " WHERE chofer_id LIKE ? OR nombre LIKE ? OR apellido LIKE ? OR documento LIKE ? ORDER BY created DESC";
   // $query="SELECT * FROM " . $this->table_name . " WHERE chofer_id LIKE ? AND apellido LIKE ? AND nombre LIKE ? AND documento LIKE ? ORDER BY created DESC";
    //$query = "SELECT * FROM " . $this->table_name . " WHERE chofer_id LIKE ? OR documento LIKE ? ORDER BY created DESC";
   // $query = "SELECT * FROM " . $this->table_name . " WHERE chofer_id LIKE ? ORDER BY created DESC";

    $stmt=$this->conn->prepare($query);

    $keyword=strip_tags($keyword);
    $keyword = "%{$keyword}%";


  //  $keyword2=strip_tags($keyword2);

    //$keyword3=strip_tags($keyword3);

  //  $keyword4=strip_tags($keyword4);
   // $keyword4 = "%{$keyword}%";

    $stmt->bindParam(1,$keyword);
    $stmt->bindParam(2,$keyword);
    $stmt->bindParam(3,$keyword);
    $stmt->bindParam(4,$keyword);



    $stmt->execute();

    return $stmt;
 

}



}
