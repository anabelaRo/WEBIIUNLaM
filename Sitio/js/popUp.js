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
	var div_contenedor = "div_asiento_selecc"; //Nombre del DIV en donde se va a cargar el Archivo enviado
	var ruta_archivo = "popUp_Aviones/var_asiento_selecc.php"; //Ruta del Archivo a cargar en el DIV
	//Sin variables hidden:
	//var nom_var_hidden = "";
	//var valor_var_hidden = "";

	//Si se necesita enviar variables hidden al archivo definido en "ruta_archivo":
	//Las variables viajaran junto al archivo y se deberan tomar desde éste con el metodo "$_POST":
	//$ejemplo = isset($_POST['var_hidden_ejemplo']) ? $_POST['var_hidden_ejemplo'] : "";
	var nom_var_hidden = ["asiento_selecc"]; //Se carga el vector con el/los nombres de las variables hidden, si es que las hay
	var valor_var_hidden = [asiento_selec]; //Se carga el vector con el/los valores que tienen que tomar las variables definidas en "nom_var_hidden"

	//Esta funcion se encarga de recargar un archivo, en un DIV:
	loadXMLDoc(div_contenedor, ruta_archivo, nom_var_hidden, valor_var_hidden);
}