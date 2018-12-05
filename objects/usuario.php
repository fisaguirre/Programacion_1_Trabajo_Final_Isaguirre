<?php

class Usuario{


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

		function create(){
				$query = "INSERT INTO
						" . $this->table_name . "
						SET
						nombre=:nombre, clave=:clave, rol=:rol, created=:created";

				$stmt = $this->conn->prepare($query);


				$this->nombre=strip_tags($this->nombre);
				$this->clave=strip_tags($this->clave);
				$this->rol=strip_tags($this->rol);
				$this->created=strip_tags($this->created);

				$stmt->bindParam(':nombre', $this->nombre);
				$stmt->bindParam(':rol', $this->rol);
				$stmt->bindParam(':created', $this->created);

				$clave_hash = password_hash($this->clave,PASSWORD_BCRYPT);
				$stmt->bindParam(':clave', $clave_hash);


				if($stmt->execute()){
						return true;
				}
				return false;
		}



		function usuarioExists(){


				$query = "SELECT usuario_id, nombre, clave
						FROM " . $this->table_name . "
						WHERE nombre = ?
						LIMIT 0,1";


				$stmt = $this->conn->prepare( $query );

				//sacamos etiquetas
				$this->nombre=strip_tags($this->nombre);

				//relacionamos
				$stmt->bindParam(1, $this->nombre);

				//ejecutamos
				$stmt->execute();

				//vemos si hay registros
				$num = $stmt->rowCount();

				//verificamos si hay registros
				if($num>0){
						//extraemos el registro y lo guardamos en las variables
						$row = $stmt->fetch(PDO::FETCH_ASSOC);
						$this->usuario_id = $row['usuario_id'];
						$this->nombre = $row['nombre'];
						$this->clave = $row['clave'];
						return true;
				}
				return false;
		}



}

?>
