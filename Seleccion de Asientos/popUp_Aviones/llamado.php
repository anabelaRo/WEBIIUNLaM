<?php
	require_once $_SERVER{'DOCUMENT_ROOT'} . '\popUp_Aviones\f_popUp_aviones.php';
	
	//$modelo_avion = 'EMB-120';
	//$modelo_avion = 'ER-145';
	//$modelo_avion = 'ER-145_2';
	$modelo_avion = 'ER-170';
	
	echo '<input type="hidden" id="modelo_avion" value="'.$modelo_avion.'"/>';
	
	f_popUp_aviones($modelo_avion);
	
	//echo $_GET['variable'] . ' ese es el valor de la variable llamada $variable, que fue enviada mediante GET a este script';
	
	//$texto = isset($_POST['variable']) ? $_POST['variable'] : "";
	
	//echo 'Texto: '.$texto;
?>