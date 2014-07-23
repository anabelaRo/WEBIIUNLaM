<html>
	<head>
	</head>
	
	<body>
		<?php
			$cod_reserva_IDA = isset($_POST['cod_reserva_IDA']) ? $_POST['cod_reserva_IDA'] : "";
			$cod_reserva_VUELTA = isset($_POST['cod_reserva_VUELTA']) ? $_POST['cod_reserva_VUELTA'] : "";
			$ida_vuelta = isset($_POST['ida_vuelta']) ? $_POST['ida_vuelta'] : "";
		?>
		
		<div id="div_realizar_reserva_3">
			
			<h3 class="title_h3_res">Código de Reserva</h3>
			
			<?php
			if ($ida_vuelta == 'S')
			{
			?>					
				<label class="label_text_res" for="cod_ida">Código de Reserva de Ida:</label>
				<input type="text" class="input_text_res" value="<?php echo $cod_reserva_IDA ?>"  disabled />
				<br/>
				<label class="label_text_res_1" for="cod_vuelta">Código de Reserva de Vuelta:</label>
				<input type="text" class="input_text_res" value="<?php echo $cod_reserva_VUELTA ?>"  disabled />
			<?php
			}
			else
			{
			?>
				<label class="label_text_res" for="cod_ida">Código de Reserva de Ida:</label>
				<input type="text" class="input_text_res" value="<?php echo $cod_reserva_IDA ?>"  disabled />
			<?php
			}
			?>
			
			<br/>
			<br/>
			<br/>
			
			<div id="div_botones_res">
				<input type="button" class="input_button_res" id="btn_volver" name="btn_volver" value="Salir" onclick="f_volver_buscar()"/>
			</div>
		
		</div>
	</body>	
</html>	