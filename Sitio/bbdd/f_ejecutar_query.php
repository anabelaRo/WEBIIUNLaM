<?php	
	require_once $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
	
	function f_ejecutar_query($tipo, $query)
	{
		$db = new Database();
		
		switch($tipo)
		{
			case "S":
				$resultado = $db-> exec_Select($query);
			break;
			
			case "I":
				$resultado = $db-> exec_Insert_Update($query);
			break;                  
		}

		$db-> disconnect();
		
		return $resultado;
	}
?>