

<?php
	session_start();
	if (!isset($_SESSION['logueado']))
		header('location: /Sitio/inicio.php');

						$_SESSION['usuario']=$_POST['usuario'];
						$_SESSION['pass']=$_POST['pass'];
					
					
					
						if(($_SESSION['usuario']!='') && ($_SESSION['pass']!=''))
							{
								if(($_SESSION['usuario']=='DEL PLATA') && ($_SESSION['pass']=='1234'))
										{	
											$_SESSION['logueado']=true;
											
												setcookie('persona',$_SESSION['usuario'],time()+86400*365);
												echo "Bienvenido " . $_SESSION['usuario'] . " / ";
												echo'<a href="/Sitio/sesion/destruir_sesion.php">Cerrar sesion</a><br />';
																																									
										}
									
								else header('location: /Sitio/inicio.php?error=1');				
							}
						else header('location: /Sitio/inicio.php?error=2');
?>
