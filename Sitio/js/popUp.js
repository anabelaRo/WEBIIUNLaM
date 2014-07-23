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
	var div_contenedor = "div_asiento_selecc";
	var ruta_archivo = "popUp_Aviones/var_asiento_selecc.php";

	var nom_var_hidden = ["asiento_selecc"];
	var valor_var_hidden = [asiento_selec];
	var campos_consulta = "";
	
	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden, campos_consulta);
}