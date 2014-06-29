<?php
	echo '<input type="hidden" id="asiento_selecc" value=""/>';
								
	$texto = isset($_GET['asiento_selecc']) ? $_GET['asiento_selecc'] : "";

	echo $texto;
?>