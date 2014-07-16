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
		
		if (validaVacio(cod_reserv_P.value) == false) //"validaVacio", valida que el campo del forlulario, no esté vacio, ni con espacios
		{
			cod_reserv_P.style.backgroundColor = '#FC9C9C'; //Pinta de color rojo el campo que dió error
			cod_reserv_P.focus(); //Posiciona el foco en el campo que dió el error
			
			msj_error = 'Debe ingresar el Código de Reserva'; //Este mensaje se carga en "div_msj_error.php", llamado en la linea de abajo
			ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
		else
		{
			query = 'SELECT * FROM pasaje WHERE cod_reserva = ' + cod_reserv_P.value; //Se carga el QUERY que se va a ajecutar en la BB.DD
			tipo_query = 'S'; //tipo_query puede ser "S" (SELECT) ó "I" (INSERT ó UPDATE)
			ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
			campos_consulta = "cod_reserva|cod_vuelo|cod_usuario|cod_pago|fecha_reserva|flag_check_in|fecha_vuelo|cod_asiento";
		}
	}
	else 
	{
		var cod_reserv_C = document.getElementById("text_cod_reserv_C");
		var div_contenedor = "div_recargar_check_in"; //Nombre del DIV en donde se va a cargar el Archivo enviado
		
		if (validaVacio(cod_reserv_C.value) == false)
		{
			cod_reserv_C.style.backgroundColor = '#FC9C9C';
			cod_reserv_C.focus();
			
			msj_error = 'Debe ingresar el Código de Reserva';
			ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
		else
		{
			query = 'SELECT * FROM pasaje WHERE cod_reserva = ' + cod_reserv_C.value;
			tipo_query = 'S';
			ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
			nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
	}
	
	//Si se hizo un consulta a la BB.DD, los resultados se van a guardar en el vector "retorno":
	var retorno =  loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	alert(retorno); //Sacar, es solo para probar
}

/* AGREGO FUNCION PARA VALIDAR Y BUSCAR VUELOS | ANABELA 15/07 */
function valida_buscador()
{
	var campos_consulta = "";
	var msj_error = "";
	var ruta_archivo = "";
	var query = "";
	var tipo_query = "";
	var nom_var_hidden = [""];
	var valor_var_hidden = [""];
	
	var origen = document.getElementById("origen");
	var destino = document.getElementById("destino");
	var fsalida = document.getElementsByName("fsalida")[0].value
	var fregreso = document.getElementsByName("fregreso")[0].value
	var idayvuelta = document.getElementById("idayvuelta").checked;
	var clase = document.getElementsByName("clase")[0].value;

	var div_contenedor = "box_vuelo";
	alert('entro')
	var dsal = new Date(fsalida);
		
		var weekday = new Array(7);
		weekday[0]=  "domingo";
		weekday[1] = "lunes";
		weekday[2] = "martes";
		weekday[3] = "miercoles";
		weekday[4] = "jueves";
		weekday[5] = "viernes";
		weekday[6] = "sabado";

		var nsal = weekday[dsal.getDay()];  /* FUNCION PARA CONVERTIR FECHA EN DÍA | ANABELA 15/7 */

	alert(nsal);

	alert(idayvuelta);

	alert(clase);

	if (validaVacio(origen.value) == false )
		{
			origen.style.backgroundColor = '#FC9C9C';
			origen.focus();
			
			var msj_error = 'Debe ingresar el Código de Origen';
			var ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			var nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			var valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}	
		else
		{	 
		 	if (idayvuelta.value == false) 
		 	{

				var query = 'select v.codigo as codvuelo, v.origen, co.descripcion as corigen, v.destino, cd.descripcion as cdestino, v.precio_'+ clase +' from vuelo v join aeropuerto ao on v.origen = ao.codigo_OACI join ciudad co on ao.ciudad = co.codigo join aeropuerto ad on v.destino = ad.codigo_OACI join ciudad cd on ad.ciudad = cd.codigo join avion a on a.codigo = v.cod_avion where co.descripcion= "' + origen.value + '" and cd.descripcion= "' + destino.value + '" and v.' + nsal + ' = 1 and a.asientos_' + clase + ' != 0';
				/* +'or cd.descripcion = ' + destino.value */
				alert(query);
				var tipo_query = 'S';
				var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
				var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
				var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
				var campos_consulta = "codvuelo|v.origen|ccorigen|v.destino|cdestino";
			
			}
			else /*si es ida y vuelta añade query con origen / destino invertido */
			{	 /* falta unir ambas querys o ejecutar nuevamente la 1 */
				var origenAux = destino;
				var destinoAux = origen;
				var query = 'select v.codigo as codvuelo, v.origen, co.descripcion as corigen, v.destino, cd.descripcion as cdestino, v.precio_'+ clase +' from vuelo v join aeropuerto ao on v.origen = ao.codigo_OACI join ciudad co on ao.ciudad = co.codigo join aeropuerto ad on v.destino = ad.codigo_OACI join ciudad cd on ad.ciudad = cd.codigo join avion a on a.codigo = v.cod_avion where co.descripcion= "' + origenAux.value + '" and cd.descripcion= "' + destinoAux.value + '" and v.' + nsal + ' = 1 and a.asientos_' + clase + ' != 0';
				/* +'or cd.descripcion = ' + destino.value */
				alert(query);
				var tipo_query = 'S';
				var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
				var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
				var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
				var campos_consulta = "codvuelo|v.origen|corigen|v.destino|cdestino";
			}
			//Si se hizo un consulta a la BB.DD, los resultados se van a guardar en el vector "retorno":
	var retorno =  loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
	
	alert(retorno); //Sacar, es solo para probar
}
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