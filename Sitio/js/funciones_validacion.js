function valida_codigo_reserva(var_div)
{
	if (var_div == 'Pago')
	{
		var cod_reserv_P = document.getElementById("text_cod_reserv_P");
		var div_contenedor = "div_recargar_pago"; //Nombre del DIV en donde se va a cargar el Archivo enviado
		
		if (validaVacio(cod_reserv_P.value) == false)
		{
			cod_reserv_P.style.backgroundColor = '#FC9C9C';
			cod_reserv_P.focus();
			
			var msj_error = 'Debe ingresar el Código de Reserva';
			var ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			var nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			var valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
		else
		{
			var query = 'SELECT * FROM pasaje WHERE cod_reserva = ' + cod_reserv_P.value;
			var tipo_query = 'S';
			var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
			var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
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
			
			var msj_error = 'Debe ingresar el Código de Reserva';
			
			
			var ruta_archivo = "php/div_msj_error.php"; //Ruta del Archivo a cargar en el DIV
			var nom_var_hidden = ["msj_error"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			var valor_var_hidden = [msj_error]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
		else
		{
			var query = 'SELECT * FROM pasaje WHERE cod_reserva = ' + cod_reserv_C.value;
			var tipo_query = 'S';
			var ruta_archivo = "bbdd/f_ejecutar_query.php"; //Ruta del Archivo a cargar en el DIV
			var nom_var_hidden = ["query", "tipo_query"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
			var valor_var_hidden = [query, tipo_query]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"
		}
	}
	
	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden);
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