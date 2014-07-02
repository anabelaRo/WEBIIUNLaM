<?php
	class Database
	{
			private $hostname;
			private $database;
			private $user;
			private $pass;
			private $connection;

		public function __construct()
		{
			$this -> hostname = "localhost";
			$this -> database = "aerolinea";
			$this -> user = "root";
			$this -> pass = "";
			
			$this -> connect();
		}
		
		private function connect()
		{
			$this -> connection = mysql_connect( $this ->hostname, 
															 $this ->user, 
															 $this ->pass);
			
			$db = mysql_select_db($this->database, $this->connection)
					or die ('No se puede seleccionar la base de datos');
		}
		
		private function resultToArray($result)
		{
			$lista = Array();
			
			while($fila = mysql_fetch_assoc($result))
			{
				$lista[] = $fila;
			}
			
			return $lista;
		}
		
		public function disconnect()
		{
			mysql_close($this -> connection);
		}
		
		public function exec_Select ($sql)
		{
			$result = mysql_query($sql, $this->connection)
						or die ('Fallo en la consulta');
			
			return $this->resultToArray($result);
		}
		
		public function exec_Insert_Update ($sql)
		{
			$result = mysql_query($sql, $this->connection)
						or die ('Fallo en la consulta');
		}
	}
?>