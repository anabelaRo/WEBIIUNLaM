<?php
	function f_generar_asientos($modelo)
	{
		switch ($modelo) 
		{
			case 'EMB-120':
				$filas_E = 3;
				$columnas_I = 1;
				$columnas_E = 10;
				
				$num_letra_E = 4;
				break;
				
			case 'ER-145':
				$filas_P = 2;
				$columnas_P = 5;
				$filas_E = 5;
				$columnas_I = 6;
				$columnas_E = 19;
				
				$num_letra_P = 1;
				$num_letra_E = 0;
				break;
				
			case 'ER-145_2':
				$filas_P = 2;
				$columnas_P = 10;
				$filas_E = 5;
				$columnas_I = 11;
				$columnas_E = 31;
				
				$num_letra_P = 1;
				$num_letra_E = 0;
				break;
				
			case 'ER-170':
				$filas_P = 3;
				$columnas_P = 10;
				$filas_E = 4;
				$columnas_I = 11;
				$columnas_E = 40;
				
				$num_letra_P = 0;
				$num_letra_E = 0;
				break;
		}

		echo '<div id="avion-'.$modelo.'">
					<div id="asientos">';
		
			if($modelo != 'EMB-120')
			{
				echo '<div id="primera-'.$modelo.'">	
							<table id="tabla-'.$modelo.'_P">
								<tbody>';

									for ($i=1; $i<=$filas_P; $i++)
									{
										echo '<tr id="FILA_'.$i.'">';
										
											$num_letra_P = $num_letra_P + 1;
											
											switch ($num_letra_P) 
											{
												case 1:
													$fila = "C";
													break;
													
												case 2:
													$fila = "B";
													break;
													
												case 3:
													$fila = "A";
													break;
											}
											
											for ($j=1; $j<=$columnas_P; $j++)
											{
												echo '<td id="ASIENTO_'.$i.'-'.$j.'" title="Asiento: '.$fila.'-'.$j.'" onClick="changeBgcolor(this)"></td>';
											}	

										echo '</tr>';
									}

				echo '		</tbody>
							</table>
						</div>';
			}
				echo '<div id="economy-'.$modelo.'">	
							<table id="tabla-'.$modelo.'_E">
								<tbody>';

									for ($i=1; $i<=$filas_E; $i++)
									{
										echo '<tr id="FILA_'.$i.'">';
										
											$num_letra_E = $num_letra_E + 1;
											
											switch ($num_letra_E) 
											{
												case 1:
													$fila = "G";
													break;
													
												case 2:
													$fila = "F";
													break;
													
												case 3:
													$fila = "E";
													break;
													
												case 4:
													$fila = "D";
													break;
												
												case 5:
													$fila = "C";
													break;
														
												case 6:
													$fila = "B";
													break;
													
												case 7:
													$fila = "A";
													break;
											}
											
											for ($j=$columnas_I; $j<=$columnas_E; $j++)
											{
												echo '<td id="ASIENTO_'.$i.'-'.$j.'" title="Asiento: '.$fila.'-'.$j.'" onClick="changeBgcolor(this)"></td>';
											}	
									
										echo '</tr>';
									}

		echo '				</tbody>
							</table>
						</div>
					</div>
				</div>';
	}
?>