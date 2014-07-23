<html>
	<head>	
		<!--link href='http://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'/-->
		<style type="text/css">
			body {
			font-family: arial,helvetica;
			color: #333;
			color: rgba(0,0,0,0.5);
			}

			label {
				font-size: 1.1em;
				font-weight:bold;
				margin: 0 0px 15px 50px;
			}

			h1 {
				font-family: 'Harabara';
				font-size: 4em;
				color: #222;
			}

			h2 {
				font-family: 'Harabara';
				font-size: 2em;
				color: #222;
			}
			
			h3 {
				font-family: 'Harabara';
				font-size: 1.2em;
				color: #222;
			}

			div#box_pago {
				height:600px;
			}
			
			div.contenedorb {
				width:600px;
				overflow: hidden;
				float:left;
			}

			div.topb {
				float:left;
				clear:both;
				margin-right: 30px;
			}

			div.leftb {
				float:left;
				clear:left;
				text-align: right;
				margin-right: 3%;
				margin-left: 20%;
			}

			div.rightb {
				float:left;
				clear:right;
				text-align: left;
			}

			div.bottomb {
				clear:both;
				text-align: center;
				/*margin-top: 3%;
				margin-bottom: 6%;*/
			}

			span {
				margin: auto 0; 
			}
		</style>
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
		
		<div class="contenedorb">
		
			<form method="post" target="_blank" name="form_datos_ckeckin" id="form_datos_ckeckinID">
				<h2>Información de reserva:</h2>	
				<br/>										
				<label class="nombre" for="nombre">Nombre: </label>	<?php echo $vNombre ?>
				<label class="dni" for="dni">Dni: </label>	<?php echo $vDni ?>
				<br/>	
				<label class="origen" for="vOrigen">Desde: </label><?php echo $vOrigen ?>
				<label class="destino" for="vDestino">Hasta: </label><?php echo $vDestino ?>
				<br/>
				<label class="vFechaVuelo" for="FSAL">Fecha Salida: </label> <?php echo $vFechaVuelo ?>
				<label class="vHoraVuelo" for="hora">Hora: </label> <?php echo $vHoraVuelo ?>
				<br/>
				<label>Clase: </label> <?php echo $vClase ?>
				<label>Importe: </label> <?php echo $vPrecio ?>
				<br/>
				
				<?php
					require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\popUp_Aviones\f_popUp_aviones.php';
					
					echo '<input type="hidden" id="modelo_avion" value="'.$vCodAvion.'"/>';
					
					f_popUp_aviones($vCodAvion, $vCodVuelo, $vFechaVuelo, $vHoraVuelo, $vClase, $vCodReserva);
				?>
				
				<input type = "hidden"  name= "cod_reserva" value = '<?php echo $vCodReserva;?>'>
				
				<input type="buttom" class="input_button" id="btn_datos_check_in" name="btn_datos_check_in" value="BoardingPass" onclick="genera_check_in('<?php echo $vDni;?>','<?php echo $vNombre?>','<?php echo $vOrigen?>','<?php echo $vDestino?>','<?php echo $vClase?>','<?php echo $vFechaVuelo?>','<?php echo $vHoraVuelo?>','<?php echo $vPrecio?>','<?php echo $vCodReserva?>')"/>
			</form>
		</div>
	</body>
</html>