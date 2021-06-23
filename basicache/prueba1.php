<?php
	require 'basicache.php';
	
	$cachedir = 'cache';
	$id = 151;
	$contactual = '<h1>Contenido guardado en cache.</h1>';
	$contactual .= file_get_contents('relleno.php');
	basicache::put($cachedir, $id, $contactual, (60*60));
	echo "Cache actualizado par el id 151";