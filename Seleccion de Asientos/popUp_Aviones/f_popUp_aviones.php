<?php
	function f_popUp_aviones($modelo_avion)
	{
		echo '	<html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
						<link rel="stylesheet" type="text/css" href="estilos/popUp.css" />
						<link rel="stylesheet" type="text/css" href="estilos/aviones.css" />
						<script type="text/javascript" src="js/popUp.js"></script>
					</head>
					
					<body>
						<div id="div_asiento">
							<a href="#openModal" onclick="resize_popUp()">
								<div id="btn_asiento">
									<span>Seleccionar asiento</span>
								</div> 
							</a>
						</div>
						
						<div id="openModal" class="modalDialog">
							<div id="div_popUp">
								<a href="#close" title="Cerrar" class="close"> X </a>';
		
									require_once $_SERVER{'DOCUMENT_ROOT'} . '\popUp_Aviones\f_generar_asientos.php';

									f_generar_asientos($modelo_avion);
								
						echo '	<div id="div_aceptar">
									<a href="#close" onclick="aceptar()">
										<div id="btn_aceptar">
											<span>Aceptar</span>
										</div> 
									</a>
								</div>
							</div>
						</div>
					</body>
				</html>';
	}
?>