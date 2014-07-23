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
			$hora_ida = isset($_POST['hora_ida']) ? $_POST['hora_ida'] : "";
			$hora_vuelta = isset($_POST['hora_vuelta']) ? $_POST['hora_vuelta'] : "";
			
			$check_lista_espera = isset($_POST['check_lista_espera']) ? $_POST['check_lista_espera'] : "";
		?>
		
		<div id="div_realizar_reserva_1">
		
			<h3 class="title_h3_res_1">Datos del Pasajero</h3>
											
			<form method="post" name="datos_pasajero" action="#">
				<label class="label_text_res" for="nomyape">Nombre y Apellido:</label>
				<input type="text" class="input_text_res" name="nomyape" id="nomyape"/>
				<br/>
				<label class="label_text_res_1" for="dni">D.N.I:</label>
				<input type="text" class="input_text_res" name="dni" id="dni"/>
				<br/>
				<label class="label_text_res_2" for="fnacimiento">F. Nacimiento:</label>
				<input type="text" class="input_text_res" placeholder="YYYY-MM-DD" name="fnacimiento" id="fnacimiento"/>
				<br/>
				<label class="label_text_res_3" for="email">E-Mail:</label>
				<input type="text" class="input_text_res" placeholder="nombre@servidor.dominio" name="email" id="email"/>
				<br/>
				
				<div id="div_botones_res">
					<input type="button" class="input_button_res" id="btn_volver" name="btn_volver" value="Cancelar" onclick="f_volver_buscar()"/>
					<input type="button" class="input_button_res_1" id="btn_dat_pasajero" name="btn_dat_pasajero" value="Siguiente" onclick="val_dat_pasajero('<?php echo $codvuelo?>','<?php echo $origen?>','<?php echo $corigen?>','<?php echo $destino?>','<?php echo $cdestino?>','<?php echo $precio?>','<?php echo $fsalida?>','<?php echo $codvueloV?>','<?php echo $origenV?>','<?php echo $corigenV?>','<?php echo $destinoV?>','<?php echo $cdestinoV?>','<?php echo $precioV?>','<?php echo $fregreso?>','<?php echo $clase?>','<?php echo $dia_salida?>','<?php echo $dia_regreso?>','<?php echo $ida_vuelta?>','<?php echo $hora_ida?>','<?php echo $hora_vuelta?>','<?php echo $check_lista_espera?>')"/>  
				</div>
			</form>
		
		</div>
		
	</body>	
</html>	