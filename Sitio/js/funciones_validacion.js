function mostrar_fecha()
{
	var estado_check = document.getElementById('idayvuelta'); 
	
	if (!estado_check.checked) 
	{
		document.getElementById("lbl_f_regreso").style.display = 'none'; 
		document.getElementById("txtToDate").style.display = 'none'; 
	}
	else
	{
		document.getElementById("lbl_f_regreso").style.display = 'inline'; 
		document.getElementById("txtToDate").style.display = 'inline';
	}
}


function valida_codigo_reserva(var_div)
{
	var campos_consulta = "";
	var msj_error = "";
	var ruta_archivo = "";
	var query = "";
	var tipo_query = "";
	var nom_var_hidden = [""];
	var valor_var_hidden = [""];
	
	if (var_div == 'Pago')
	{
		var cod_reserv_P = document.getElementById("text_cod_reserv_P"); //Campo del formuario a validar
		var div_contenedor = "div_recargar_pago"; //Nombre del DIV en donde se va a cargar el Archivo enviado
		
		if (validaVacio(cod_reserv_P.value) === false) 
		{
			cod_reserv_P.style.backgroundColor = '#FC9C9C'; //Pinta de color rojo el campo que dió error
			cod_reserv_P.focus(); //Posiciona el foco en el campo que dió el error
			
			msj_error = 'Debe ingresar el Código de Reserva'; //Este mensaje se carga en "div_msj_error.php", llamado en la linea de abajo
			ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		
			loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
		 
		}
		else 
		{
		/* ========================== agregado lunes 21 ======= */
			
		 	//query = 'SELECT cod_reserva FROM pago WHERE cod_reserva = ' + cod_reserv_P.value;
			
		 	query = 'SELECT cod_reserva FROM pasaje WHERE cod_reserva = ' + cod_reserv_P.value;
		 	tipo_query = 'S';
			ruta_archivo = "bbdd/f_ejecutar_query.php";
			nom_var_hidden = ["query", "tipo_query"]; 
			valor_var_hidden = [query, tipo_query]; 
			campos_consulta = "cod_reserva";

		 	retorno = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

		 	if (retorno[0] == '') 

		 	{
		 	cod_reserv_P.style.backgroundColor = '#FC9C9C'; //Pinta de color rojo el campo que dió error
			cod_reserv_P.focus(); //Posiciona el foco en el campo que dió el error
			
			msj_error = 'Código de Reserva incorrecto'; //Este mensaje se carga en "div_msj_error.php", llamado en la linea de abajo
			ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
			campos_consulta = "";
			loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

		 	}		
		 	/* --------------- anda ----------- */
		 	else
		 	{
				query = 	' select p1.cod_reserva'+
							' from pago p1 join pasaje p2'+
							'	on p1.cod_reserva = p2.cod_reserva'+
							' where p1.cod_reserva = ' + cod_reserv_P.value +
							' or p1.cod_reserva in (select cod_reserva'+
	                        '  								from pasaje'+
	                        '								where cod_reserva = ' + cod_reserv_P.value +
	                        ' 								and flag_lista_espera = 1)';
				tipo_query = 'S';
				ruta_archivo = "bbdd/f_ejecutar_query.php";
				nom_var_hidden = ["query", "tipo_query"]; 
				valor_var_hidden = [query, tipo_query]; 
				campos_consulta = "cod_reserva";
				
				retorno = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

				if (retorno[0] != '') 
					{

					cod_reserv_P.style.backgroundColor = '#FC9C9C'; 
					cod_reserv_P.focus(); 
					
					msj_error = 'La reserva se encuentra paga o está en lista de espera'; 
					ruta_archivo = "php/div_msj_error.php"; 
					nom_var_hidden = ["msj_error"]; 
					valor_var_hidden = [msj_error]; 
					campos_consulta = "";
					loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
					}
			    
				else
					{

					query = 	'select 	co.descripcion as corigen1,' + 
							'		cd.descripcion as cdestino1, ' +
							'		p.clase_pasaje as clase1, ' +
							'		date(p.fecha_vuelo) as fecha1, ' +
							'		v.hora_vuelo as hora1, ' +
							'		u.nombre_apellido as nombre1, ' +
							'		u.dni as dni1, ' + 
							'		cod_reserva as cod_reserva, ' + 
							'		case p.clase_pasaje ' +
							'			when p.clase_pasaje = "p" then v.precio_primera' +
							'			when p.clase_pasaje = "e" then v.precio_economy end as precio' +
					     	' from pasaje p join vuelo v 	' +
							'		on p.cod_vuelo = v.codigo' +
					   		'		join usuario u ' +
					     	'			on u.codigo = p.cod_usuario ' +
					     	'		join aeropuerto ao ' +
					     	'			on v.origen = ao.codigo_OACI ' +
					     	'		join ciudad co ' +
					     	'			on ao.ciudad = co.codigo ' +
					     	'		join aeropuerto ad ' +
					     	'			on v.destino = ad.codigo_OACI ' +
					     	'		join ciudad cd ' +
					     	'			on ad.ciudad = cd.codigo ' +
					     	'		join avion a ' +
					     	'			on a.codigo = v.cod_avion ' +
					       	'where cod_reserva = "' + cod_reserv_P.value + '" '; 
			
				
						tipo_query = 'S'; 
						ruta_archivo = "bbdd/f_ejecutar_query.php"; 
						nom_var_hidden = ["query", "tipo_query"];
						valor_var_hidden = [query, tipo_query]; 
						campos_consulta = "corigen1|cdestino1|clase1|fecha1|hora1|nombre1|dni1|cod_reserva|precio";
						//campos_consulta = "corigen1|cdestino1|clase1|fecha1|hora1|nombre1|dni1|cod_reserva|precio";
					
						var retorno = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
					
				
						div_contenedor = "box_pago";
					
						var corigen = retorno[0];
						var cdestino = retorno[1];
						var clase = retorno[2];
						var fecha = retorno[3];
						var hora = retorno[4];
						var nombre = retorno[5];
						var dni = retorno[6];
						var cod_reserva = retorno[7];
						var precio = retorno[8];

						ruta_archivo = "php/datos_Pago.php"; //Ruta del Archivo a cargar en el DIV
						nom_var_hidden = ["corigen", "cdestino", "clase", "fecha", "hora", "nombre", "dni", "cod_reserva", "precio"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
						valor_var_hidden = [corigen, cdestino, clase, fecha, hora, nombre, dni, cod_reserva, precio]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
						campos_consulta = "";
						loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
					}	

			}
		}
	}

	else 
	
	{
		var cod_reserv_C = document.getElementById("text_cod_reserv_C");
		div_contenedor = "div_recargar_check_in"; //Nombre del DIV en donde se va a cargar el Archivo enviado
		
		if (validaVacio(cod_reserv_C.value) === false)
		{
			cod_reserv_C.style.backgroundColor = '#FC9C9C';
			cod_reserv_C.focus();
			
			msj_error = 'Debe ingresar el Código de Reserva';
		  //msj_error = 'Debe ingresar el Código de Reserva';
			ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
		else
		{
		    query = 'SELECT * FROM pasaje WHERE cod_reserva = ' + cod_reserv_C.value;
			//query = 'SELECT * FROM pasaje WHERE cod_pasaje = ' + cod_reserv_C.value;
			tipo_query = 'S';
			ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
	}
	
}

//function genera_pago(dni, nombre, origen, destino, clase, codpasaje, fecha, hora, precio, cod_reserva)
function genera_pago(dni, nombre, origen, destino, clase, fecha, hora, precio, cod_reserva)
{

var div_contenedor = "";
var campos_consulta = "";
var ruta_archivo = "";
var query = "";
var tipo_query = "";
var nom_var_hidden = [];
var valor_var_hidden = [];
var ultcodpago = "";
var sigcodpago = "";
var retorno3 = "";
var mpago = document.getElementsByName("mpago")[0];
var numtarjeta = document.getElementById("num_tarjeta");

	if (numtarjeta.value == 0 || numtarjeta.value == '' ||  isNaN(numtarjeta.value) )

	{		
			
			numtarjeta.style.backgroundColor = '#FC9C9C';
			numtarjeta.focus();
			
	}
	else
	{	
		 query = 'INSERT INTO pago VALUES(NULL, '+ cod_reserva + ',' + mpago.value + ',' + numtarjeta.value + ',' + precio + ')';
		 tipo_query = 'I';
		 ruta_archivo = "bbdd/f_ejecutar_query.php";
		 nom_var_hidden = ["query", "tipo_query"];
		 valor_var_hidden = [query, tipo_query];


 		retorno = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

 		 query = 'select cod_reserva from pago where cod_reserva = ' + cod_reserva + ')';
		 tipo_query = 'S';
		 ruta_archivo = "bbdd/f_ejecutar_query.php";
		 nom_var_hidden = ["query", "tipo_query"];
		 valor_var_hidden = [query, tipo_query];
		 campos_consulta = "cod_reserva";
			
		
		retorno = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
			

		if (retorno != '') 
			{
			
			alert("el pago fue procesado");
			
			}
		else
			{
			alert("El pago no se proceso correctamente, vuelva a intentarlo");
			}		

	}


}

function valida_buscador()
{
	var campos_consulta = "";
	var msj_error = "";
	var ruta_archivo = "";
	var query = "";
	var tipo_query = "";
	var nom_var_hidden = [];
	var valor_var_hidden = [];
	
	var codvuelo = "";
	var origen = "";
	var corigen = "";
	var destino = "";
	var cdestino = "";
	var precio = "";
	var retorno = "";
	var retorno2 = "";
	
	var check_lista_espera = "";

	var l_origen = document.getElementById("origen");
	var l_destino = document.getElementById("destino");
	var l_fsalida = document.getElementById("txtFromDate");
	var l_fregreso = document.getElementById("txtToDate");
	var l_clase = document.getElementById("cmb_clase");
	
	var div_contenedor = "";
	
	if (validaVacio(l_origen.value) == false)
	{
		l_origen.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (Origen)");
		
		l_origen.focus();
		
		return false;
	}
	else if (validaVacio(l_destino.value) == false)
	{
		l_destino.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (Destino)");
		
		l_destino.focus();
		
		return false;
	}
	else if (validaVacio(l_fsalida.value) == false)
	{
		l_fsalida.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (F. Salida)");
		
		l_fsalida.focus();
		
		return false;
	}
	else if (validaVacio(l_clase.value) == false)
	{
		l_clase.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (Clase)");
		
		l_clase.focus();
		
		return false;
	}
	else
	{
		if (document.getElementById('idayvuelta').checked)
		{
			if (validaVacio(l_fregreso.value) == false)
			{
				l_fregreso.style.backgroundColor = '#FC9C9C';
				
				alert("Debe completar el campo (F. Regreso)");
				
				l_fregreso.focus();
				
				return false;
			}
		}
	}
	
	var f_regreso;
	var f_salida;
	var dia_regreso;
	var dia_salida;
	
	var 	weekday = new Array(7);
			weekday[0]=  "domingo";
			weekday[1] = "lunes";
			weekday[2] = "martes";
			weekday[3] = "miercoles";
			weekday[4] = "jueves";
			weekday[5] = "viernes";
			weekday[6] = "sabado";
	
	var fecha_salida_cor = new Array(3);
	
	fecha_salida_cor = l_fsalida.value.split("/");
	
	var fecha_salida_cor_aux = fecha_salida_cor[1] + "/" + fecha_salida_cor[0] + "/" + fecha_salida_cor[2];
	
	f_salida = new Date(fecha_salida_cor_aux);	
	
	dia_salida = weekday[f_salida.getDay()];
	
	query = 	'select 	v.codigo as codvuelo, ' + 
				'			v.origen as origen, ' +
				'			co.descripcion as corigen, ' +
				'			v.destino as destino, ' +
				'			cd.descripcion as cdestino, ' +
				'			v.precio_'+ l_clase.value +' as precio ' + 
				'from vuelo v ' +
				'		join aeropuerto ao ' +
				'			on v.origen = ao.codigo_OACI ' +
				'		join ciudad co ' +
				'			on ao.ciudad = co.codigo ' +
				'		join aeropuerto ad ' +
				'			on v.destino = ad.codigo_OACI ' +
				'		join ciudad cd ' +
				'			on ad.ciudad = cd.codigo ' +
				'		join avion a ' +
				'			on a.codigo = v.cod_avion ' +
				'where co.descripcion= "' + l_origen.value + '" ' +
				'and cd.descripcion= "' + l_destino.value + '" ' +
				'and v.' + dia_salida + ' = 1 ' +
				'and a.asientos_' + l_clase.value + ' != 0';
	
	//Recupero datos para el Vuelo de Salida:
	tipo_query = 'S';
	ruta_archivo = "bbdd/f_ejecutar_query.php";
	nom_var_hidden = ["query", "tipo_query"];
	valor_var_hidden = [query, tipo_query];
	campos_consulta = "codvuelo|origen|corigen|destino|cdestino|precio";

	retorno =  loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	codvuelo = retorno[0];
	origen = retorno[1];
	corigen = retorno[2];
	destino = retorno[3];
	cdestino = retorno[4];
	precio = retorno[5];
	
	if (codvuelo == "")
	{
		alert("No se encontraron vuelos para los datos ingresados");
		
		return false;
	}
	else
	{
		var ida_vuelta = document.getElementById('idayvuelta');
		
		if (ida_vuelta.checked)
		{
			var fecha_regreso_cor = new Array(3);
	
			fecha_regreso_cor = l_fregreso.value.split("/");

			var fecha_regreso_cor_aux = fecha_regreso_cor[1] + "/" + fecha_regreso_cor[0] + "/" + fecha_regreso_cor[2];

			f_regreso = new Date(fecha_regreso_cor_aux);	
				
			dia_regreso = weekday[f_regreso.getDay()];
				
			query = 	'select 	v.codigo as codvueloV, ' + 
						'			v.origen as origenV, ' +
						'			co.descripcion as corigenV, ' +
						'			v.destino as destinoV, ' +
						'			cd.descripcion as cdestinoV, ' +
						'			v.precio_'+ l_clase.value +' as precioV ' + 
						'from vuelo v ' +
						'		join aeropuerto ao ' +
						'			on v.origen = ao.codigo_OACI ' +
						'		join ciudad co ' +
						'			on ao.ciudad = co.codigo ' +
						'		join aeropuerto ad ' +
						'			on v.destino = ad.codigo_OACI ' +
						'		join ciudad cd ' +
						'			on ad.ciudad = cd.codigo ' +
						'		join avion a ' +
						'			on a.codigo = v.cod_avion ' +
						'where co.descripcion= "' + l_destino.value + '" ' +
						'and cd.descripcion= "' + l_origen.value + '" ' +
						'and v.' + dia_regreso + ' = 1 ' +
						'and a.asientos_' + l_clase.value + ' != 0';
			
			//Recupero datos para el Vuelo de Regreso:
			div_contenedor = "";
			tipo_query = 'S';
			ruta_archivo = "bbdd/f_ejecutar_query.php";
			nom_var_hidden = ["query", "tipo_query"];
			valor_var_hidden = [query, tipo_query];
			campos_consulta = "codvueloV|origenV|corigenV|destinoV|cdestinoV|precioV";
							  
			retorno2  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
			
			var codvueloV = retorno2[0];
			var origenV   = retorno2[1];
			var corigenV  = retorno2[2];
			var destinoV  = retorno2[3];
			var cdestinoV = retorno2[4];
			var precioV   = retorno2[5];
			
			if (codvueloV == "")
			{
				alert("No se encontraron vuelos para los datos ingresados");
				
				return false;
			}
			else
			{
				div_contenedor = "box_vuelo";
				nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "check_lista_espera"];
				valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, l_fsalida.value, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, l_fregreso.value, l_clase.value, dia_salida, dia_regreso, "S", check_lista_espera];
				campos_consulta = "";	
				ruta_archivo = "php/buscadorvuelos.php";
				
				loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
			}
		}
		else
		{
			div_contenedor = "box_vuelo";
			nom_var_hidden = ["codvuelo", "origen", "corigen", "destino", "cdestino", "precio", "fsalida", "clase", "dia_salida", "dia_regreso", "ida_vuelta", "check_lista_espera"];
			valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, l_fsalida.value, l_clase.value, dia_salida, "dia_regreso", "N", check_lista_espera];
			campos_consulta = "";	
			ruta_archivo = "php/buscadorvuelos.php";
			
			loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
		}
	}
}


function valida_buscador2(codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, check_lista_espera)
{
	var cmb_hora_vuelo = document.getElementById("cmb_hora_vuelo");
	
	var hora_vuelo_ida = cmb_hora_vuelo.textContent.trim()

	var clase_aux;
	
	if (clase = 'Economy')
	{
		clase_aux = 'E';
	}
	else
	{
		clase_aux = 'P';
	}
	
	var fsalida_aux = fsalida.split("/").reverse().join("-");
	//fsalida = fsalida.split("/").reverse().join("-");
	
	var query = 'SELECT COUNT(p.cod_reserva) AS cantidad, ' + 
					'			a.asientos_economy, ' +
					'			a.asientos_primera ' +
					'FROM pasaje p ' +
					'		JOIN vuelo v ' +
					'			ON p.cod_vuelo = v.codigo ' +
					'		JOIN avion a ' +
					'			ON v.cod_avion = a.codigo ' +
					'WHERE v.codigo = ' + codvuelo + 
					'  AND p.fecha_vuelo = "' + fsalida_aux + '" ' +
					'	AND v.hora_vuelo = "' + hora_vuelo_ida + '" ' +
					'	AND p.clase_pasaje = "' + clase_aux + '" ' +
					'GROUP BY p.cod_vuelo, p.fecha_vuelo, v.hora_vuelo, p.clase_pasaje ';

	var div_contenedor = "";
	var tipo_query = 'S';
	var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
	var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
	var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
	var campos_consulta = "cantidad|asientos_economy|asientos_primera";
				  
	var retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	var cant_asientos_ocup = retorno[0];

	var cant_asientos;
	
	if (clase_aux == 'E')
	{
		cant_asientos = retorno[1];
	}
	else
	{
		cant_asientos = retorno[2];
	}
	
	if (cant_asientos_ocup >= cant_asientos)
	{
		//En caso de que no haya lugar en el avion, se valida que los pasajeros en Lista de Espera no sea mayor a 10:
		query = 	'SELECT COUNT(p.cod_reserva) AS cantidad ' + 
					'FROM pasaje p ' +
					'		JOIN vuelo v ' +
					'			ON p.cod_vuelo = v.codigo ' +
					'WHERE v.codigo = ' + codvuelo + ' ' +
					'  AND p.fecha_vuelo = "' + fsalida_aux + '" ' +
					'	AND v.hora_vuelo = "' + hora_vuelo_ida + '" ' +
					'  AND p.flag_lista_espera != "" ' +
					'GROUP BY p.cod_vuelo, v.hora_vuelo, p.fecha_vuelo ';
		
		div_contenedor = "";
		tipo_query = 'S';
		ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
		nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
		valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		campos_consulta = "cantidad";

		retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

		var cant_lista_espera = retorno[0];
		
		if ( cant_lista_espera >= 10 )
		{
			alert("No se dispone de cupo para el viaje solicitado");
			
			return false;
		}
		else
		{
			var respuesta = confirm("No se dispone de lugar para el vuelo seleccionado ¿Desea quedar en lista de espera?"); 
		
			if (respuesta == false)
			{
				//Vuelvo a la pantalla de Busqueda Original:
				f_volver_buscar();
			}
			else
			{
				check_lista_espera = 1;
				
				//Llamo a la pantalla de "Datos de Vuelo (Vuelta)":
				var div_contenedor = "box_vuelo";
				var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "hora_ida", "check_lista_espera"];
				var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_vuelo_ida, check_lista_espera];
				var campos_consulta = "";	
				var ruta_archivo = "php/buscadorvuelos2.php";
				
				loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
			}
		}
	}
	else
	{
		//Llamo a la pantalla de "Datos de Vuelo (Vuelta)":
		var div_contenedor = "box_vuelo";
		var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "hora_ida", "check_lista_espera"];
		var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_vuelo_ida, check_lista_espera];
		var campos_consulta = "";	
		var ruta_archivo = "php/buscadorvuelos2.php";
		
		loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	}
	
}


function valida_reserva(codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, check_lista_espera)
{	
	var cmb_hora_vuelo = document.getElementById("cmb_hora_vuelo");
	
	var hora_vuelo_ida = cmb_hora_vuelo.textContent.trim()
	
	var clase_aux;
	
	if (clase = 'Economy')
	{
		clase_aux = 'E';
	}
	else
	{
		clase_aux = 'P';
	}
	
	var fsalida_aux = fsalida.split("/").reverse().join("-");
	//fsalida = fsalida.split("/").reverse().join("-");
	
	//Valido que haya lugar disponible en el avion:
	var query = 'SELECT COUNT(cod_reserva) AS cantidad, ' + 
					'			a.asientos_economy, ' +
					'			a.asientos_primera ' +
					'FROM pasaje p ' +
					'		JOIN vuelo v ' +
					'			ON p.cod_vuelo = v.codigo ' +
					'		JOIN avion a ' +
					'			ON v.cod_avion = a.codigo ' +
					'WHERE v.codigo = ' + codvuelo + ' ' +
					'  AND p.fecha_vuelo = "' + fsalida_aux + '" ' +
					'	AND v.hora_vuelo = "' + hora_vuelo_ida + '" ' +
					'	AND p.clase_pasaje = "' + clase_aux + '" ' +
					'GROUP BY p.cod_vuelo, p.fecha_vuelo, v.hora_vuelo, p.clase_pasaje ';

	var div_contenedor = "";
	var tipo_query = 'S';
	var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
	var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
	var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
	var campos_consulta = "cantidad|asientos_economy|asientos_primera";
				  
	var retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	var cant_asientos_ocup = retorno[0];

	var cant_asientos;
	
	if (clase_aux == 'E')
	{
		cant_asientos = retorno[1];
	}
	else
	{
		cant_asientos = retorno[2];
	}
	
	if (cant_asientos_ocup >= cant_asientos)
	{
		//En caso de que no haya lugar en el avion, se valida que los pasajeros en Lista de Espera no sea mayor a 10:
		query = 	'SELECT COUNT(cod_reserva) AS cantidad ' + 
					'FROM pasaje p ' +
					'		JOIN vuelo v ' +
					'			ON p.cod_vuelo = v.codigo ' +
					'WHERE v.codigo = ' + codvuelo + ' ' +
					'  AND p.fecha_vuelo = "' + fsalida_aux + '" ' +
					'	AND v.hora_vuelo = "' + hora_vuelo_ida + '" ' +
					'  AND p.flag_lista_espera != "" ' +
					'GROUP BY p.cod_vuelo, v.hora_vuelo, p.fecha_vuelo ';
		
		div_contenedor = "";
		tipo_query = 'S';
		ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
		nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
		valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		campos_consulta = "cantidad";

		retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

		var cant_lista_espera = retorno[0];
		
		if ( cant_lista_espera >= 10 )
		{
			alert("No se dispone de cupo para el viaje solicitado");
			
			return false;
		}
		else
		{
			var respuesta = confirm("No se dispone de lugar para el vuelo seleccionado ¿Desea quedar en lista de espera?"); 
	
			if (respuesta == false)
			{
				//Vuelvo a la pantalla de Busqueda Original:
				f_volver_buscar();
			}
			else
			{
				check_lista_espera = 1;
				
				//Llamo a la pantalla de "Datos del Pasajero":
				var div_contenedor = "box_vuelo";
				var ruta_archivo = "php/datos_pasajero.php";
				var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "hora_ida", "check_lista_espera"];
				var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_vuelo_ida, check_lista_espera];
				var campos_consulta = "";	
				
				loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
			}
		}
	}
	else
	{
		//Llamo a la pantalla de "Datos del Pasajero":
		var div_contenedor = "box_vuelo";
		var ruta_archivo = "php/datos_pasajero.php";
		var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "hora_ida", "check_lista_espera"];
		var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_vuelo_ida, check_lista_espera];
		var campos_consulta = "";	
		
		loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	}

}


function valida_reserva2(codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_ida, check_lista_espera)
{
	var cmb_hora_vuelo = document.getElementById("cmb_hora_vuelo");
	
	var hora_vuelo_Vuelta = cmb_hora_vuelo.textContent.trim();
	
	var clase_aux;
	
	if (clase = 'Economy')
	{
		clase_aux = 'E';
	}
	else
	{
		clase_aux = 'P';
	}
	
	var fregreso_aux =  fregreso.split("/").reverse().join("-");
	//fregreso = fregreso.split("/").reverse().join("-");
	
	//Valido que haya lugar disponible en el avion:
	var query = 'SELECT COUNT(cod_reserva) AS cantidad, ' + 
					'			a.asientos_economy, ' +
					'			a.asientos_primera ' +
					'FROM pasaje p ' +
					'		JOIN vuelo v ' +
					'			ON p.cod_vuelo = v.codigo ' +
					'		JOIN avion a ' +
					'			ON v.cod_avion = a.codigo ' +
					'WHERE v.codigo = ' + codvuelo + 
					'  AND p.fecha_vuelo = "' + fregreso_aux + '" ' +
					'	AND v.hora_vuelo = "' + hora_vuelo_Vuelta + '" ' +
					'	AND p.clase_pasaje = "' + clase_aux + '" '+
					'GROUP BY p.cod_vuelo, p.fecha_vuelo, v.hora_vuelo, p.clase_pasaje ';

	var div_contenedor = "";
	var tipo_query = 'S';
	var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
	var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
	var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
	var campos_consulta = "cantidad|asientos_economy|asientos_primera";
				  
	var retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	var cant_asientos_ocup = retorno[0];

	var cant_asientos;
	
	if (clase_aux == 'E')
	{
		cant_asientos = retorno[1];
	}
	else
	{
		cant_asientos = retorno[2];
	}
	
	if (cant_asientos_ocup >= cant_asientos)
	{
		//En caso de que no haya lugar en el avion, se valida que los pasajeros en Lista de Espera no sea mayor a 10:
		query = 	'SELECT COUNT(p.cod_reserva) AS cantidad ' + 
					'FROM pasaje p ' +
					'		JOIN vuelo v ' +
					'			ON p.cod_vuelo = v.codigo ' +
					'WHERE v.codigo = ' + codvuelo + ' ' +
					'  AND p.fecha_vuelo = "' + fsalida_aux + '" ' +
					'	AND v.hora_vuelo = "' + hora_vuelo_ida + '" ' +
					'  AND p.flag_lista_espera != "" ' +
					'GROUP BY p.cod_vuelo, v.hora_vuelo, p.fecha_vuelo ';
		
		div_contenedor = "";
		tipo_query = 'S';
		ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
		nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
		valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		campos_consulta = "cantidad";

		retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);

		var cant_lista_espera = retorno[0];
		
		if ( cant_lista_espera >= 10 )
		{
			alert("No se dispone de cupo para el viaje solicitado");
			
			return false;
		}
		else
		{
			var respuesta = confirm("No se dispone de lugar para el vuelo seleccionado ¿Desea quedar en lista de espera?"); 
		
			if (respuesta == false)
			{
				//Vuelvo a la pantalla de Busqueda Original:
				f_volver_buscar();
			}
			else
			{
				check_lista_espera = 1;
				
				//Llamo a la pantalla de "Datos del Pasajero":
				var div_contenedor = "box_vuelo";
				var ruta_archivo = "php/datos_pasajero.php";
				var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "hora_ida", "hora_vuelta", "check_lista_espera"];
				var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_ida, hora_vuelo_Vuelta, check_lista_espera];
				var campos_consulta = "";	
				
				loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
			}
		}
	}
	else
	{
		//Llamo a la pantalla de "Datos del Pasajero":
		var div_contenedor = "box_vuelo";
		var ruta_archivo = "php/datos_pasajero.php";
		var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "hora_ida", "hora_vuelta", "check_lista_espera"];
		var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_ida, hora_vuelo_Vuelta, check_lista_espera];
		var campos_consulta = "";	
		
		loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	}
}


function val_dat_pasajero(codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, hora_ida, hora_vuelta, check_lista_espera)
{
	var nomyape = document.getElementById("nomyape");
	var dni = document.getElementById("dni");
	var fnacimiento = document.getElementById("fnacimiento");
	var email = document.getElementById("email");
	
	var div_contenedor = "";
	
	if (validaVacio(nomyape.value) == false)
	{
		nomyape.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (Nombre y Apellido)");
		
		nomyape.focus();
		
		return false;
	}
	else if (validaVacio(dni.value) == false)
	{
		dni.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (D.N.I)");
		
		dni.focus();
		
		return false;
	}
	else if (isNaN(dni.value)) 
	{
		dni.style.backgroundColor = '#FC9C9C';
		
		alert("Debe ingresar solo Números, en el campo (D.N.I)");
		
		dni.focus();
		
		return false;
	}
	else if ( dni.value.length < 8 ) 
	{
		dni.style.backgroundColor = '#FC9C9C';
		
		alert("El campo (D.N.I), debe contener 8 números");
		
		dni.focus();
		
		return false;
	}
	else if (validaVacio(fnacimiento.value) == false)
	{
		fnacimiento.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (F. Nacimiento)");
		
		fnacimiento.focus();
		
		return false;
	}
	else if (validate_fecha(fnacimiento.value) == false)
	{
		fnacimiento.style.backgroundColor = '#FC9C9C';
		
		alert("La Fecha de Nacimiento ingresada, no es correcta. Vuelva a ingresarla en formato: (YYYY-MM-DD)");
		
		fnacimiento.focus();
		
		return false;
	}
	else if (validaVacio(email.value) == false)
	{
		email.style.backgroundColor = '#FC9C9C';
		
		alert("Debe completar el campo (E-Mail)");
		
		email.focus();
		
		return false;
	}
	else
	{
		var vSimbolo = false;
		var vResto   = false;
		
		for (i = 0; i < email.value.length; i++)
		{  
			if (email.value.charAt(i) == "@")
				vSimbolo = true;
		}
		
		if (!vSimbolo)
		{
			email.style.backgroundColor = '#FC9C9C';
			
			alert("El E-Mail debe contener el simbolo (@)");
			
			email.focus();
			
			return false;
		}
		else
		{
			for (i = 0; i < email.value.length; i++)
			{  
				if (email.value.charAt(i) != "@" && email.value.charAt(i) != " ")
				{
					vResto = true;
				}
			}
		}
		
		if (!vResto || validarEmail(email.value) == false)
		{
			email.style.backgroundColor = '#FC9C9C';
			
			alert("Formato de E-Mail invalido, debe completarlo");
			
			email.focus();
			
			return false;
		}
	}
	
	var div_contenedor = "box_vuelo";
	var ruta_archivo = "php/confir_datos_reserva.php";
	var nom_var_hidden = ["codvuelo","origen", "corigen", "destino", "cdestino","precio","fsalida", "codvueloV", "origenV", "corigenV", "destinoV", "cdestinoV", "precioV", "fregreso","clase", "dia_salida", "dia_regreso", "ida_vuelta", "nomyape", "dni", "fnacimiento", "email", "hora_ida", "hora_vuelta", "check_lista_espera"];
	var valor_var_hidden = [codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, nomyape.value, dni.value, fnacimiento.value, email.value, hora_ida, hora_vuelta, check_lista_espera];
	var campos_consulta = "";	
	
	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
}


function confirmar_reserva(codvuelo, origen, corigen, destino, cdestino, precio, fsalida, codvueloV, origenV, corigenV, destinoV, cdestinoV, precioV, fregreso, clase, dia_salida, dia_regreso, ida_vuelta, nomyape, dni, fnacimiento, email, hora_ida, hora_vuelta, check_lista_espera)
{
	var retorno;
	
	var clase_aux;
	
	if (clase = 'Economy')
	{
		clase_aux = 'E';
	}
	else
	{
		clase_aux = 'P';
	}
	
	//Inserto el Usuario:
	var query = 'INSERT INTO usuario VALUES (NULL, ' + dni + ', "' + nomyape + '" , "' + fnacimiento + '", "' + email + '" )';
	var tipo_query = 'I';
	var div_contenedor = "";
	var ruta_archivo = "bbdd/f_ejecutar_query.php";
	var nom_var_hidden = ["query", "tipo_query"];
	var valor_var_hidden = [query, tipo_query];
	var campos_consulta = "";
	
	var cod_reserva_IDA;
	var cod_reserva_VUELTA;

	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	//Busco el código de Usuario insertado:
	query =  'SELECT codigo, SYSDATE() as fecha_actual ' + 
				'FROM usuario ' +
				'WHERE dni = ' + dni + ' ' +
				'  AND nombre_apellido = "' + nomyape + '" ' +
				'ORDER BY codigo';

	div_contenedor = "";
	tipo_query = 'S';
	ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
	nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
	valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
	campos_consulta = "codigo|fecha_actual";
				  
	retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	var usuario_insert = retorno[0];
	var fecha_actual = retorno[1];
	
	fsalida = fsalida.split("/").reverse().join("-");
	
	//Inserto los datos de la Reserva de IDA:
	if (check_lista_espera == "")
	{
		query = 'INSERT INTO pasaje VALUES (NULL, ' + codvuelo + ',' + usuario_insert + ',"' + clase_aux + '","' + fecha_actual + '",' + 'NULL' + ',' + 'NULL' + ',"' + fsalida + '",' + 'NULL' + ')';
	}
	else
	{
		query = 'INSERT INTO pasaje VALUES (NULL, ' + codvuelo + ',' + usuario_insert + ',"' + clase_aux + '","' + fecha_actual + '",' + check_lista_espera + ',' + 'NULL' + ',"' + fsalida + '",' + 'NULL' + ')';
	}
	
	tipo_query = 'I';
	div_contenedor = "";
	ruta_archivo = "bbdd/f_ejecutar_query.php";
	nom_var_hidden = ["query", "tipo_query"];
	valor_var_hidden = [query, tipo_query];
	campos_consulta = "";

	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	//Busco el código de Reserva de IDA insertado:
	query =  'SELECT AUTO_INCREMENT - 1 AS cod_reserva ' + 
				'FROM information_schema.tables ' +
				'WHERE table_name = "pasaje" ' +
				'  AND table_schema = "aerolinea" ';

	div_contenedor = "";
	tipo_query = 'S';
	ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
	nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
	valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
	campos_consulta = "cod_reserva";
				  
	retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	cod_reserva_IDA = retorno[0];
	
	fregreso = fregreso.split("/").reverse().join("-");
	
	//Inserto los datos de Reserva de Vuelta:
	if (ida_vuelta == "S")
	{
		if (check_lista_espera == "")
		{
			query = 'INSERT INTO pasaje VALUES (NULL, ' + codvuelo + ',' + usuario_insert + ',"' + clase_aux + '","' + fecha_actual + '",' + 'NULL' + ',' + 'NULL' + ',"' + fregreso + '",' + 'NULL' + ')';
		}
		else
		{
			query = 'INSERT INTO pasaje VALUES (NULL, ' + codvuelo + ',' + usuario_insert + ',"' + clase_aux + '","' + fecha_actual + '",' + check_lista_espera + ',' + 'NULL' + ',"' + fregreso + '",' + 'NULL' + ')';
		}
		
		tipo_query = 'I';
		div_contenedor = "";
		ruta_archivo = "bbdd/f_ejecutar_query.php";
		nom_var_hidden = ["query", "tipo_query"];
		valor_var_hidden = [query, tipo_query];
		campos_consulta = "";

		loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
		
		//Busco el código de Reserva de VUELTA insertado:
		query =  'SELECT AUTO_INCREMENT - 1 AS cod_reserva ' + 
					'FROM information_schema.tables ' +
					'WHERE table_name = "pasaje" ' +
					'  AND table_schema = "aerolinea" ';

		div_contenedor = "";
		tipo_query = 'S';
		ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
		nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
		valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		campos_consulta = "cod_reserva";
					  
		retorno  = loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
		
		cod_reserva_VUELTA = retorno[0];
	}
	
	//Ir a la ultima pantalla para mostrar los codigos de reserva generados:
	div_contenedor = "box_vuelo";
	ruta_archivo = "php/mostrar_cod_reserva.php";
	campos_consulta = "";	
	
	if (ida_vuelta == "S")
	{
		nom_var_hidden = ["cod_reserva_IDA", "cod_reserva_VUELTA", "ida_vuelta"];
		valor_var_hidden = [cod_reserva_IDA, cod_reserva_VUELTA, ida_vuelta];
	}
	else
	{
		nom_var_hidden = ["cod_reserva_IDA", "ida_vuelta"];
		valor_var_hidden = [cod_reserva_IDA, ida_vuelta];
	}
		
	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
}


function validate_fecha(fecha) 
 { 
	var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$"); 
	
	if(fecha.search(patron) == 0) 
	{ 
		var values = fecha.split("-"); 
		
		if(isValidDate(values[2],values[1],values[0])) 
		{ 
			return true; 
		} 
	} 
	
	return false; 
}

function isValidDate(day,month,year) 
{ 
	var dteDate; 

	month = month-1;
 
	dteDate = new Date(year,month,day);
 
	return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
 }
 
 
 function validarEmail( email ) 
 {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
	if ( !expr.test(email) )
	{
		return false;
	}
	
	return true;
}
 

function f_volver_buscar()
{
	window.location.reload();  
}


function validaVacio(campo)
{
	for (i = 0; i < campo.length; i++)
	{  
		if (campo.charAt(i) != " ")
		{  
			return true  
		}  
	}

	return false
 }