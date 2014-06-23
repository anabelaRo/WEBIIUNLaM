<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
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
				
				$('#tabs div').hide();
				$('#tabs div:first').show();
				$('#tabs ul li:first').addClass('active');

				$('#tabs ul li a').click(function(){
					$('#tabs ul li').removeClass('active');
					$(this).parent().addClass('active');
					var currentTab = $(this).attr('href');
					$('#tabs div').hide();
					$(currentTab).show();
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
						<ul>
							<li class="active">
								<a href="#buscador">
									<img class="icon" src="img/buscador.png"/>Buscador
								</a>
							</li>
							<li>
								<a href="#reserva">
									<img class="icon" src="img/reserva.png"/>Reserva
								</a>
							</li>
							<li>
								<a href="#checkin">
									<img class="icon" src="img/checkin.png"/>Check-In
								</a>
							</li>
						</ul>

						<div id="buscador">
							<form>
								<legend>
									<h2>Buscá tu vuelo</h2>
								</legend>
								<label for="origen">Origen:</label>
									<input type="text" name="origen" id="origen"/>
								<label for="destino">Destino:</label>
									<input type="text" name="destino" id="destino"/>
								</label>
								<br>
								<label for="fsalida">Fecha Salida:</label>
									<input type="text" name="fsalida" placeholder="Fecha de salida" id="txtFromDate" class="datepicker"/>
								<label for="fregreso"> Fecha Regreso:</label>
									<input type="text" name="fregreso" placeholder="Fecha de regreso" id="txtToDate" class="datepicker"/>
								<br><br>
								<label for="clase"> Clase:
									<select>
										<option value=""> Seleccione clase </option> 
										<option value="1"> Primera </option> 
										<option value="2"> Economy </option> 
									</select>
								</label>
								<br>
								<input type="submit" value="Buscar"/>

							</form>  
						</div>

						<div id="reserva">
							<h1>Acá realizarán la reserva</h1>
						</div>

						<div id="checkin">
							<h1>Acá realizarán el check-in</h1>
						</div>
					</nav>
				</div>
			</div>

			<div class="section" id="section2">
				<h1>Slide 3</h1>
			</div>
		</div>
	</body>
</html>