<?php



class Admin{

    private $conn;

    private $table_name = "usuarios";

    public $usuario_id;
    public $nombre;
    public $clave;

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
        }else if($cantidad=0){
            echo "es asi";
        }

            /*
            while($fila2=$ejecutarsql->fetch(PDO::FETCH_ASSOC)){
                  if($fila2['rol']=='usuario'){
                    header('location: Usuario.php');
                  }else if($fila2['rol']=='admin'){
                    header('location: menu.php');
                  }else{
                    header('location: Login.html');
                  } 
              }
            }else{
              header('location: Login.html');
            }
            */
        }
    }


?>