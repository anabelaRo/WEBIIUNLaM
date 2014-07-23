<html>
	<head>	
	</head>

	<body>
		<?php
			$vNombre = isset($_POST['vNombre']) ? $_POST['vNombre'] : "";
			$vDni = isset($_POST['vDni']) ? $_POST['vDni'] : "";
			$vCodVuelo = isset($_POST['vCodVuelo']) ? $_POST['vCodVuelo'] : "";
			$vOrigen = isset($_POST['vCOrigen']) ? $_POST['vCOrigen'] : "";
			$vDestino = isset($_POST['vCDestino']) ? $_POST['vCDestino'] : "";
			$vFechaVuelo = isset($_POST['vFechaVuelo']) ? $_POST['vFechaVuelo'] : "";
			$vHoraVuelo = isset($_POST['vHoraVuelo']) ? $_POST['vHoraVuelo'] : "";
			$vCodAvion = isset($_POST['vCodAvion']) ? $_POST['vCodAvion'] : "";
			$vClase = isset($_POST['vClase']) ? $_POST['vClase'] : "";
			$vPrecio = isset($_POST['vPrecio']) ? $_POST['vPrecio'] : "";
			$vCodReserva = isset($_POST['vCodReserva']) ? $_POST['vCodReserva'] : "";
		?>
		
		<div id="div_datos_check_in">
			
			<h3 class="title_h3_check">Información de reserva</h3>
			
			<form method="post" target="_blank" name="form_datos_ckeckin" id="form_datos_ckeckinID">
				<!--h2>Información de reserva:</h2-->	
				<!--br/-->										
				<label class="label_text_check" for="nombre">Nombre: </label>
				<input type="text" class="input_text_check" value="<?php echo $vNombre ?>"  disabled />
				<label class="label_text_check_1" for="dni">Dni: </label>
				<input type="text" class="input_text_check_1" value="<?php echo $vDni ?>"  disabled />
				<br/>	
				<label class="label_text_check_2" for="vOrigen">Origen: </label>
				<input type="text" class="input_text_check_2" value="<?php echo $vOrigen ?>"  disabled />
				<br/>
				<label class="label_text_check_3" for="vDestino">Destino: </label>
				<input type="text" class="input_text_check_3" value="<?php echo $vDestino ?>"  disabled />
				<br/>
				<label class="label_text_check_4" for="FSAL">Fecha Salida: </label>
				<input type="text" class="input_text_check_4" value="<?php echo $vFechaVuelo ?>"  disabled />
				<label class="label_text_check_5" for="hora">Hora: </label>
				<input type="text" class="input_text_check_5" value="<?php echo $vHoraVuelo ?>"  disabled />
				<br/>
				<label class="label_text_check_6" for="hora">Clase: </label>
				<input type="text" class="input_text_check_6" value="<?php echo $vClase ?>"  disabled />
				<label class="label_text_check_7" for="hora">Precio: </label>
				<input type="text" class="input_text_check_7" value="<?php echo $vPrecio ?>"  disabled />
				<br/>
				
				<?php
					require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\popUp_Aviones\f_popUp_aviones.php';
					
					echo '<input type="hidden" id="modelo_avion" value="'.$vCodAvion.'"/>';
					
					f_popUp_aviones($vCodAvion, $vCodVuelo, $vFechaVuelo, $vHoraVuelo, $vClase, $vCodReserva);
				?>
				
				<div id="div_botones_check">
					<input type = "hidden"  name= "cod_reserva" value = '<?php echo $vCodReserva;?>'>
					
					<input type="buttom" class="input_button_check" id="btn_datos_check_in" name="btn_datos_check_in" value="BoardingPass" onclick="genera_check_in('<?php echo $vDni;?>','<?php echo $vNombre?>','<?php echo $vOrigen?>','<?php echo $vDestino?>','<?php echo $vClase?>','<?php echo $vFechaVuelo?>','<?php echo $vHoraVuelo?>','<?php echo $vPrecio?>','<?php echo $vCodReserva?>')"/>
				</div>
				
			</form>
			
		</div>
	</body>
</html>