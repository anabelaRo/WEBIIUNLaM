function resize_popUp()
{
	var modelo = document.getElementById("modelo_avion").value; 			
	var div_popUp = document.getElementById("div_popUp").style;
	var div_aceptar = document.getElementById("div_aceptar").style;

	switch (modelo) 
	{
		case 'EMB-120':
			div_popUp.width = "555px"; 
			div_popUp.height = "284px";
			
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
var asiento_selec = "";

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
	
	asiento_selec = asiento.id;
}

function aceptar()
{
	loadXMLDoc();
}

function loadXMLDoc()
{ 
	var xmlhttp;
	
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
			document.getElementById("div_asiento_selecc").innerHTML = xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("GET", "popUp_Aviones/var_asiento_selecc.php?asiento_selecc=" + asiento_selec, true);

	xmlhttp.send();	
}