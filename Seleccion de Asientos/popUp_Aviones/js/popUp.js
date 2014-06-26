function resize_popUp()
{
	var modelo = document.getElementById("modelo_avion").value; 			
	var div_popUp = document.getElementById("div_popUp").style;
	var div_aceptar = document.getElementById("div_aceptar").style;

	switch (modelo) 
	{
		case 'EMB-120':
			div_popUp.width = "555px"; 
			div_popUp.height = "280px";
			
			div_aceptar.marginLeft = "474px";
			break;
			
		case 'ER-145':
			div_popUp.width = "830px"; 
			div_popUp.height = "331px";
			
			div_aceptar.marginLeft = "748px";
			break;
			
		case 'ER-145_2':
			div_popUp.width = "812px"; 
			div_popUp.height = "331px";
			
			div_aceptar.marginLeft = "730px";
			break;
			
		case 'ER-170':
			div_popUp.width = "959px"; 
			div_popUp.height = "331px";
			
			div_aceptar.marginLeft = "877px";
			break;
	}
}
		
var asiento_ant = "";

function changeBgcolor(asiento)
{
	if (asiento_ant == "")
	{
		asiento_ant = asiento;
	}
	
	var objPadre = asiento_ant.offsetParent.attributes.id.nodeValue;
	
	if (objPadre.indexOf("_P") != -1)
	{
		asiento_ant.style.backgroundColor = "#f98820";
	}
	else
	{
		asiento_ant.style.backgroundColor = "#ffffff";
	}
	
	asiento.style.backgroundColor = "#01DF01";

	asiento_ant = asiento;
	
	/*var xmlhttp;

	if (window.XMLHttpRequest)
	{
		xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
	}

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		   document.getElementById("num_asiento").innerHTML=xmlhttp.responseText;
		}
	}
	
	var url = 'llamado.php?asiento=' + asiento;
	
	xmlhttp.open("POST", url, true);
	
	xmlhttp.send();*/

	/*var http = getXMLHTTPRequest(); // creo una instancia del objeto XMLHTTPRequest.
	
	var variable = "HOLA";
	
	var url = 'llamado.php?variable=' + variable; // creación de la URL.
    http.open("GET", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.*/
	
	//enviarvariable('hola'); // llamo a la función pasándole como parámetro el valor de la variable que quieres enviar.
}

// Esta función se encarga de crear el objeto XMLHTTPRequest y lo devuelve.
/*function getXMLHTTPRequest() {
  try {
    req = new XMLHttpRequest();
  } catch(err1) {
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err2) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err3) {
        req = false;
      }
    }
  }
  return req;
}

function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      alert(http.responseText); // El texto de respuesta del archivo index.php lo muestra como una alerta.
    }
  }
}*/

function aceptar()
{
	close();
}