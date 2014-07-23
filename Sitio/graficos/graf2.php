
<html>

<head>	
	
	<!--Funcion generica de llamado a AJAX-->
		<script type="text/javascript" src="/sitio/js/recarga_ajax.js"></script>
		<script type="text/javascript" src="/Sitio/js/funciones_validacion.js"></script>
		<!--Funcion generica de llamado a AJAX-->	
    <link rel="stylesheet" type="text/css" href="/Sitio/estilos/graficos.css"/>
	
</head>

	<body>
<?php
	$fecha_desde = isset($_POST['fecha_desde']) ? $_POST['fecha_desde'] : "";
	$fecha_hasta = isset($_POST['fecha_hasta']) ? $_POST['fecha_hasta'] : "";
	$cdestino = isset($_POST['cdestino']) ? $_POST['cdestino'] : "";

	
	echo"<img src='/sitio/graficos/grafico2.php?fecha_desde=$fecha_desde&fecha_hasta=$fecha_hasta&cdestino=$cdestino'>";
					
?>	
</body>
</html>