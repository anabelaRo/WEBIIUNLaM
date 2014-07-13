<!doctype html>
<html>
	<head>
		<!--meta charset="utf-8"-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Aerolíneas Del Plata</title>
		<meta name="title" content="Aerolíneas Del Plata" />
		<meta name="description" content="Aerolíneas Del Plata, la mejor opción para recorrer el país" />
		<!-- <meta name="author" content=""> -->
		<meta name="keywords" content="aerolíneas del plata, aerolineas del plata, del plata, aerolinea argentina, aerolinea, aerolineas" />
		<link rel="shortcut icon" type="image/png" href="img/favicon.png">
		<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
		<script type="text/javascript" src="js/jquery.fullPage.js"></script>
		<script type="text/javascript" src="js/jquery.easings.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.10.4.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>
		<link rel="stylesheet" type="text/css" href="estilos/jquery-ui-1.10.4.css">
		<link rel="stylesheet" type="text/css" href="estilos/jquery.fullPage.css"/>
		<link rel="stylesheet" type="text/css" href="estilos/estilos.css"/>
		<link href='http://fonts.googleapis.com/css?family=Roboto:900' rel='stylesheet' type='text/css'>
		
		<!--PopUp Asientos de aviones-->
		<link rel="stylesheet" type="text/css" href="estilos/popUp.css" />
		<link rel="stylesheet" type="text/css" href="estilos/aviones.css" />
		<script type="text/javascript" src="js/popUp.js"></script>
		<!--PopUp Asientos de aviones-->
		
		<!--Funcion generica de llamado a AJAX-->
		<script type="text/javascript" src="js/recarga_ajax.js"></script>
		<script type="text/javascript" src="js/funciones_validacion.js"></script>
		<!--Funcion generica de llamado a AJAX-->
		
		<!--sesion-->
		<link rel="stylesheet" type="text/css" href="estilos/sesion.css"/>
		<!--sesion-->
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('#wrapper').fullpage({
					verticalCentered: true,
					<!--Se deshabilita el calculo automatico del tamaño de la letra-->
					//resize : true,
					resize : false,
					<!--Se deshabilita el calculo automatico del tamaño de la letra-->
					slidesColor : ['#ccc', '#fff'],
					anchors:['firstSlide', 'secondSlide'],
					scrollingSpeed: 700,
					easing: 'easeInQuart',
					menu: true,
					navigation: true,
					navigationPosition: 'right',
					navigationTooltips: ['Home', 'Reservas'],
					slidesNavigation: true,
					slidesNavPosition: 'bottom',
					loopBottom: false,
					loopTop: false,
					loopHorizontal: true,
					autoScrolling: true,
					scrollOverflow: false,
					css3: false,
					//paddingTop: '3em',
					//paddingBottom: '10px',
					fixedElements: '#element1, .element2',
					normalScrollElements: '#element1, .element2',
					keyboardScrolling: true,
					touchSensitivity: 15,
					continuousVertical: false,
					animateAnchor: true,

					//events
					onLeave: function(index, nextIndex, direction){
						$('#ui-datepicker-div').hide();
					},
					afterLoad: function(anchorLink, index){},
					afterRender: function(){
						idInterval = setInterval(function(){
								$.fn.fullpage.moveSlideRight();
						}, 2500);
					},
					afterResize: function(){},
					afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){},
					onSlideLeave: function(anchorLink, index, slideIndex, direction){}
				});

				$(".menu-tabs > li,.menu-tabs > li > img").click(function(e){
					 switch(e.target.id){
						case "tab1":
						  //cambiamos el estao de la pestaÃ±a
						  $("#tab1").addClass("active");
						  $("#tab3").removeClass("active");
						  $("#tab2").removeClass("active");
						  //y aqui el display para ocultar y mostrar
						  $("div.tab1").css("display", "block");
						  $("div.tab3").css("display", "none");
						  $("div.tab2").css("display", "none");

						break;
						case "tab2":
						  //cambiamos el estado de la pestaña
						  $("#tab1").removeClass("active");
						  $("#tab3").removeClass("active");
						  $("#tab2").addClass("active");
						  //y aqui el display para ocultar y mostrar
						  $("div.tab1").css("display", "none");
						  $("div.tab3").css("display", "none");
						  $("div.tab2").css("display", "block");
						break;
						case "tab3":
						  //cambiamos el estao de la pestaÃ±a
						  $("#tab1").removeClass("active");
						  $("#tab2").removeClass("active");
						  $("#tab3").addClass("active");
						  //y aqui el display para ocultar y mostrar
						  $("div.tab1").css("display", "none");
						  $("div.tab2").css("display", "none");
						  $("div.tab3").css("display", "block");
						break;                   
					 }   
					 return false;
				});
			});
			$(function() {
				$( "#txtFromDate" ).datepicker({
					defaultDate: "+1d",
					changeMonth: true,
					numberOfMonths: 1,
					onClose: function( selectedDate ) {
						$( "#txtToDate" ).datepicker( "option", "minDate", selectedDate );
						$( "#txtToDate" ).datepicker( "option", "disabled", false );
						$( "#txtToDate" ).datepicker( "option", "defaultDate", 1 );
					}
				});
				$( "#txtToDate" ).datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					numberOfMonths: 1,
					disabled: true,
/*					onClose: function( selectedDate ) {
						$( "#txtFromDate" ).datepicker( "option", "maxDate", selectedDate );
					}
*/				});
			});
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div class="section active" id="section0">
				<div class="slide active" id="slide1">
					<h1>
						<img src="img/logo.png"/>
						<br/>
						Aerolíneas Del Plata
					</h1>
				</div>
				<div class="slide" id="slide2">
					<h1>
						<img src="img/logo.png"/>
						<br/>
						Aerolíneas Del Plata
					</h1>
				</div>
				<div class="slide" id="slide3">
					<h1>
						<img src="img/logo.png"/>
						<br/>
						Aerolíneas Del Plata
					</h1>
				</div>
				<div class="slide" id="slide4">
					<h1>
						<img src="img/logo.png"/>
						<br/>
						Aerolíneas Del Plata
					</h1>
				</div>
			</div>

			<div class="section" id="section1">
				<div id="tabs">
					<nav>
						<ul class="menu-tabs">
        					<li id="tab1" class="active">
        						<img id="tab1" class="icon" src="img/buscador.png"/>Buscador
        					</li>
							<li id="tab2">
								<img id="tab2" class="icon" src="img/pago.png"/>Pago
							</li>
							<li id="tab3">
								<img id="tab3" class="icon" src="img/checkin.png"/>Check-IN
							</li>
						</ul>

						<!--TAB Buscador-->
						<div class="content tab1">              
							<div id="div_reserva_vuelo">
								<div id="div_busc_vuelo">
									<div id="box_vuelo">
										<h3 class="title_h3">Busque su Vuelo</h3>
										
										<form method="post" name="form_buscar_vuelo" action="#">
											<label class="label_text" for="origen">Origen:</label>
											<input type="text" class="input_text" name="origen" id="origen"/>
											
											<label class="label_text_1" for="destino">Destino:</label>
											<input type="text" class="input_text" name="destino" id="destino"/>
											
											<br/>
											
											<label class="label_text_2" for="fsalida">F. Salida:</label>
											<input type="text" class="input_text" name="fsalida" placeholder="Fecha de salida" id="txtFromDate" class="datepicker"/>
											
											<label class="label_text_3" for="fregreso">F. Regreso:</label>
											<input type="text" class="input_text" name="fregreso" placeholder="Fecha de regreso" id="txtToDate" class="datepicker"/>

											<br/>
											
											<label class="label_text_4" for="clase">Clase:</label>
											<select class="input_combo" name="clase">
												<option value=""> Seleccione clase </option> 
												<option value="1"> Primera </option> 
												<option value="2"> Economy </option> 
											</select>
											
											<label class="label_text_3" for="clase">Ida y Vuelta:</label>
											<input type="checkbox" name="vehicle" value="S">
											
											<br/>
											
											<input type="submit" class="input_button" value="Buscar"/>
										</form>
									</div>						
								</div>
							</div>
              		</div>
						<!--TAB Buscador-->
						
						<!--TAB Pago-->
   					<div class="content tab2"  style="display:none;">
							<div id="div_pago">
								<div id="div_busc_pago">
									<div id="box_pago">
										<h3 class="title_h3">Realice su Pago</h3>
										
										<form  id="form_pago" method="post" name="form_pago" action="#">
											<label class="label_text">Código de reserva:</label>
											<input type="text" class="input_text" id="text_cod_reserv_P" name="text_cod_reserv_P" value="" />
											
											<br/>
											
											<input type="button" class="input_button" id="btn_cod_reserv" name="btn_cod_reserv" value="Comience su Pago" onclick="valida_codigo_reserva('Pago')"/>
										</form>
									</div>
									
									<div id="div_recargar_pago"></div>
									
								</div>
							</div>
						</div>
						<!--TAB Pago-->
						
						<!--TAB Check-in-->
						<div class="content tab3"  style="display:none;">
							<div id="div_check_in">
								<div id="div_busc_checkIn">
									<div id="box_checkIn">
										<h3 class="title_h3">Realice su Check-in</h3>
										
										<form  method="post" name="form_check_in" action="#">
											<label class="label_text">Código de reserva:</label>
											<input type="text" class="input_text" id="text_cod_reserv_C" name="text_cod_reserv_C" value="" />
											
											<br/>
											
											<input type="button" class="input_button" id="btn_cod_reserv" name="btn_cod_reserv" value="Comience su Check-in" onclick="valida_codigo_reserva('Check_in')"/>
										</form>
									</div>
									
									<!--PopUp Asientos de aviones-->
									<?php
										/*require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\popUp_Aviones\f_popUp_aviones.php';

										$modelo_avion = 'EMB-120';
										//$modelo_avion = 'ER-145';
										//$modelo_avion = 'ER-145_2';
										//$modelo_avion = 'ER-170';

										echo '<input type="hidden" id="modelo_avion" value="'.$modelo_avion.'"/>';

										f_popUp_aviones($modelo_avion);*/
									?>
									<!--PopUp Asientos de aviones-->
									
									<div id="div_recargar_check_in"></div>
									
									<!--div id="div_msj_error_checkin">
										<div id="mensaje_img_checkin" class="warning">
											<img src="img/alerta.jpg">
										</div>
										<div id="mensaje_text_checkin" class="warning">
											<p>
												Lo sentimos, no se encontró el Código de Reserva ingresado. Inténtelo nuevamente.
											</p>
										</div>
									</div-->
								</div>
							</div>
						</div>
						<!--TAB Check-in-->
						
					</nav>
				</div>
			</div>

			<!--Inicio - estadisticas-->
			
			<div class="section" id="section2">
			
				<div id="contenedor1_slide3">
				
					<div class="contenedor2_slide3">
							
						<div class="titulo_slide3">Estadísticas</div>							
						             
							<div id="interior_1_slide3">
							
								<div id="interior_2_slide3">
										
										<?php
											require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\sesion\formulario_login.php';											
										?>
										
								</div>
							</div>
					
					</div>
				</div>
				
			</div>
			
			<!--Fin - estadisticas-->
		</div>
	</body>
</html>