<?php
	function f_popUp_aviones($modelo_avion)
	{
		echo '<div id="div_asiento">
					<a href="#openModal" onclick="resize_popUp()">
						<div id="btn_asiento">
							<span>Seleccionar asiento</span>
						</div> 
					</a>
				</div>

				<div id="openModal" class="modalDialog">
					<div id="div_popUp">
						<a href="#close" title="Cerrar" class="close"> X </a>';

						require_once $_SERVER{'DOCUMENT_ROOT'} . '\Sitio\popUp_Aviones\f_generar_asientos.php';

						f_generar_asientos($modelo_avion);

			echo '	<div id="div_aceptar">
							<a href="#close" onclick="aceptar()">
								<div id="btn_aceptar">
									<span>Aceptar</span>
								</div> 
							</a>
						</div>
					</div>
				</div>';
				
		echo '<div id="div_asiento_selecc">';

		echo '</div>';
	}
?>