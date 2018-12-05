<?php

class Sistema_transporte{


		// Connection instance
		private $conn;

		// table name
		private $table_chofer = "chofer";
		private $table_sistema_vehiculo = "sistema_vehiculo";
		// private $table_vehiculo = "vehiculo";
		private $table_name = "sistema_transporte";


		// table columns
		public $sistema_id;
		public $nombre;
		public $pais_procedencia;
		public $created;
		public $updated;


		public function __construct($conn){
				$this->conn = $conn;
		}


		function create()
		{
				$query="INSERT INTO " . $this->table_name . " SET nombre=:nombre, pais_procedencia=:pais_procedencia, created=:created";

				$stmt = $this->conn->prepare($query);

				//retira las etiquetas HTML y PHP de un string
				$this->nombre=strip_tags($this->nombre);
				$this->pais_procedencia=strip_tags($this->pais_procedencia);
				$this->created=strip_tags($this->created);

				// bind values
				//bindParam= Agrega variables a una sentencia preparada como parámetros(en este caso la query que hicimos)
				//$this->apellido es lo que mando por POSTMAN
				//aca lo blinqueo y lo guardo en :"nombre_campo", porque cuando hago la consulta todavia no tengo guardados los valores mandados por POST
				//por tema de seguridad no se puede poner en la consulta el this


				$stmt->bindParam(":nombre", $this->nombre);
				$stmt->bindParam(":pais_procedencia", $this->pais_procedencia);
				$stmt->bindParam(":created", $this->created);
				// execute query
				if($stmt->execute()){
						return true;
				}
				return false;

		}




		function delete()
		{
				//chofer
				//sistema_vehiculo
				//vehiculo
				//sistema_transporte

				$query_chofer="DELETE FROM " . $this->table_chofer . " WHERE sistema_id=:sistema_id";
				$query_sistema_vehiculo="DELETE FROM " . $this->table_sistema_vehiculo . " WHERE sistema_id=:sistema_id";
				//  $query_vehiculo="DELETE FROM " . $this->table_vehiculo . " WHERE sistema_id=:sistema_id";
				$query_sistema_transporte= "DELETE FROM " . $this->table_name . " WHERE sistema_id=:sistema_id";

				$stmt_chofer=$this->conn->prepare($query_chofer);
				$stmt_sistema_vehiculo=$this->conn->prepare($query_sistema_vehiculo);
				// $stmt->vehiculo=$this->conn->prepare($query_vehiculo);
				$stmt_sistema_transporte=$this->conn->prepare($query_sistema_transporte);


				$this->sistema_id=strip_tags($this->sistema_id);


				$stmt_chofer->bindParam(":sistema_id",$this->sistema_id);
				$stmt_sistema_vehiculo->bindParam(":sistema_id",$this->sistema_id);
				//  $vehiculo->bindParam(":sistema_id",$this->sistema_id);
				$stmt_sistema_transporte->bindParam(":sistema_id",$this->sistema_id);



				// if(($stmt_chofer->execute()) && ($stmt_sistema_vehiculo->execute()) && ($vehiculo->execute()) && ($stmt_sistema_transporte->execute())){
				if(($stmt_chofer->execute()) && ($stmt_sistema_vehiculo->execute()) && ($stmt_sistema_transporte->execute())){

						return true;
				}else{
						return false;
				}


		}






		function read(){

				$query = "SELECT * FROM " . $this->table_name . " ORDER BY created";

				// prepare query statement
				$stmt = $this->conn->prepare($query);

				// execute query
				$stmt->execute();

				return $stmt;

		}




		function update()
		{


				$query="UPDATE " . $this->table_name . " SET nombre=:nombre, pais_procedencia=:pais_procedencia WHERE sistema_id=:sistema_id";


				$stmt=$this->conn->prepare($query);

				//retiramos etiquetas de lo enviado por POST

				$this->sistema_id=strip_tags($this->sistema_id);
				$this->nombre=strip_tags($this->nombre);
				$this->pais_procedencia=strip_tags($this->pais_procedencia);

				//vinculamos el parametro $this->"campo" a la variable :"nombre"
				//(guardamos lo que hay en la referencia en :"nombre")
				//$this->"nombre_campo" es lo enviado por POST


				//$stmt->????
				$stmt->bindParam(":nombre",$this->nombre);
				$stmt->bindParam(":pais_procedencia",$this->pais_procedencia);
				$stmt->bindParam(":sistema_id",$this->sistema_id);

				if($stmt->execute()){
						return true;
				}

				return false;


		}


		function search($keyword)
		{

				$query="SELECT s.sistema_id, s.nombre, s.pais_procedencia, s.created, s.updated FROM 
						" . $this->table_name . " s WHERE s.sistema_id LIKE ? OR s.nombre LIKE ? OR s.pais_procedencia LIKE ? ORDER BY sistema_id DESC";

				$stmt=$this->conn->prepare($query);

				$keyword=strip_tags($keyword);
				// $keyword = "%{$keyword}%";

				$stmt->bindParam(1,$keyword);
				$stmt->bindParam(2,$keyword);
				$stmt->bindParam(3,$keyword);

				$stmt->execute();

				return $stmt;
		}




		}
