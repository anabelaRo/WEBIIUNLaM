<?php
session_start();
	if(!isset($_SESSION['logueado']))
		header('location: /Sitio/inicio.php');


setcookie('persona',$_SESSION['usuario'],time()-1000);

header('location: /Sitio/inicio.php?sesion=destruida');
		
?>
