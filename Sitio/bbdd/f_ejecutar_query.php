<?php	
	require_once $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
	
	$query = isset($_POST['query']) ? $_POST['query'] : "";
	$tipo = isset($_POST['tipo_query']) ? $_POST['tipo_query'] : "";
	$campos = isset($_POST['campos']) ? $_POST['campos'] : "";
	
	$db = new Database();
	
	switch($tipo)
	{
		case "S":
			$resultado = $db-> exec_Select($query);
			
			$array_campos = explode ( "|" , $campos ); 

			$salida = "";
			
			foreach ($resultado as $value)
			{
				for($i = 0; $i<count($array_campos); $i++)
				{			
					if($i < count($array_campos)-1)
					{
						echo $salida = $value[$array_campos[$i]] . '|';
					}
					else
					{
						echo $salida = $value[$array_campos[$i]];
					}
				}
			}
		break;
		
		case "I":
			$db-> exec_Insert_Update($query);
		break;                  
	}
	
	$db-> disconnect();
?>