<html>

<head>	
	
	<!--Funcion generica de llamado a AJAX-->
		<script type="text/javascript" src="/sitio/js/recarga_ajax.js"></script>
		<script type="text/javascript" src="/Sitio/js/funciones_validacion.js"></script>
		<!--Funcion generica de llamado a AJAX-->	
    <link rel="stylesheet" type="text/css" href="/Sitio/estilos/graficos.css"/>
	
</head>

	<body>
		
	
	
			<h3 class="title_h3">Inserte rango de fechas a buscar y ciudad de destino</h3>
			<h5>(Formato aaaa-mm-dd)</h5>
		
			<form name="formulario" method="post" action="" >
			
				<label class="usu" for="usuario">Desde:</label>
				<input type="text" class="input_text" name="fecha_desde" id="fecha_desde"/>
				</br>
				
				<label class="contr" for="pass">Hasta:</label>
				<input type="text" class="input_text" name="fecha_hasta" id="fecha_hasta"/>
				</br>
				
				<label class="contr" for="pass">Ciudad:</label>
				<input type="text" class="input_text" name="cdestino" id="cdestino"/>
				</br>
				
				Seleccione tipo de avi�n				
				<select name="codigo" id="codigo">
					<option value='1' selected>Embraer EMB-120
					<option value='2'>Embraer ER-145(C)
					<option value='3'>Embraer ER-145(G)
					<option value='4'>Embraer ER-170
				</select>
			
			<input type="button" class="input_button" id="enviar" onclick="cargarGrafico3()" name="enviar" value="Ingresar"/>
			</form>
			

		
	
		
	</body>	
	
</html>	
										