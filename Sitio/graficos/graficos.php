<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Ejemplo de cargar una pagina en un div</title>
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
						
						<div class="titulo">Estad&iacute;sticas</div>							
						             
							<div id="interior_1">
							
								<div id="interior_2">
								
									<input type="button" class="input_button2" value="Grafico 1" onclick="cargarContenido('1')"/>
									<input type="button" class="input_button2" value="Grafico 2" onclick="cargarContenido('2')"/>
									<input type="button" class="input_button2" value="Grafico 3" onclick="cargarContenido('3')"/>
									<input type="button" class="input_button2" value="Grafico 4" onclick="cargarContenido('4')"/>
										
										<div id='contenido'></div>
										
										<script type='text/javascript'>
										// Funcion para cargar un contenido en un div
										function cargarContenido(pagina)
										{
										if(pagina==1)
											{
											$("#contenido").html("<img src='/sitio/graficos/grafico1.php'/>");
											}
										else if (pagina==2)
											{
											$("#contenido").html("<img src='/sitio/graficos/grafico2.php'/>");
											}
										else if (pagina==3){
											$("#contenido").html("<img src='/sitio/graficos/grafico3.php'/>");
											}
										else {
										$("#contenido").html("<img src='/sitio/graficos/grafico4.php'/>");
											
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
