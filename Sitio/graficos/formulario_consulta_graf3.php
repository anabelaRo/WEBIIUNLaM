<html>

<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!--Funcion generica de llamado a AJAX-->
		<script type="text/javascript" src="/sitio/js/recarga_ajax.js"></script>
		<script type="text/javascript" src="/Sitio/js/funciones_validacion.js"></script>
		<!--Funcion generica de llamado a AJAX-->	
    <link rel="stylesheet" type="text/css" href="/Sitio/estilos/graficos.css"/>
	
</head>

	<body>
		
	
			<br/>
			<h3 class="title_h3">Ingrese rango de fechas, ciudad de destino y avi&oacute;n</h3>
		
			<form name="formulario" method="post" action="" >
			
				<label class="formu">Desde:</label>
				<input type="text" class="input_text" name="fecha_desde" placeholder="YYYY-MM-DD" id="fecha_desde"/>
				</br>
				
				<label class="formu">Hasta:</label>
				<input type="text" class="input_text" name="fecha_hasta" placeholder="YYYY-MM-DD" id="fecha_hasta"/>
				</br>
				
				<label class="formu">Ciudad:</label>
				<input type="text" class="input_text" name="cdestino" id="cdestino"/>
				</br>
				
				<label class="formu">Avi&oacute;n:</label>			
				<select name="codigo" id="codigo" class="input_text">
					<option value='1' selected>Embraer EMB-120
					<option value='2'>Embraer ER-145(C)
					<option value='3'>Embraer ER-145(G)
					<option value='4'>Embraer ER-170
				</select>
				</br>
				</br>
				
			<input type="button" class="input_button" id="enviar" onclick="cargarGrafico3()" name="enviar" value="Generar"/>
			</form>
			

		
	
		
	</body>	
	
</html>	
										