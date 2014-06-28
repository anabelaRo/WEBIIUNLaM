<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> Practica Objetos </title>
	</head>
	<body>	
		<?php	
			require_once  $_SERVER{'DOCUMENT_ROOT'} . '/Practicas_Objetos/Clases/Connection_BBDD_Objeto.php';
		
			$db = new Database();
			
			$filas = $db->execute ('select * from alumno');
			
			foreach ($filas as $value)
			{
			   echo $value['Documento']  . " - " . $value['Nombre'] . " - " . $value['Apellido'] . " - " . $value['Carrera'] . "<br/>";
			}
			
			
			$db->disconnect();
			
		?>
		
	</body>
</html>