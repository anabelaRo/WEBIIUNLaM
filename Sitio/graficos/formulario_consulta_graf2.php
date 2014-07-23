<html>

<head>	
	<!--Funcion generica de llamado a AJAX-->
		<script type="text/javascript" src="/sitio/js/recarga_ajax.js"></script>
		<script type="text/javascript" src="/Sitio/js/funciones_validacion.js"></script>
		<!--Funcion generica de llamado a AJAX-->	
    <link rel="stylesheet" type="text/css" href="/Sitio/estilos/graficos.css"/>
	
</head>

	<body>
			<br/>
			<h3 class="title_h3">Ingrese rango de fechas y ciudad de destino</h3>
		
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
				</br>
				
			
			<input type="button" class="input_button" id="enviar"  name="enviar" onclick="cargarGrafico2()" value="Generar"/>
			</form>

		
	</body>	
	
</html>	
										