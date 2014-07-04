<?php
	$msj_error = isset($_POST['msj_error']) ? $_POST['msj_error'] : "";
	
	echo '	<div id="div_msj_error_pago">
					<div id="mensaje_img_pago" class="warning">
						<img src="img/alerta.jpg">
					</div>
					<div id="mensaje_text_pago" class="warning">
						<section>'
							.$msj_error.
						'</section>
					</div>
				</div>';
?>