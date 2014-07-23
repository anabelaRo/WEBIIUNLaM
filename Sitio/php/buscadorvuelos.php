<html>
	<head>
	</head>
	
	<body>
	
		<?php
			$codvuelo = isset($_POST['codvuelo']) ? $_POST['codvuelo'] : "";
			$origen = isset($_POST['origen']) ? $_POST['origen'] : "";
			$corigen = isset($_POST['corigen']) ? $_POST['corigen'] : "";
			$destino = isset($_POST['destino']) ? $_POST['destino'] : "";
			$cdestino = isset($_POST['cdestino']) ? $_POST['cdestino'] : "";
			$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
			$fsalida = isset($_POST['fsalida']) ? $_POST['fsalida'] : "";
			
			$codvueloV = isset($_POST['codvueloV']) ? $_POST['codvueloV'] : "";
			$origenV = isset($_POST['origenV']) ? $_POST['origenV'] : "";
			$corigenV = isset($_POST['corigenV']) ? $_POST['corigenV'] : "";
			$destinoV = isset($_POST['destinoV']) ? $_POST['destinoV'] : "";
			$cdestinoV = isset($_POST['cdestinoV']) ? $_POST['cdestinoV'] : "";
			$precioV = isset($_POST['precioV']) ? $_POST['precioV'] : "";
			$fregreso = isset($_POST['fregreso']) ? $_POST['fregreso'] : "";

			$clase = isset($_POST['clase']) ? $_POST['clase'] : "";
			$dia_salida = isset($_POST['dia_salida']) ? $_POST['dia_salida'] : "";
			$dia_regreso = isset($_POST['dia_regreso']) ? $_POST['dia_regreso'] : "";
			$ida_vuelta = isset($_POST['ida_vuelta']) ? $_POST['ida_vuelta'] : "";
			
			$check_lista_espera = isset($_POST['check_lista_espera']) ? $_POST['check_lista_espera'] : "";
			
		?>
		
		<div id="div_realizar_reserva">
		
			<h3 class="title_h3_res">Datos del Vuelo de Ida</h3>	

			<form>	
				<label class="label_text_res" for="Origen">Origen: </label> 
				<input type="text" class="input_text_res" value="<?php echo $corigen ?>"  disabled />	
				</br>
				</br>
				<label class="label_text_res_1" for="Destino">Destino: </label> 
				<input type="text" class="input_text_res" value="<?php echo $cdestino ?>"  disabled />
				</br>
				</br>
				<label class="label_text_res_2" for="FSAL">Fecha Salida: </label> 
				<input type="text" class="input_text_res_1" value="<?php echo $fsalida ?>"  disabled />
						
				<?php	
					require_once  $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
					
					echo '	<label class="label_text_res_3" for="hora"> Hora: </label>
								<select class="input_combo_res" id="cmb_hora_vuelo" name="hora">';
	
									$db = new Database();
				
									$filas = $db -> exec_Select (
																				'select 	v.codigo as codvuelo, ' . 
																				'		   v.hora_vuelo as hora_vuelo ' .
																				//'			v.origen as hora_vuelo ' .
																				'from vuelo v ' .
																				'		join aeropuerto ao ' .
																				'			on v.origen = ao.codigo_OACI ' .
																				'		join ciudad co ' .
																				'			on ao.ciudad = co.codigo ' .
																				'		join aeropuerto ad ' .
																				'			on v.destino = ad.codigo_OACI ' .
																				'		join ciudad cd ' .
																				'			on ad.ciudad = cd.codigo ' .
																				'		join avion a ' .
																				'			on a.codigo = v.cod_avion ' .
																				'where ao.codigo_OACI = "' . $origen . '" ' .
																				'and ad.codigo_OACI = "' . $destino . '" ' .
																				'and v.' . $dia_salida . ' = 1 '.
																				'and a.asientos_' . $clase . ' != 0;'
																		 );
									
									foreach ($filas as $value)
									{
										echo '<option value="'.$value['codvuelo'].'">'. $value['hora_vuelo'] .'</option>';
									}
									
									$db -> disconnect();
								
					echo '	</select>';
				?>
				
				</br>
				</br>
				<label class="label_text_res_4" for="Clase">Clase: </label>
				<input type="text" class="input_text_res_1" value="<?php echo $clase ?>"  disabled />
				
				<label class="label_text_res_5" for="Precio">Precio: </label>
				<input type="text" class="input_text_res_1" value="<?php echo '$ ' . $precio ?>"  disabled />
				</br>
				
				<div id="div_botones_res">
					<input type="button" class="input_button_res" id="btn_volver" name="btn_volver" value="Cancelar" onclick="f_volver_buscar()"/>
					
					<?php
					if ($ida_vuelta == "S")
					{?>
						<input type="button" class="input_button_res_1" id="btn_cod_reservar" name="btn_cod_reservar" value="Siguiente" onclick="valida_buscador2('<?php echo $codvuelo?>','<?php echo $origen?>','<?php echo $corigen?>','<?php echo $destino?>','<?php echo $cdestino?>','<?php echo $precio?>','<?php echo $fsalida?>','<?php echo $codvueloV?>','<?php echo $origenV?>','<?php echo $corigenV?>','<?php echo $destinoV?>','<?php echo $cdestinoV?>','<?php echo $precioV?>','<?php echo $fregreso?>','<?php echo $clase?>','<?php echo $dia_salida?>','<?php echo $dia_regreso?>','<?php echo $ida_vuelta?>','<?php echo $check_lista_espera?>')"/>
						<?php
					}
					else
					{?>
						<input type="button" class="input_button_res_1" id="btn_cod_reservar" name="btn_cod_reservar" value="Comenzar Reserva" onclick="valida_reserva('<?php echo $codvuelo?>','<?php echo $origen?>','<?php echo $corigen?>','<?php echo $destino?>','<?php echo $cdestino?>','<?php echo $precio?>','<?php echo $fsalida?>','<?php echo $codvueloV?>','<?php echo $origenV?>','<?php echo $corigenV?>','<?php echo $destinoV?>','<?php echo $cdestinoV?>','<?php echo $precioV?>','<?php echo $fregreso?>','<?php echo $clase?>','<?php echo $dia_salida?>','<?php echo $dia_regreso?>','<?php echo $ida_vuelta?>','<?php echo $check_lista_espera?>')"/>
						<?php
					}
					?>
				</div>
			</form>
		</div>
	</body>	
</html>	
										