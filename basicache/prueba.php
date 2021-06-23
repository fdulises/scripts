<?php
	require 'basicache.php';
	
	$cachedir = 'cache';
	$id = 151;
	
	$contenido = basicache::get($cachedir, $id);
	if( $contenido ) $contactual = $contenido;
	else{
		$contactual = '<h1>Contenido guardado en cache.</h1>';
		$contactual .= '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>';
		//Creamos archivo de cache con caducidad de una hora
		basicache::post($cachedir, $id, $contactual, (60*60));
	}
	
	echo $contactual;