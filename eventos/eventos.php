<?php

	namespace xpanel;

	include 'event.php';
	
	event::add('registrar', function(){
		echo '<h1>Página de registro</h1>';
	});
	
	function eventoeliminado(){
		echo '<p>Texto que no se mostrara.</p>';
	}
	event::add('registrar', 'eventoeliminado');
	event::remove('registrar', 'eventoeliminado');
	
	event::add('registrado', function($cont, $id, $name){
		$cont .= '<p>Id: '.$id.'</p>';
		$cont .= '<p>Username: '.$name.'</p>';
		return $cont;
	}, 10, 2);
	
	event::add('registrado', function($cont){
		$cont .= '<p>Consectetur adipiscing elit.</p>';
		return $cont;
	}, 9);
	
	function registro(){
		event::fire('registrar');
		$cont = "<p>Usuario registrado correctamente</p>";
		$cont = event::apply('registrado', $cont, 21, 'prueba');
		echo $cont;
	}
	
	registro();