<html>
	<head>	
		<link href='http://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'/>
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
		
			<form method="post" name="form_datos_ckeckin" action="/sitio/pasajeQrPdf/pasajeElectronico.php">
				<h2>Información de reserva:</h2>	
				<br/><!--<img src="img/flights.png" width="100" height="100" >	-->											
				<label class="nombre" for="nombre">Nombre: </label>	<?php echo $vNombre ?><!--<Bahia Blanca--> 
				<label class="dni" for="dni">Dni: </label>	<?php echo $vDni ?><!--	Villa Gesell-->
				<br/>	
				
				<label class="origen" for="vOrigen">Desde: </label><?php echo $vOrigen ?><!--<Bahia Blanca-->
				<label class="destino" for="vDestino">Hasta: </label><?php echo $vDestino ?><!--	Villa Gesell-->
				<br/>
				
				<label class="vFechaVuelo" for="FSAL">Fecha Salida: </label> <?php echo $vFechaVuelo ?><!--	17/07/2014-->
				<label class="vHoraVuelo" for="hora">Hora: </label> <?php echo $vHoraVuelo ?><!--	17/07/2014-->
				<br/>
				
				<label>Clase: </label> <?php echo $vClase ?>
				<label>Importe: </label> <?php echo $vPrecio ?>
				<br/>

				<?php
					require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\popUp_Aviones\f_popUp_aviones.php';
					echo '<input type="hidden" id="modelo_avion" value="'.$vCodAvion.'"/>';
					f_popUp_aviones($vCodAvion, $vCodVuelo, $vFechaVuelo, $vHoraVuelo, $vClase, $vCodReserva);
				?>
				
<!--				<input type="button" class="input_button" id="btn_sel_asiento" name="btn_sel_asiento" value="Seleccionar asiento" onclick='<?php f_popUp_aviones($modelo_avion);?>'/>
				<input type="submit" class="input_button" id="btn_datos_pago" name="btn_datos_pago" value="Pagar" onclick="genera_pago('<?php echo $dni;?>','<?php echo $nombre?>','<?php echo $origen?>','<?php echo $destino?>','<?php echo $clase?>','<?php echo $fecha?>','<?php echo $hora?>','<?php echo $precio?>','<?php echo $cod_reserva?>')"/>
-->			</form>
		</div>
	</body>
</html>