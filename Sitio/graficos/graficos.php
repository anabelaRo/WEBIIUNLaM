<!DOCTYPE html>
<html>
	<head>
		<title>Aerol�neas Del Plata</title>
		<script type="text/javascript" src="/Sitio/js/jquery-1.11.1.js"></script>
		<link rel="stylesheet" type="text/css" href="/Sitio/estilos/graficos.css"/>
	</head>

	<body> 
		<div id="contenedor_grafico">
				
			<?php
			require_once $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/sesion/inicio_sesion.php';
			?>

			<div id="contenedor1">
				<div class="contenedor2">
					<!--div class="titulo">Estad&iacute;sticas</div-->	
					<div class="titulo">Estad�sticas</div>						
					<div id="interior_1">
						<div id="interior_2">
							<div id="id_de_boton">
								<input type="button" class="input_button2" value="Pasajes vendidos" onclick="cargarContenido('1')"/>
								<input type="button" class="input_button2" value="Pasajes vendidos por categor�a y destino" onclick="cargarContenido('2')"/>
								<input type="button" class="input_button2" value="Ocupaci�n por avi�n y destino" onclick="cargarContenido('3')"/>
								<input type="button" class="input_button2" value="Cantidad de reservas ca�das" onclick="cargarContenido('4')"/>
								<input type="button" class="input_button2" value="Lista de espera" onclick="cargarContenido('5')"/>
							</div>	
							
							<div id='contenido'></div>
								
							<script type='text/javascript'>
								// Funcion para cargar un contenido en un div
								function cargarContenido(pagina)
								{
									if(pagina==1)
									{
										$("#contenido").load("/sitio/graficos/formulario_consulta_graf1.php");
									}
									else if (pagina==2)
									{
										$("#contenido").load("/sitio/graficos/formulario_consulta_graf2.php");
									}
									else if (pagina==3)
									{
										$("#contenido").load("/sitio/graficos/formulario_consulta_graf3.php");
									}
									else if (pagina==4)
									{
										$("#contenido").load("/sitio/graficos/formulario_consulta_graf4.php");
									}
									else if (pagina==5)
									{
										$("#contenido").load("/sitio/graficos/formulario_consulta_listado.php");
									}
									else 
									{
										$("#contenido").load("/sitio/graficos/formulario_consulta_graf1.php");
									}
								}
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
