<!doctype html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
		<title>Aerolíneas Del Plata</title>
		<link rel="StyleSheet" href="/sitio/estilos/pasaje.css" type="text/css"/>
</head>
	
<body>
	
	<div id="contenedor">
			
		<div id="contenedor1">
				
			<div class="contenedor2">
							
				<div class="titulo">Boarding-Pass</div>							
						             
					<div id="interior_1">
							
						<div id="interior_2">
							<div id="pasaje">
								<img id="imagen_pasaje" src="/Sitio/pasajeQrPdf/temp/boardingpass.png" />
							</div>
			
							<?php
							
								$cod_reserva = $_POST['cod_reserva'];
							
								require_once  $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
							
								$db = new Database();
								
								$filas = $db->exec_Select ("select 	u.nombre_apellido, v.codigo, p.fecha_vuelo, p.clase_pasaje, p.cod_reserva, p.cod_asiento, v.codigo as codvuelo, v.origen, co.descripcion as corigen, v.destino, cd.descripcion as cdestino 
														from pasaje as p 
														join vuelo as v on p.cod_vuelo=v.codigo
														join usuario as u on u.codigo=p.cod_usuario							
														join aeropuerto ao on v.origen = ao.codigo_OACI 
														join ciudad co on ao.ciudad = co.codigo 
														join aeropuerto ad on v.destino = ad.codigo_OACI 
														join ciudad cd on ad.ciudad = cd.codigo
														where p.cod_reserva='$cod_reserva'");
												

								foreach ($filas as $value)
								
								{	echo "<div id='nombre_apellido' class='campos_pasaje'>";
									echo $value['nombre_apellido'];
									echo "</div>";
									
									echo "<div id='cod_vuelo' class='campos_pasaje'>";
									echo $value['codigo'];
									echo "</div>";
									
									echo "<div id='fecha_vuelo' class='campos_pasaje'>";
									echo $value['fecha_vuelo'];
									echo "</div>";
									
									echo "<div id='corigen' class='campos_pasaje'>";
									echo $value['corigen'];
									echo "</div>";
									
									echo "<div id='cdestino' class='campos_pasaje'>";
									echo $value['cdestino'];	
									echo "</div>";
									
									echo "<div id='cod_reserva' class='campos_pasaje'>";
									echo $value['cod_reserva'];
									echo "</div>";
									
									echo "<div id='cod_asiento' class='campos_pasaje'>";
									echo $value['cod_asiento'];
									echo "</div>";
									
									echo "<div id='clase_pasaje' class='campos_pasaje'>";
									if ($value['clase_pasaje']=='e')
										echo $categoria="ECONOMY";
									else echo $categoria="PRIMERA";
									echo "</div>";
								}
				// ********* COMIENZA CODIGO QR ******************
							
								//set it to writable location, a place for temp generated PNG files
								$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;

								//html PNG location prefix
								$PNG_WEB_DIR = 'temp/';

								include "archivosQR/qrlib.php";    
								
								//ofcourse we need rights to create temp dir
								if (!file_exists($PNG_TEMP_DIR))
									mkdir($PNG_TEMP_DIR);

								$filename = $PNG_TEMP_DIR.'test.png';

								$matrixPointSize = 10;
								$errorCorrectionLevel = 'L';
								
								$total="NOMBRE Y APELLIDO:\n" . $value['nombre_apellido']./*en $total se carga lo que se quiere mostrar luego de escanear*/
								"\n\nCODIGO DE VUELO:\n" . $value['codigo'].
								"\n\nFECHA DE VUELO:\n" . $value['fecha_vuelo'].
								"\n\nCODIGO DE RESERVA:\n" . $value['cod_reserva'].
								"\n\nCIUDAD DE ORIGEN:\n" . $value['corigen'].
								"\n\nCIUDAD DE DESTINO:\n" . $value['cdestino'].
								"\n\nCODIGO DE ASIENTO:\n" . $value['cod_asiento'].
								"\n\nCATEGORIA:\n" . $categoria;
								
								
								$filename = $PNG_TEMP_DIR.'test'.md5(/*$_REQUEST[''].*/'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
								QRcode::png($total, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
								
				
								echo 	'<div id="codigo_qr">
											<img src="'.$PNG_WEB_DIR.basename($filename).'" id="codigo_qr_imagen" /><hr/>
										</div>';
										
				// ********* FIN CODIGO QR ******************
				
				
								echo 	'<div id="btn_formulario">';
								echo"<form id='botonImprimir' action='boardingPassPdf.php' method='post' name='impresion'>";										
										echo "<input type='hidden' name='corigen' 			value='$value[corigen]'			/><br>";
										echo "<input type='hidden' name='cdestino' 			value='$value[cdestino]'		/><br>";
										echo "<input type='hidden' name='nombre_apellido' 	value='$value[nombre_apellido]'	/><br>";
										echo "<input type='hidden' name='codigo' 			value='$value[codigo]'			/><br>";
										echo "<input type='hidden' name='fecha_vuelo' 		value='$value[fecha_vuelo]'		/><br>";
										echo "<input type='hidden' name='cod_reserva' 		value='$value[cod_reserva]'		/><br>";				
										echo "<input type='hidden' name='cod_asiento' 		value='$value[cod_asiento]'		/><br>";
										echo "<input type='hidden' name='categoria' 		value='$categoria'				/><br>";
										$db->disconnect();
								?>	
								
										<input type="submit" id="boton_formu" value="Imprimir" name="Boton"/>								
									</form>
							</div>
						</div>
					</div>					
			</div>
		</div>		
	</div>
	
</body>

</html>	
