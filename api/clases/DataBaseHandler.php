<?php

	require_once('adodb5/adodb.inc.php'); // Incluye estos archivos "librerias"
	require_once('datos.db.php');
	
	/**
	* Class: DataBaseHandler
	* Implementación de Singleton
	*/

	class DataBaseHandler  
	{                           // Se definen los atributos

		private $database;
		private $host;
		private $user;
		private $password;
		private $db;
		static private $instance;
		
		private function __construct()  // Se define el constructor
		{
			$this->database = database;
			$this->host = host;
			$this->user = user;
			$this->password = password;
		}

		static public function getInstance()
		{
			if(self::$instance == null){
				self::$instance = new DataBaseHandler();  // self, parent y static son utilizadas para acceder a propiedades y métodos desde el interior de la definición de la clase.
			}											  // self::$instance permite acceder a $instance y icrear unanueva instancia de DataBaseHandler para posteriormente ser utilizada para accesar a la BD
			return self::$instance;
		}

		public function connect()
		{

			if($this->db == null){
				$this->db=NewADOConnection('mysql'); // la clase NewADOConnection proviene de la libreria Adodb que sirve para optmizar la portabilidad del proyecto, ya que nos permire seguir un "estandar" al momento de cambiar de base de datos ya que en este caso es mysql
				$this->db->Connect($this->host,$this->user,$this->password,$this->database);
				return $this->db; // dn nos permitira hacer las consultas sql si los parametros en (connect) son los correctos.
			}else{
				return $this->db;
			}			
		}


	}

?>