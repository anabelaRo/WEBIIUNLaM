<?php	
	require_once $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
	
	$query = isset($_POST['query']) ? $_POST['query'] : "";
	$tipo = isset($_POST['tipo_query']) ? $_POST['tipo_query'] : "";
	
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

	foreach ($resultado as $value)
	{
		echo $value['cod_reserva']  . " - " . $value['cod_vuelo'] . " - " . $value['cod_usuario'] . " - " . $value['cod_pago'] . " - " . $value['fecha_reserva'] . " - " . $value['flag_check_in'] . " - " . $value['fecha_vuelo'] . " - " . $value['cod_asiento'] . "<br/>";
	}
	
	$db-> disconnect();
?>