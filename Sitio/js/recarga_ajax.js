function loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden)
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
	
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById(div_contenedor).innerHTML = xmlhttp.responseText;
		}
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

	xmlhttp.open("POST", ruta_archivo, true);
	
	xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	
	xmlhttp.send(var_hidden);
}