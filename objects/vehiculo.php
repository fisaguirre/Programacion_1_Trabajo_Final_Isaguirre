<?php

class Vehiculo{

		// Connection instance
		private $conn;

		// table name
		private $table_name = "vehiculo";
		private $table_sistema = "sistema_vehiculo";
		private $table_chofer = "chofer";

		// table columns
		public $vehiculo_id;
		public $patente;
		public $anho_patente;
		public $anho_fabricacion;
		public $marca;
		public $modelo;
		public $created;
		public $updated;

		//
		public $sistema_id = [];
		//public $sistema_id;



		public function __construct($conn){
				$this->conn = $conn;
		}


		function read()
		{
				$query="SELECT * FROM " . $this->table_name . " ORDER BY patente";
				// $query="SELECT patente FROM " . $this->table_name . " ";

				$stmt=$this->conn->prepare($query);

				$stmt->execute();

				return $stmt;
		}


		function create()
		{
				//query para crear vehiculo
				$query="INSERT INTO " . $this->table_name . " SET patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion,
						marca=:marca, modelo=:modelo, created=:created";
				$stmt=$this->conn->prepare($query);

				$this->patente=strip_tags($this->patente);
				$this->anho_patente=strip_tags($this->anho_patente);
				$this->anho_fabricacion=strip_tags($this->anho_fabricacion);
				$this->marca=strip_tags($this->marca);
				$this->modelo=strip_tags($this->modelo);
				$this->created=strip_tags($this->created);

				$stmt->bindParam(":patente",$this->patente);
				$stmt->bindParam(":anho_patente",$this->anho_patente);
				$stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
				$stmt->bindParam(":marca",$this->marca);
				$stmt->bindParam(":modelo",$this->modelo);
				$stmt->bindParam(":created",$this->created);


				//query para seleccionar vehiculo_id
				$query_select="SELECT vehiculo_id FROM " . $this->table_name . " WHERE patente=:patente";
				$stmt_select=$this->conn->prepare($query_select);

				$stmt_select->bindParam(":patente",$this->patente);

				//query para relacionar vehiculo con transporte
				$query_sistema="INSERT INTO " . $this->table_sistema . " SET vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";
				$stmt_sistema=$this->conn->prepare($query_sistema);

				$this->vehiculo_id=strip_tags($this->vehiculo_id);
				//$this->sistema_id=strip_tags($this->sistema_id);

				$stmt_sistema->bindParam(":vehiculo_id",$this->vehiculo_id);
				//  $stmt_sistema->bindParam(":sistema_id",$this->sistema_id);
				$stmt_sistema->bindParam(":created",$this->created);


				try{
						$this->conn->beginTransaction();
						$stmt->execute();
						$stmt_select->execute();

						$row_select= $stmt_select->fetch(PDO::FETCH_ASSOC);
						$this->vehiculo_id=$row_select["vehiculo_id"];

						// $stmt_sistema->bindParam(":sistema_id",$this->sistema_id);

						for($i=0; $i<count($this->sistema_id); $i++){
								$var = $this->sistema_id[$i];
								echo json_encode($var);
								$stmt_sistema->bindParam(":sistema_id", $var);
								$stmt_sistema->execute();
						}

						//      $stmt_sistema->execute();
						if($this->conn->commit()){
								return true;
								// echo json_encode(array("message"=>"asd"));

						}
				}catch(Exception $e){
						echo json_encode($e->getMessage());
						$this->conn->rollback();
						return false;

				}


		}

		function update()
		{

				//nunca poner FROM con UPDATE
				$query="UPDATE " . $this->table_name . " SET patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion,
						marca=:marca, modelo=:modelo WHERE vehiculo_id=:vehiculo_id";

				$stmt=$this->conn->prepare($query);

				//sacamos etiquetas
				$this->patente=strip_tags($this->patente);
				$this->anho_patente=strip_tags($this->anho_patente);
				$this->anho_fabricacion=strip_tags($this->anho_fabricacion);
				$this->marca=strip_tags($this->marca);
				$this->modelo=strip_tags($this->modelo);
				$this->vehiculo_id=strip_tags($this->vehiculo_id);

				//relacionamos
				$stmt->bindParam(":patente",$this->patente);
				$stmt->bindParam(":anho_patente",$this->anho_patente);
				$stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
				$stmt->bindParam(":marca",$this->marca);
				$stmt->bindParam(":modelo",$this->modelo);
				$stmt->bindParam(":vehiculo_id",$this->vehiculo_id);


				//   $stmt->execute();

				//para borrar los que no ingreso por array
				/*      $cantidad=count($this->sistema_id);
						$i=0;
						while($i<$cantidad){
						$query_bo="DELETE FROM " . $this->table_sistema . " WHERE vehiculo_id LIKE ? AND NOT sistema_id LIKE ? ";
						$stmt_bo=$this->conn->prepare($query_bo);
						$stmt_bo->bindParam(1,$this->vehiculo_id);
						$stmt_bo->bindParam(2,$this->sistema_id[$i]);
						$var[$i]=$this->sistema_id[$i];
						$i++;
						$stmt_bo->execute();
						}
				 */

				$query_insert = "INSERT IGNORE INTO " . $this->table_sistema . " SET vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created";
				$stmt_insert=$this->conn->prepare($query_insert);

				$stmt_insert->bindParam(":vehiculo_id", $this->vehiculo_id);
				$stmt_insert->bindParam(":created", $this->created);

				/*   for($i=0; $i<count($this->sistema_id); $i++){

					 $aux = $this->sistema_id[$i];
					 $stmt_insert->bindParam(":sistema_id", $aux);
					 $stmt_insert->execute();

					 }
				 */

				try{
						$this->conn->beginTransaction();
						$stmt->execute();

						$cantidad=count($this->sistema_id);
						$i=0;
						while($i<$cantidad){
								$query_bo="DELETE FROM " . $this->table_sistema . " WHERE vehiculo_id LIKE ? AND NOT sistema_id LIKE ? ";
								$stmt_bo=$this->conn->prepare($query_bo);
								$stmt_bo->bindParam(1,$this->vehiculo_id);
								$stmt_bo->bindParam(2,$this->sistema_id[$i]);
								$var[$i]=$this->sistema_id[$i];
								$i++;
								$stmt_bo->execute();
						}

						for($i=0; $i<count($this->sistema_id); $i++){

								$aux = $this->sistema_id[$i];
								$stmt_insert->bindParam(":sistema_id", $aux);
								$stmt_insert->execute();

						}
						if($this->conn->commit()){
								return true;
						}
				}catch(Exception $e){
						echo json_encode($e->getMessage());
						$this->conn->rollBack();
						return false;
				}

		}



		function delete()
		{

				$query_sistema= "DELETE FROM " . $this->table_sistema . " WHERE vehiculo_id=:vehiculo_id";
				$stmt_sistema=$this->conn->prepare($query_sistema);

				$query_chofer="DELETE FROM " . $this->table_chofer . " WHERE vehiculo_id=:vehiculo_id";
				$stmt_chofer=$this->conn->prepare($query_chofer);

				$query="DELETE FROM " . $this->table_name . " WHERE vehiculo_id=:vehiculo_id";
				$stmt=$this->conn->prepare($query);

				$this->vehiculo_id=strip_tags($this->vehiculo_id);


				$stmt_sistema->bindParam(":vehiculo_id",$this->vehiculo_id);
				$stmt->bindParam(":vehiculo_id",$this->vehiculo_id);
				$stmt_chofer->bindParam(":vehiculo_id",$this->vehiculo_id);


				if(($stmt_sistema->execute()) && ($stmt_chofer->execute()) && ($stmt->execute())){
						return true;
				}else{
						return false;
				}


		}


		function search($keyword)
		{


				$query="SELECT * FROM " . $this->table_name . " WHERE vehiculo_id LIKE ? OR patente LIKE ? 
						OR anho_patente LIKE ? OR anho_fabricacion LIKE ? 
						OR marca LIKE ? OR modelo LIKE ? ORDER BY created DESC";

				// $query="SELECT * FROM " . $this->table_name . " WHERE vehiculo_id LIKE ? ORDER BY vehiculo_id";

				$stmt=$this->conn->prepare($query);

				$keyword=strip_tags($keyword);
				//  $keyword = "%{$keyword}%";

				$stmt->bindParam(1,$keyword);
				$stmt->bindParam(2,$keyword);
				$stmt->bindParam(3,$keyword);
				$stmt->bindParam(4,$keyword);
				$stmt->bindParam(5,$keyword);
				$stmt->bindParam(6,$keyword);

				$stmt->execute();

				return $stmt;


		}

}





?>
