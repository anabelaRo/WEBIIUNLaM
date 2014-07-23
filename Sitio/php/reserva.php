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
*/

div.contenedorb{
width:600px;
overflow: hidden;
float:left;


}

div.topb{
float:left;
clear:both;
margin-right: 30px;
margin-bottom: 2%;


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
margin-left: -40%;
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

			$origen = isset($_POST['origen']) ? $_POST['origen'] : "";
			$destino = isset($_POST['destino']) ? $_POST['destino'] : "";

			$codvuelo = isset($_POST['codvuelo']) ? $_POST['codvuelo'] : "";
			$corigen = isset($_POST['corigen']) ? $_POST['corigen'] : "";
			$cdestino = isset($_POST['cdestino']) ? $_POST['cdestino'] : "";
			$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
			$fsalida = isset($_POST['fsalida']) ? $_POST['fsalida'] : "";
			$clase = isset($_POST['clase']) ? $_POST['clase'] : "";
			$hora = isset($_POST['hora']) ? $_POST['hora'] : "";
		
		?>

		<div class="contenedorb">
			
	
		
		</br>	
		<span><h2>Datos para reserva:</h2></span>	
	
		<form>
			<!--<div class="leftb">	-->	
				
				<label class="origen" for="Origen">Nombre y apellido</label>
				<input type="text" id="nombrer">
				</br>
				<label class="destino" for="Destino">Dni</label>
				<input type="text" id="dnir">
				</br>
			
			<!--<div class="rightb">-->

				<label class="fecha" for="FSAL">Fecha nacimiento:</label>
				<input type="text" id="fnac">
				</br>
				
				<label class="clase" for="Clase">Email:</label>	
				<input type="text" id="fnacr">
				</br>
	
			
			<div class ="bottomb">
				<input type="button" class="input_button" id="btn_cod_reservar" name="btn_cod_reservar2" value="Reservar" onclick="valida_reservar2()"/>
					
				</div>			
				
			
		</form>
	</div>

	
		
	</body>	
	
</html>	
										