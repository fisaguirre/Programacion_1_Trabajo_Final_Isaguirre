<?php


class Admin{

    private $conn;

    private $table_name = "usuarios";

    public $usuario_id;
    public $nombre;
    public $clave;
    public $created;
    public $updated;

    public function __construct($db){
        $this->conn = $db;
    }


    function verificar($a,$b){

        $this->nombre=$a;
        $this->clave=$b;
        //no me anduvo con comas tuve que poner AND
        $query="SELECT * FROM " . $this->table_name . " WHERE nombre=:nombre";
        
        $stmt=$this->conn->prepare($query);

        $stmt->bindParam(":nombre",$this->nombre);
       // $stmt->bindParam(":clave",$this->clave);

        $stmt->execute();

        $cantidad = $stmt->rowCount();

        if($cantidad>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->usuario_id=$row['usuario_id'];
            $this->nombre=$row['nombre'];
            $this->clave=$row['clave'];
            $this->rol=$row['rol'];
            return true;
        }else{
            return false;            
        }
    }


        function read(){


            $query="SELECT u.usuario_id, u.nombre, 
            u.rol, u.created, u.updated 
            FROM " . $this->table_name . " u ORDER BY u.nombre DESC";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
            
            return $stmt;

        }



        function create(){

            $query="INSERT INTO " . $this->table_name . " SET nombre=:nombre, clave=:clave, rol=:rol, created=:created";

            $stmt=$this->conn->prepare($query);

            $this->nombre=strip_tags($this->nombre);
            $this->clave=strip_tags($this->clave);
            $this->rol=strip_tags($this->rol);
            $this->created=strip_tags($this->created);

            $stmt->bindParam(":nombre",$this->nombre);
            $stmt->bindParam(":rol",$this->rol);
            $stmt->bindParam(":created",$this->created);

            $clave_hash = password_hash($this->clave,PASSWORD_BCRYPT);
            $stmt->bindParam(':clave', $clave_hash);

            if($stmt->execute()){
                return true;
            }
                return false;
            
        }


        function update(){
            $query="UPDATE " . $this->table_name . " SET nombre=:nombre, clave=:clave, rol=:rol WHERE usuario_id=:usuario_id";

            $stmt=$this->conn->prepare($query);

            $stmt->bindParam(":usuario_id",$this->usuario_id);
            $stmt->bindParam(":nombre",$this->nombre);
            $stmt->bindParam(":clave",$this->clave);
            $stmt->bindParam(":rol",$this->rol);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        function delete(){
            $query="DELETE FROM " . $this->table_name . " WHERE usuario_id=:usuario_id";

            $stmt=$this->conn->prepare($query);

            $stmt->bindParam(":usuario_id",$this->usuario_id);

            if($stmt->execte()){
                return true;
            }else{
                return false;
            }
        }


    }


?>