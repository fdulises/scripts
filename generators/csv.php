<?php
function getRows($file) {
	$handle = fopen($file, 'rb');
	if ($handle === false) {
		throw new Exception();
	}
	while (feof($handle) === false) {
		yield fgetcsv($handle);
	}
	fclose($handle);
}
function getFila($file, $fila){
	$repeticiones = 0;
	foreach (getRows($file) as $row){
		++$repeticiones;
		if( $repeticiones == $fila ){	
			print_r($row);
			break;
		}
	}
}
getFila('data.csv', 99000);