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
		
		<!--Ini - jasobrile - 26/06/2014-->
		<!--PopUp Asientos de aviones-->
		<link rel="stylesheet" type="text/css" href="estilos/popUp.css" />
		<link rel="stylesheet" type="text/css" href="estilos/aviones.css" />
		<script type="text/javascript" src="js/popUp.js"></script>
		<!--PopUp Asientos de aviones-->
		<!--Fin - jasobrile - 26/06/2014-->
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('#wrapper').fullpage({
					verticalCentered: true,
					resize : true,
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

				$(".menu-tabs > li").click(function(e){
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
			        //cambiamos el estao de la pestaÃ±a
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
						<img src="img/logo.png"/><br/>
						Aerolíneas Del Plata
					</h1>
				</div>
				<div class="slide" id="slide2">
					<h1>
						<img src="img/logo.png"/><br/>
						Aerolíneas Del Plata
					</h1>
				</div>
				<div class="slide" id="slide3">
					<h1>
						<img src="img/logo.png"/><br/>
						Aerolíneas Del Plata
					</h1>
				</div>
				<div class="slide" id="slide4">
					<h1>
						<img src="img/logo.png"/><br/>
						Aerolíneas Del Plata
					</h1>
				</div>
			</div>
			<div class="section" id="section1">
				<div id="tabs">
					<nav>
						 <ul class="menu-tabs">
        					<li id="tab1" class="active">
        						<img class="icon" src="img/buscador.png">Buscador
        					</li>
          				    <li id="tab2">
			            		<img class="icon" src="img/pago.png">Pago
			           		</li>
			            	<li id="tab3">
			            		<img class="icon" src="img/checkin.png">Check-IN
			           		 </li>
			       		 </ul>

						<div class="content tab1">
   						                     
                			<form>
									<legend><div>
									<h2>Buscá tu vuelo</h2></div>
								</legend>
								<label for="origendestino">Origen:
									<input type="text" name="origen" id="origen"/>
								Destino:
									<input type="text" name="destino" id="destino"/></label>
								</label>
								
								<label for="fsalidafregreso">F.Salida:
									<input type="text" name="fsalida" placeholder="Fecha de salida" id="txtFromDate" class="datepicker"/>
								F.Regreso:
									<input type="text" name="fregreso" placeholder="Fecha de regreso" id="txtToDate" class="datepicker"/>
									</label>
								<label for="clase"> <span id="clase">Clase:
									<select>
										<option value=""> Seleccione clase </option> 
										<option value="1"> Primera </option> 
										<option value="2"> Economy </option> 
									</span></select><br>
								<input type="submit" value="Buscar"/>
								</label>
							
								

							</form>  
              			  
              			</div>
                
   						<div class="content tab2"  style="display:none;">
				     		<h2>Acá va el pago</h2>
				    	</div>


				        <div class="content tab3"  style="display:none;">
							<h2>Acá va el check-in</h2>
							<!--Ini - jasobrile - 26/06/2014-->
							<!--PopUp Asientos de aviones-->
							<?php
								require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\popUp_Aviones\f_popUp_aviones.php';

								$modelo_avion = 'EMB-120';
								//$modelo_avion = 'ER-145';
								//$modelo_avion = 'ER-145_2';
								//$modelo_avion = 'ER-170';

								echo '<input type="hidden" id="modelo_avion" value="'.$modelo_avion.'"/>';

								f_popUp_aviones($modelo_avion);
							?>
							<!--PopUp Asientos de aviones-->
							<!--Fin - jasobrile - 26/06/2014-->
				        </div>
					</nav>
				</div>
			</div>

			<div class="section" id="section2">
				<h2>SE AGREGA FUNCIONALIDAD <BR>
					PARA PROBAR BBDD</h2>

					<?php	
			require_once  $_SERVER{'DOCUMENT_ROOT'} . '/sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
		
			$db = new Database();
			
			$filas = $db->execute ('select * from vuelo');
			
			foreach ($filas as $value)
			{
			   echo $value['codigo']  . " - " . $value['origen'] . " - " . $value['destino'] . " - " . $value['fecha'] . " - " . $value['hora'] . " - " . $value['avion'] . "<br/>";
			}
			
			
			$db->disconnect();
			
		?>
			</div>
		</div>
	</body>
</html>