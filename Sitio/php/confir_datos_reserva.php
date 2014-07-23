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
			
			$nomyape = isset($_POST['nomyape']) ? $_POST['nomyape'] : "";
			$dni = isset($_POST['dni']) ? $_POST['dni'] : "";
			$fnacimiento = isset($_POST['fnacimiento']) ? $_POST['fnacimiento'] : "";
			$email = isset($_POST['email']) ? $_POST['email'] : "";
			
			$hora_ida = isset($_POST['hora_ida']) ? $_POST['hora_ida'] : "";
			$hora_vuelta = isset($_POST['hora_vuelta']) ? $_POST['hora_vuelta'] : "";
			
			$check_lista_espera = isset($_POST['check_lista_espera']) ? $_POST['check_lista_espera'] : "";
			
		?>
		
		<div id="div_realizar_reserva_2">
		
			<?php
				if ($ida_vuelta == 'N')
				{
			?>
					<h3 class="title_h3_res">Confirmar datos de Ida</h3>
					<br/>							
					<label class="label_text_res" for="origen">Origen:</label>
					<input type="text" class="input_text_res" value="<?php echo $corigen ?>"  disabled />
					<br/>
					<br/>
					<label class="label_text_res_1" for="destino">Destino:</label>
					<input type="text" class="input_text_res" value="<?php echo $cdestino ?>"  disabled />
					<br/>
					<br/>
					<label class="label_text_res_2" for="fsalida">F. Salida:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $fsalida ?>"  disabled />

					<label class="label_text_res_3" for="hora" id="lbl_hora">Hora:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $hora_ida ?>"  disabled />
					
					<label class="label_text_res_6" for="hora" id="lbl_lista">Lista de Espera:</label>
					<?php
					if ($check_lista_espera != '')
					{
					?>
						<input type="text" class="input_text_res_2" value="Si" disabled />
					<?php
					}
					else
					{
					?>
						<input type="text" class="input_text_res_2" value="No" disabled />
					<?php
					}
					?>
					
					<br/>
					<br/>
					<label class="label_text_res_4" for="clase">Clase:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $clase ?>"  disabled />
					
					<label class="label_text_res_5" for="precio" id="lbl_precio">Precio: </label>
					<input type="text" class="input_text_res_1" value="<?php echo '$'. $precio ?>"  disabled />
						
					<br/>	<br/>
			<?php 
				}
				else
				{
			?>
					<h3 class="title_h3_res">Confirmar datos de Ida</h3>
													
					<label class="label_text_res" for="origen">Origen:</label>
					<input type="text" class="input_text_res" value="<?php echo $corigen ?>"  disabled />
					<br/>
					<label class="label_text_res_1" for="destino">Destino:</label>
					<input type="text" class="input_text_res" value="<?php echo $cdestino ?>"  disabled />
					<br/>
					<label class="label_text_res_2" for="fsalida">F. Salida:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $fsalida ?>"  disabled />

					<label class="label_text_res_3" for="hora" id="lbl_hora">Hora:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $hora_ida ?>"  disabled />
					
					<label class="label_text_res_6" for="hora" id="lbl_lista">Lista de Espera:</label>
					<?php
					if ($check_lista_espera != '')
					{
					?>
						<input type="text" class="input_text_res_2" value="Si" disabled />
					<?php
					}
					else
					{
					?>
						<input type="text" class="input_text_res_2" value="No" disabled />
					<?php
					}
					?>
					
					<br/>
					<label class="label_text_res_4" for="clase">Clase:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $clase ?>"  disabled />
					
					<label class="label_text_res_5" for="precio" id="lbl_precio">Precio: </label>
					<input type="text" class="input_text_res_1" value="<?php echo '$ '. $precio ?>"  disabled />
						
					<br/>	
					
					<h3 class="title_h3_res_1">Confirmar datos de Vuelta</h3>
												
					<label class="label_text_res" for="origen">Origen:</label>
					<input type="text" class="input_text_res" value="<?php echo $corigenV ?>"  disabled />
					<br/>
					<label class="label_text_res_1" for="destino">Destino:</label>
					<input type="text" class="input_text_res" value="<?php echo $cdestinoV ?>"  disabled />
					<br/>
					<label class="label_text_res_2" for="fsalida">F. Salida:</label> 
					<input type="text" class="input_text_res_1" value="<?php echo $fregreso ?>"  disabled />
					
					<label class="label_text_res_3" for="hora" id="lbl_hora">Hora:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $hora_vuelta ?>"  disabled />
					
					<label class="label_text_res_6" for="hora" id="lbl_lista">Lista de Espera:</label>
					<?php
					if ($check_lista_espera != '')
					{
					?>
						<input type="text" class="input_text_res_2" value="Si" disabled />
					<?php
					}
					else
					{
					?>
						<input type="text" class="input_text_res_2" value="No" disabled />
					<?php
					}
					?>
					
					<br/>
					<label class="label_text_res_4" for="clase">Clase:</label>
					<input type="text" class="input_text_res_1" value="<?php echo $clase ?>"  disabled />
					
					<label class="label_text_res_5" for="precio" id="lbl_precio">Precio: </label>
					<input type="text" class="input_text_res_1" value="<?php echo '$ '. $precioV ?>"  disabled />
					
					<br/>
			<?php
				}
			?>
			
			<div id="div_botones_res">
				<input type="button" class="input_button_res" id="btn_volver" name="btn_volver" value="Cancelar" onclick="f_volver_buscar()"/>		
				<input type="button" class="input_button_res_1" id="btn_confirm_reserv" name="btn_confirm_reserv" value="Reservar" onclick="confirmar_reserva('<?php echo $codvuelo?>','<?php echo $origen?>','<?php echo $corigen?>','<?php echo $destino?>','<?php echo $cdestino?>','<?php echo $precio?>','<?php echo $fsalida?>','<?php echo $codvueloV?>','<?php echo $origenV?>','<?php echo $corigenV?>','<?php echo $destinoV?>','<?php echo $cdestinoV?>','<?php echo $precioV?>','<?php echo $fregreso?>','<?php echo $clase?>','<?php echo $dia_salida?>','<?php echo $dia_regreso?>','<?php echo $ida_vuelta?>','<?php echo $nomyape?>','<?php echo $dni?>','<?php echo $fnacimiento?>','<?php echo $email?>','<?php echo $hora_ida?>','<?php echo $hora_vuelta?>','<?php echo $check_lista_espera?>')"/> 
			</div>
		</div>
	</body>	
</html>	