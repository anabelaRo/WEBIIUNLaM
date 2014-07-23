<html>
	<head>
	</head>
	
	<body>
		<div id="div_lista_espera">

			<br/>
			<h3 class="title_h3">Lista de Pasajeros dados de Baja y Habilitados</h3>
						
			<?php	
				require_once  $_SERVER{'DOCUMENT_ROOT'} . '/Sitio/bbdd/Clases/Connection_BBDD_Objeto.php';
				

				$cod_vuelo = isset($_POST['cod_vuelo']) ? $_POST['cod_vuelo'] : "";
				$fecha_vuelo = isset($_POST['fecha_vuelo']) ? $_POST['fecha_vuelo'] : "";

				$db = new Database();
				
				$filas = $db -> exec_Select (		'select count(p.cod_reserva) as CantidadAEliminar, p.clase_pasaje as clase ' . 
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.cod_reserva not in (select cod_reserva from pago) '.
															'  and p.flag_check_in IS NULL '.
															'  and p.flag_lista_espera IS NULL '.
															'	and p.clase_pasaje = "E" ' .
															'group by cod_vuelo, fecha_vuelo, clase_pasaje;'
													 );
				
				$cantidad_eliminar_E = 0;

				foreach ($filas as $value)
				{
					$cantidad_eliminar_E = $value['CantidadAEliminar'];
				}
				
				if ($cantidad_eliminar_E == "")
				{
					$cantidad_eliminar_E = 0;
				}
				
				echo "La cantidad de Pasajeros a dar de Baja, para la clase Economy es: " . $cantidad_eliminar_E;
				echo "<br/>";

				$filas = $db -> exec_Select (		'select p.cod_reserva, u.nombre_apellido, u.dni, u.email ' .
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'	join usuario u ' .
															'		on p.cod_usuario = u.codigo ' .
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.cod_reserva not in (select cod_reserva from pago) '.
															'  and p.flag_check_in IS NULL '.
															'  and p.flag_lista_espera IS NULL '.
															'	and p.clase_pasaje = "E" ;'
													 );

				foreach ($filas as $value)
				{
					echo $value['nombre_apellido'] . " - " . $value['dni'] . " - ". $value['email'] ."<br/>";
				}
				
				echo "<br/>";
				
				//Actualizo la tabla Pasaje para Economy:
				$db -> exec_Insert_Update (	'update pasaje ' . 
														'set flag_lista_espera = -1 ' .
														'where cod_reserva in ( select p.cod ' .
														'								from( ' .
														'											select p.cod_reserva as cod ' .
														'											from pasaje p  ' .
														'												join vuelo v ' .
														'													on p.cod_vuelo = v.codigo ' .
														'											where  p.cod_vuelo = '.$cod_vuelo. ' '.
														'											 and p.cod_reserva not in (select cod_reserva from pago) '.
														'  											and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
														'  											and p.flag_check_in IS NULL '.
														'  											and p.flag_lista_espera IS NULL '.
														'												and p.clase_pasaje = "E" ' .
														'											ORDER BY p.FECHA_RESERVA ASC ' .
														'									  ) p' .
														'								);'
												 );
				
				//Busco la cantidad de pasajeros en Lista de Espera, para habilitarlos:
				$filas = $db -> exec_Select (		'select count(p.cod_reserva) as CantidadAHabilitar ' . 
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.flag_check_in IS NULL '.
															'  and p.flag_lista_espera = -1 '.
															'	and p.clase_pasaje = "E" ;'
													 );
				
				$cantidad_habilitar_E = 0;

				foreach ($filas as $value)
				{
					$cantidad_habilitar_E = $value['CantidadAHabilitar'];
				}
				
				if ($cantidad_habilitar_E == "")
				{
					$cantidad_habilitar_E = 0;
				}
				
				echo "Detalle de los Pasajeros Habilitados para Economy: " . "<br/>";		
				
				//Muestro los Pasajeros a Hablitar para Economy:
				$filas = $db -> exec_Select (		'select p.cod_reserva, u.nombre_apellido, u.dni, u.email ' .
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'	join usuario u ' .
															'		on p.cod_usuario = u.codigo ' .
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.flag_lista_espera = 1 '.
															'	and p.clase_pasaje = "E" ' .
															'	ORDER BY FECHA_RESERVA ASC ' .
															'	LIMIT ' . $cantidad_habilitar_E . ';'
													 );

				foreach ($filas as $value)
				{
					echo $value['nombre_apellido'] . " - " . $value['dni'] . " - ". $value['email'] ."<br/>";
				}
				
				//Actualizo la tabla Pasaje para Economy:
				$db -> exec_Insert_Update (	'update pasaje ' . 
														'set flag_lista_espera = NULL ' .
														'where cod_reserva in ( select p.cod ' .
														'								from( ' .
														'											select p.cod_reserva as cod ' .
														'											from pasaje p  ' .
														'												join vuelo v ' .
														'													on p.cod_vuelo = v.codigo ' .
														'											where  p.cod_vuelo = '.$cod_vuelo. ' '.
														'  											and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
														'  											and p.flag_lista_espera = 1 '.
														'												and p.clase_pasaje = "E" ' .
														'											ORDER BY p.FECHA_RESERVA ASC ' .
														'											LIMIT ' . $cantidad_habilitar_E .' ' .
														'									  ) p' .
														'								);'
												 );
				
				echo "<br/>";
		
				//Primera
				$cantidad_eliminar_P = 0;
				
				$filas = $db -> exec_Select (		'select count(p.cod_reserva) as CantidadAEliminar, p.clase_pasaje as clase ' . 
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.cod_reserva not in (select cod_reserva from pago) '.
															'  and p.flag_check_in IS NULL '.
															'  and p.flag_lista_espera IS NULL '.
															'	and p.clase_pasaje = "P" ' .
															'group by cod_vuelo, fecha_vuelo, clase_pasaje;'
													 );
				
				foreach ($filas as $value)
				{
					$cantidad_eliminar_P = $value['CantidadAEliminar'];
				}
				
				if ($cantidad_eliminar_P == "")
				{
					$cantidad_eliminar_P = 0;
				}
				
				echo "La cantidad de Pasajeros a dar de Baja, para la clase Primera es: " . $cantidad_eliminar_P;
				echo "<br/>";
				
				$filas = $db -> exec_Select (		'select p.cod_reserva, u.nombre_apellido, u.dni , u.email ' .
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'	join usuario u ' .
															'		on p.cod_usuario = u.codigo ' .
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.cod_reserva not in (select cod_reserva from pago) '.
															'  and p.flag_check_in IS NULL '.
															'  and p.flag_lista_espera IS NULL '.
															'	and p.clase_pasaje = "P" ;'
													 );

				foreach ($filas as $value)
				{
					//echo "Código Reserva: " . $value['cod_reserva'] . " - Nombre y Apellido: " . $value['nombre_apellido'] . " - D.N.I: " . $value['dni'] . "<br/>";
					echo $value['nombre_apellido'] . " - " . $value['dni'] . " - ". $value['email'] ."<br/>";
				}
				
				//Actualizo la tabla Pasaje para Primera:
				$db -> exec_Insert_Update (	'update pasaje ' . 
														'set flag_lista_espera = -1 ' .
														'where cod_reserva in ( select p.cod ' .
														'								from( ' .
														'											select p.cod_reserva as cod ' .
														'											from pasaje p  ' .
														'												join vuelo v ' .
														'													on p.cod_vuelo = v.codigo ' .
														'											where  p.cod_vuelo = '.$cod_vuelo. ' '.
														'  											and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
														'  											and p.flag_check_in IS NULL '.
														' 											and p.cod_reserva not in (select cod_reserva from pago) '.
														'  											and p.flag_lista_espera IS NULL '.
														'												and p.clase_pasaje = "P" ' .
														'											ORDER BY p.FECHA_RESERVA ASC ' .
														'									  ) p' .
														'								);'
												 );
				
				//Busco la cantidad de pasajeros en Lista de Espera, para habilitarlos:
				$filas = $db -> exec_Select (		'select count(p.cod_reserva) as CantidadAHabilitar ' . 
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.flag_check_in IS NULL '.
															'  and p.flag_lista_espera = -1 '.
															'  and p.clase_pasaje = "P" ;'
													 );
				
				$cantidad_habilitar_P = 0;

				foreach ($filas as $value)
				{
					$cantidad_habilitar_P = $value['CantidadAHabilitar'];
				}
				
				if ($cantidad_habilitar_P == "")
				{
					$cantidad_habilitar_P = 0;
				}
				
				echo '<br/>';
				echo "Detalle de los Pasajeros Habilitados en Primera: " . "<br/>";
				
				//Muestro los Pasajeros a Hablitar para Primera:
				$filas = $db -> exec_Select (		'select p.cod_reserva, u.nombre_apellido, u.dni, u.email ' .
															'from pasaje p ' .
															'	join vuelo v '.
															'		on p.cod_vuelo = v.codigo '.
															'	join usuario u ' .
															'		on p.cod_usuario = u.codigo ' .
															'where p.cod_vuelo = '.$cod_vuelo. ' '.
															'  and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
															'  and p.flag_lista_espera = 1 '.
															'	and p.clase_pasaje = "P" ' .
															'	ORDER BY FECHA_RESERVA ASC ' .
															'	LIMIT ' . $cantidad_habilitar_P . ';'
													 );

				foreach ($filas as $value)
				{
					echo $value['nombre_apellido'] . " - " . $value['dni'] . " - ". $value['email'] ."<br/>";
				}
				
				//Actualizo la tabla Pasaje para Primera:
				$db -> exec_Insert_Update (	'update pasaje ' . 
														'set flag_lista_espera = NULL ' .
														'where cod_reserva in ( select p.cod ' .
														'								from( ' .
														'											select p.cod_reserva as cod ' .
														'											from pasaje p  ' .
														'												join vuelo v ' .
														'													on p.cod_vuelo = v.codigo ' .
														'											where  p.cod_vuelo = '.$cod_vuelo. ' '.
														'  											and p.fecha_vuelo = "'.$fecha_vuelo. '" '.
														'  											and p.flag_lista_espera = 1 '.
														'												and p.clase_pasaje = "P" ' .
														'											ORDER BY p.FECHA_RESERVA ASC ' .
														'											LIMIT ' . $cantidad_habilitar_P . ' ' .
														'									  ) p' .
														'								);'
												 );
				
				$db -> disconnect();
			?>
			
			<br/>
			<div id="div_botones_res">
				<input type="button" class="input_button_res" id="btn_volver" name="btn_volver" value="Cancelar" onclick="f_volver_buscar()"/>
			</div>

		</div>
	</body>	
</html>	
										