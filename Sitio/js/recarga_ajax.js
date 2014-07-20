function loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta)
{ 
	var xmlhttp;
	var var_hidden = "";
	var len = nom_var_hidden.length;
	
	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest(); //code for IE7+, Firefox, Chrome, Opera, Safari
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); //code for IE6, IE5
	}
	
	if (len != 0)
	{
		for (var i = 0; i < len; i++) 
		{
			if (i == 0)
			{
				var_hidden = nom_var_hidden[i] + "=" + valor_var_hidden[i];
			}
			else
			{
				var_hidden = var_hidden + "&" + nom_var_hidden[i] + "=" + valor_var_hidden[i];
			}
		}
	}

	if(campos_consulta.length != 0)
	{
		var_hidden = var_hidden + "&campos=" + campos_consulta;
	}
	
	//xmlhttp.open("POST", ruta_archivo, true);
	xmlhttp.open("POST", ruta_archivo, false);
	
	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	
	xmlhttp.send(var_hidden);
	
	//xmlhttp.onreadystatechange = function()
	//{
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
		if(campos_consulta.length != 0)
		{
			var respuesta = xmlhttp.responseText;
					
			var res_parseada = respuesta.split("|");
		
			return res_parseada;
		}
		else
		{
			if(div_contenedor != "")
			{
				document.getElementById(div_contenedor).innerHTML = xmlhttp.responseText;
			}
		}
	}
	//}
}