<?php
include("templates.php");
$plantilla = new templates("html", "html");

$plantilla->setEtiqueta(array(
	'sitio_titulo' => 'Motor de plantillas',
	'sitio_url' => 'http://localhost/templates/',
	'sitio_pagina_titulo' => 'Pagina de inicio',
));

$plantilla->setEtiqueta("copy", "Copyright &copy; {TIEMPO|Y} - Todos los derechos reservados");

$lista_multi = array(
	array(
		'numero' => '1', 'dia' => 'Domingo', 'texto' => 'Lo que sea'
	),
	array(
		'numero' => '2', 'dia' => 'Lunes', 'texto' => 'Lo que sea'
	),
	array(
		'numero' => '3', 'dia' => 'Martes', 'texto' => 'Lo que sea'
	),
	array(
		'numero' => '4', 'dia' => 'Miercoles', 'texto' => 'Lo que sea'
	),
	array(
		'numero' => '5', 'dia' => 'Jueves', 'texto' => 'Lo que sea'
	),
	array(
		'numero' => '6', 'dia' => 'Viernes', 'texto' => 'Lo que sea'
	),
	array(
		'numero' => '7', 'dia' => 'Sabado', 'texto' => 'Lo que sea'
	),
);

$plantilla->setBloque(
	"bloque",
	array(
		array('1', 'Domingo', 'Lo que sea'),
		array('2', 'Lunes', 'Lo que sea'),
		array('3', 'Martes', 'Lo que sea'),
		array('4', 'Miercoles', 'Lo que sea'),
		array('5', 'Jueves', 'Lo que sea'),
		array('6', 'Viernes', 'Lo que sea'),
		array('7', 'Sabado', 'Lo que sea'),
	),
	array('numero', 'dia', 'texto')
);

$loged = false;
$plantilla->setCondicion("is_sesion", $loged);
$plantilla->setCondicion("not_sesion", !$loged);

$plantilla->display("prueba");
