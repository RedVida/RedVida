<?php
	
	/**
    API RESTful Básica
	*/

	require_once('../clases/DataBaseHandler.php'); // Incluye un archivo mediante una ruta dada

	//Autentificación HTTP
	if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) { // Verifica que el username y password esten seteados 
	    header("WWW-Authenticate: Basic realm=\"Pagina protegida\""); // BAsic Securuty 
	    header("HTTP\ 1.0 401 Unauthorized");
	    echo 'No estas autorizado para ver este contenido.';
	    exit;
	}
    
    

	//Conectamos a la Base de Datos
	$db = DataBaseHandler::getInstance()->connect(); /*-  DataBaseHandler es una clase que te permite accessar a MYSQL Data base usando parametros
												      - Al conectarte a la base de datos puedes ejecutar un "Crud" (Select,Insert,Update,Delete)
												 	  - Los parametros que les pases tienen que estar definidos en los nombres de las tablas y campos...
													*/
	$method = $_SERVER['REQUEST_METHOD']; // Método de petición empleado para acceder a la página, es decir 'GET', 'HEAD', 'POST', 'PUT'.

	//Dependiendo el método de la petición, 
	switch ($method) {
		case 'GET':
			getMethod();
			break;

		case 'POST':
			postMethod();
			break;			

		case 'PUT':
			putMethod();
			break;	

		case 'DELETE':
			deleteMethod();
			break;

		case 'LOGIN':
			loginMethod();
			break;	
		
		case 'LOGOUT':
			logoutMethod();
			break;

		default:
			break;
	}
    
	function loginMethod(){

		$db = DataBaseHandler::getInstance()->connect();

		session_start();

		header("HTTP/1.1 200 OK" );
		$response['status']=200;
		$response['status_message']="OK";
		$response['data']="";

		$data = json_decode(file_get_contents('php://input'));

		$query= "SELECT * FROM cruge_user WHERE username = '$data->username' and password = '$data->password'";

        $rec = mysql_query($query);
        $count = 0;
        
        if(!isset($_SESSION['userid'])){	
        	while(mysql_fetch_object($rec)){ $count++; } // mysql_fetch_object : Recupera una fila de resultados como un objeto
			
			if($count == 1){ 
				$_SESSION['userid'] = $data->iduser; 
			    echo 'Se a Logeado correctamente';
			}
			else { 
				echo 'Error al iniciar sesión, los datos ingresados no son validos.';
			} 
	    }else{ 
	    	echo 'Ya estas logeado';
	    }

		/* $.ajax({
			    url: "http://localhost:8080/redvida/api/donantes/index.php",
			    type: "POST",
			    data: JSON.stringify({"username":"admin","password":"admin","iduser":"1"}),
			    contentType: "application/json", 

		}); */
	}

	function logoutMethod(){

		session_destroy();

	     echo 'Has cerrado Sesión';
	}

	function getMethod()
	{   
		$db = DataBaseHandler::getInstance()->connect();
	
		header("HTTP/1.1 200 OK" );
		$response['status']=200;
		$response['status_message']="OK";
		$response['data']="";

		$i = 0;

		$query = "SELECT * FROM paciente ";
        
		$data = $db->Execute($query);
		while($data && !$data->EOF) // EOF = End of File , es decir lee hasta que se termine el archivo 
		{
			$pacientes[$i]['id'] = $data->fields[0];
			$i++;
			$data->MoveNext();
		}

		//Codificamos a formato JSON
		echo json_encode($pacientes);
	}

	function postMethod()
	{ 
		$db = DataBaseHandler::getInstance()->connect();

		header("HTTP/1.1 200 OK" );
		$response['status']=200;
		$response['status_message']="OK";
		$response['data']="";

		$data = json_decode(file_get_contents('php://input'));

		$datos['nombre'] = $data->nombre;

		$db->AutoExecute('paciente',$datos, 'INSERT');

		/* $.ajax({
			    url: "http://localhost:8080/redvida/api/donantes/index.php",
			    type: "POST",
			    data: JSON.stringify({"nombre":"hola"}),
			    contentType: "application/json", 

		}); */
	}

	function deleteMethod()
	{ 
		$db = DataBaseHandler::getInstance()->connect();

		header("HTTP/1.1 200 OK" );
		$response['status']=200;
		$response['status_message']="OK";
		$response['data']="";

		$data = json_decode(file_get_contents('php://input'));
        
        $query = "DELETE FROM paciente WHERE id = '$data->id'";

        $data = $db->Execute($query);

      /*  $.ajax({
			    url: "http://localhost:8080/redvida/api/donantes/index.php",
			    type: "DELETE",
			    data: JSON.stringify({"id":"16"}),
			    contentType: "application/json",
			}); */

	}

	function putMethod()
	{ 
		$db = DataBaseHandler::getInstance()->connect();

		header("HTTP/1.1 200 OK" );
		$response['status']=200;
		$response['status_message']="OK";
		$response['data']="";

		$data = json_decode(file_get_contents('php://input'));
        
        $query = "UPDATE paciente SET nombre = '$data->nombre' WHERE id = '$data->id'";

        $data = $db->Execute($query);

      /*  $.ajax({
			    url: "http://localhost:8080/redvida/api/donantes/index.php",
			    type: "PUT",
			    data: JSON.stringify({"id":"16","nombre":"francisco"}),
			    contentType: "application/json",
		   }); */

	}


?>