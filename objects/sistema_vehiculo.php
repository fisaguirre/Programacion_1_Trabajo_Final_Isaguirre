<?php
class sistema_vehiculo{

		// Connection instance
		private $connection;

		// table name
		private $table_name = "sistema_vehiculo";

		// table columns
		public $sistemavehiculo_id;
		public $vehiculo_id;
		public $sistema_id;
		public $created;
		public $updated;


		public function __construct($connection){
				$this->connection = $connection;
		}


}
