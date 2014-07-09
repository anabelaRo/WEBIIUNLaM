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