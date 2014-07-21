<html>

	<head>	
		<link href='http://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
body {
font-family: arial,helvetica;
color: #333;
color: rgba(0,0,0,0.5);

}


label{
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

div#box_pago{
height:600px;
}
div.contenedorb{
width:600px;
overflow: hidden;
float:left;


}

div.topb{
float:left;
clear:both;
margin-right: 30px;



}

div.leftb{
	float:left;
	clear:left;
text-align: right;
margin-right: 3%;
margin-left: 20%;

}

div.rightb{

	float:left;
	clear:right;
	text-align: left;

}
div.bottomb{
clear:
both;
text-align: center;
/*margin-top: 3%;
margin-bottom: 6%;*/
}
span{
	margin: auto 0; 
}
</style>
		
	</head>

	<body>
		<?php
		$origen = isset($_POST['corigen']) ? $_POST['corigen'] : "";
		$destino = isset($_POST['cdestino']) ? $_POST['cdestino'] : "";
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
		$clase = isset($_POST['clase']) ? $_POST['clase'] : "";
		//$codpasaje = isset($_POST['codpasaje']) ? $_POST['codpasaje'] : "";
		$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : "";
		$hora = isset($_POST['hora']) ? $_POST['hora'] : "";

		$dni = isset($_POST['dni']) ? $_POST['dni'] : "";
		$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
		$cod_reserva = isset($_POST['cod_reserva']) ? $_POST['cod_reserva'] : "";
	
		?>
		<div class="contenedorb">
		
		<form method="post" name="form_datos_pago" action="#">

	<h2>Información de reserva:</h2>	
		</br><!--<img src="img/flights.png" width="100" height="100" >	-->											
				<label class="dni" for="dni">Dni: </label>	<?php echo $dni ?><!--	Villa Gesell-->
				<label class="nombre" for="nombre">Nombre: </label>	<?php echo $nombre ?><!--<Bahia Blanca--> 
				</br>	

				<label class="origen" for="Origen">Desde: </label><?php echo $origen ?><!--<Bahia Blanca--> <!--	<?php $origen?>-->
														
				<label class="destino" for="Destino">Hasta: </label><?php echo $destino ?><!--	Villa Gesell-->
				</br>
				
				<label class="fecha" for="FSAL">Fecha Salida: </label>		<?php echo $fecha ?><!--	17/07/2014-->
				<label class="hora" for="hora">Hora: </label>			<?php echo $hora ?><!--	17/07/2014-->
				</br>
				
				<!--label class="label_text" for="forma_Pago">Forma de Pago:</label>
				<input type="text" class="input_text" name="forma_Pago" id="forma_Pago"/-->
				<label class="precio" for="precio">Precio: $ </label><?php echo $precio ?></br>
				<label class="label_text_4" for="forma_Pago">Forma de Pago:</label>
				<select class="input_combo" name="mpago">
					<option value="1"> Débito </option>
					<option value="2"> Crédito </option>
				</select>	
				</br>
				<label class="label_text_1" for="num_tarjeta">Número de Tarjeta:</label>
				<input type="text" class="input_text" name="num_tarjeta" id="num_tarjeta"/>
				<input type="button" class="input_button" id="btn_datos_pago" name="btn_datos_pago" value="Pagar" onclick="genera_pago('<?php echo $dni;?>','<?php echo $nombre?>','<?php echo $origen?>','<?php echo $destino?>','<?php echo $clase?>','<?php echo $fecha?>','<?php echo $hora?>','<?php echo $precio?>','<?php echo $cod_reserva?>')"/>
			<!--<input type="button" class="input_button" id="btn_datos_pago" name="btn_datos_pago" value="Pagar" onclick="genera_pago('<?php echo $dni;?>','<?php echo $nombre?>','<?php echo $origen?>','<?php echo $destino?>','<?php echo $clase?>','<?php echo $codpasaje?>','<?php echo $fecha?>','<?php echo $hora?>','<?php echo $precio?>','<?php echo $cod_reserva?>')"/>-->
		</form>
		</div>
	
	</body>	
</html>	
										