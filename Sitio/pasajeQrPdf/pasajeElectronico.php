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
							
				<div class="titulo">Pasaje Electrónico</div>							
						             
					<div id="interior_1">
							
						<div id="interior_2" style="overflow: scroll">
							<div id="pasaje">
								<img id="imagen_pasaje_electr" src="/Sitio/pasajeQrPdf/temp/pasajeElectronico.png" />
							</div>
			
							<?php
							
								$cod_reserva = $_POST['cod_reserva'];
							
								require_once  $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
							
								$db = new Database();
								
								$filas = $db->exec_Select ("select 	pago.cod_reserva, u.nombre_apellido, u.dni, v.codigo, av.marca, av.modelo,f_pago.descripcion as pago_descr, p.cod_vuelo, pago.importe, pago.nro_tarjeta, p.fecha_reserva,p.fecha_vuelo, p.clase_pasaje, p.cod_reserva, v.codigo as codvuelo, v.origen,co.descripcion as corigen, v.destino, cd.descripcion as cdestino, prOrig.descripcion as provOrigen, prDest.descripcion as provDestino, ao.nombre_aerop as aeropOrigen, ad.nombre_aerop as aeropDestino,pago.codigo as cod_pago
													
																											
														
														from pasaje as p 
														join vuelo as v on p.cod_vuelo=v.codigo 
														join usuario as u on u.codigo=p.cod_usuario	
														join aeropuerto ao on v.origen = ao.codigo_OACI 
														join ciudad co on ao.ciudad = co.codigo 
														join aeropuerto ad on v.destino = ad.codigo_OACI 
														join ciudad cd on ad.ciudad = cd.codigo
														join provincia prOrig on prOrig.codigo = co.cod_prov
														join provincia prDest on prDest.codigo = cd.cod_prov
														join avion as av on av.codigo=v.cod_avion
														join pago on p.cod_reserva = pago.cod_reserva
														join forma_pago f_pago on pago.cod_forma_pago=f_pago.codigo
														where p.cod_reserva='$cod_reserva'");
												

								foreach ($filas as $value)
								
								{	echo "<div id='nombre_apellido_electr' class='campos_pasaje_electr'>";
									echo $value['nombre_apellido'];
									echo "</div>";
									
									echo "<div id='dni_electr' class='campos_pasaje_electr'>";
									echo "DNI " . $value['dni'];
									echo "</div>";
									
									echo "<div id='cod_vuelo_electr' class='campos_pasaje_electr'>";
									echo $value['cod_vuelo'];
									echo "</div>";
									
									echo "<div id='marca_electr' class='campos_pasaje_electr'>";
									echo $value['marca'];
									echo "</div>";
									
									echo "<div id='modelo_electr' class='campos_pasaje_electr'>";
									echo $value['modelo'];
									echo "</div>";
									
									echo "<div id='fecha_vuelo_electr' class='campos_pasaje_electr'>";
									echo $value['fecha_vuelo'];
									echo "</div>";
									
									echo "<div id='fecha_reserva' class='campos_pasaje_electr'>";
									echo $value['fecha_reserva'];
									echo "</div>";
									
									echo "<div id='corigen_electr' class='campos_pasaje_electr'>";
									echo $value['corigen'] . " - " . $value['provOrigen']; 
									echo "</div>";
									
									echo "<div id='cdestino_electr' class='campos_pasaje_electr'>";
									echo $value['cdestino'] . " - " . $value['provDestino'];	
									echo "</div>";
									
									echo "<div id='cod_reserva_electr' class='campos_pasaje_electr'>";
									echo $value['cod_reserva'];
									echo "</div>";
									
									echo "<div id='aeropOrigen' class='campos_pasaje_electr'>";
									echo $value['aeropOrigen'];
									echo "</div>";
									
									echo "<div id='aeropDestino' class='campos_pasaje_electr'>";
									echo $value['aeropDestino'];
									echo "</div>";
									
									echo "<div id='cod_pago' class='campos_pasaje_electr'>";
									echo "Código de pago: " . $value['cod_pago'];
									echo "</div>";
									
									echo "<div id='importe' class='campos_pasaje_electr'>";
									echo "Importe: $" . $value['importe'];
									echo "</div>";
									
									echo "<div id='pago_descr' class='campos_pasaje_electr'>";
									echo "Tipo de pago: " . $value['pago_descr'];
									echo "</div>";
									
									
									if ($value['nro_tarjeta']!=0){
										echo "<div id='nro_tarjeta' class='campos_pasaje_electr'>";										
										echo "Numero de tarjeta: " . $value['nro_tarjeta'];
										echo "</div>";
										}
									
									echo "<div id='clase_pasaje_electr' class='campos_pasaje_electr'>";
									if ($value['clase_pasaje']=='e')
										echo $categoria="Economy";
									else echo $categoria="Primera";
									echo "</div>";
								}
	
							echo '<div id="btn_formulario_electr">';
								echo"<form id='botonImprimir' action='pasajeElectronicoPdf.php' method='post' name='impresion'>";										
										echo "<input type='hidden' name='corigen' 			value='$value[corigen]'			/><br>";
										echo "<input type='hidden' name='cdestino' 			value='$value[cdestino]'		/><br>";
										echo "<input type='hidden' name='nombre_apellido' 	value='$value[nombre_apellido]'	/><br>";										
										echo "<input type='hidden' name='dni' 				value='$value[dni]'				/><br>";
										echo "<input type='hidden' name='cod_vuelo' 		value='$value[cod_vuelo]'		/><br>";
										echo "<input type='hidden' name='fecha_vuelo' 		value='$value[fecha_vuelo]'		/><br>";
										echo "<input type='hidden' name='cod_reserva' 		value='$value[cod_reserva]'		/><br>";
										echo "<input type='hidden' name='categoria' 		value='$categoria'				/><br>";										
										echo "<input type='hidden' name='marca' 			value='$value[marca]'			/><br>";
										echo "<input type='hidden' name='modelo' 			value='$value[modelo]'			/><br>";
										echo "<input type='hidden' name='fecha_reserva' 	value='$value[fecha_reserva]'	/><br>";
										echo "<input type='hidden' name='aeropOrigen' 		value='$value[aeropOrigen]'		/><br>";
										echo "<input type='hidden' name='aeropDestino' 		value='$value[aeropDestino]'	/><br>";
										echo "<input type='hidden' name='cod_pago' 			value='$value[cod_pago]'		/><br>";
										echo "<input type='hidden' name='importe' 			value='$value[importe]'			/><br>";										
										echo "<input type='hidden' name='pago_descr' 		value='$value[pago_descr]'		/><br>";																				
										echo "<input type='hidden' name='nro_tarjeta' 		value='$value[nro_tarjeta]'		/><br>";																				
										echo "<input type='hidden' name='provOrigen' 		value='$value[provOrigen]'		/><br>";																				
										echo "<input type='hidden' name='provDestino' 		value='$value[provDestino]'		/><br>";
										$db->disconnect();
								?>	
								
										<input type="submit" id="boton_formu_electr" value="Imprimir" name="Boton"/>								
									</form>
							</div>
						</div>
					</div>					
			</div>
		</div>		
	</div>
	
</body>

</html>	
