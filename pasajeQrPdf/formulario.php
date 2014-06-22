<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" >

<html xmlns="http://www.w3.org/1999/xhtml">



	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title> Aerolineas</title>
		<link rel="StyleSheet" href="estilo.css" type="text/css"/>
		<script src='codigo.js' type='text/javascript'></script>


	<body>
		
		<div id="contenedor">
		
			<div id="pestanias">
			</div>
		
			<form id="formulario" action="registracion.php" method="post" name="formu">
		
				<div id="idaVuelta">
					<input class="radioIdaVuelta" type="radio" name="idaVuelta" value="idaYVuelta"/> Ida y vuelta
					<input class="radioIdaVuelta" type="radio" name="idaVuelta" value="ida"/> Ida
				</div>
				
				
				<div id="origen">
					Ciudad de origen
					<select name="ciudadOrigen">
						<option value="BUENOS AIRES" selected>BUENOS AIRES
						<option value="CORDOBA">CORDOBA
						<option value="ROSARIO">ROSARIO
					</select>
				</div>
				
				<div id="destino">
					<select name="ciudadDestino">
						<option value="BUENOS AIRES" selected>BUENOS AIRES
						<option value="CORDOBA">CORDOBA
						<option value="ROSARIO">ROSARIO
					</select>
				</div>
				
				<div id="fecha">
				</div>
				
				<div id="categoria">
					<select name="categoria">
						<option value="PRIMERA" selected>PRIMERA
						<option value="ECONOMY">ECONOMY
					</select>
				</div>
				
				<div id="boton">
					<input type="submit" value="Buscar vuelos" name="Boton"/>
					<input type="reset" value="Borrar" name="Boton"/>
				</div>
			
			</form>
			
			
			
			
		</div>
	
	</body>
	
</head>