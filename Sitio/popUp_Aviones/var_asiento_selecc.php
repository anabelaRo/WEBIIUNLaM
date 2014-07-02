<?php
	echo '<input type="hidden" id="asiento_selecc" value=""/>';
								
	$texto = isset($_POST['asiento_selecc']) ? $_POST['asiento_selecc'] : "";

	echo $texto;
?>