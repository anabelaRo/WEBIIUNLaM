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
		<h3 class="title_h3">Listado de Pasajeros dados de Baja</h3>
		
		<form name="formulario" method="post" action=""  >
			<label class="usu" for="cod_vuelo">Código de Vuelo:</label>
			<input type="text" class="input_text" name="cod_vuelo" id="cod_vuelo"/>
			</br>
			<label class="contr" for="pass">Fecha del Vuelo:</label>
			<input type="text" class="input_text" name="fecha_vuelo" placeholder="YYYY-MM-DD" id="fecha_vuelo"/>
			</br>
			<input type="button" class="input_button" id="enviar"  onclick="generar_listado()" name="generar" value="Generar"/>
		</form>		
	</body>	
</html>	
										