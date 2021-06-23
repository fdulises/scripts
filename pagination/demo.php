<?php

	namespace wecor;
	
	//Insertamos la clase pagination
	require 'pagination.php';
	
	//Capturamos el numero de pagina actual desde get
	$_GET['p'] = ( isset($_GET['p']) ) ? $_GET['p'] : 1;
	
	//Creamos nuestro objeto de paginacion con los datos personalizados
	$pag = new pagination([
		'total' => 100, //Total de elementos
		'per_page' => 10, //Elementos por pagina
		'current_page' => $_GET['p'], //Pagina actual
		'url_base' => '', //Url base para links
		'friendly' => false, //False - url_base?pagina=n || True - url_base/n
		'page_string' => 'p', //Si friendly == true : url_base?page_string=n
		'num_links' => 2, //Numero de links a mostrar antes y despues de current
	]);
	
	//Imprimimos los datos obtenidos de la paginacion
	echo "<pre>";
	print_r($pag->result());
	echo "</pre>";

	//Aplicamos estilo para resaltar elemento actual
	echo '<style>.active{font-weight:bold}</style>';

	//Si existe, mostramos enlace Anterior
	if( $pag->hasPrev() )
		echo "<a href='{$pag->result('prev_page_url')}'>Anterior</a> ";
	
	//Imprimimos paginacion con los enlaces obtenidos automaticamente
	echo $pag->getLinks();
	
	//Si existe, mostramos enlace siguiente
	if( $pag->hasNext() )
		echo " <a href='{$pag->result('next_page_url')}'>Siguiente</a>";