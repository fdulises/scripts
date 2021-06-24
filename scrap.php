<?php

	$url = 'http://www.debred.com';

	$data = [
		'title' => '',
		'img' => '',
		'decrip' => '',
		'favicon' => $url.'/favicon.ico',
		'url' => $url,
	];

	$HTML = file_get_contents($url);

	#obtenemos el titulo
	preg_match('/<title>(.*)<\/title>/is',$HTML,$title);
	if( $title ) $data['title'] = $title[1];

	#obtenemos la primera imagen
	preg_match('/<img(.*?)>/is',$HTML,$img);
	if( $img ){
		preg_match('/src=("|\')(.*?)("|\')/is', $img[0],$src);
		if( $src ) $data['img'] = $src[2];
	}

	#obtenemos la descripcion del sitio web
	preg_match_all('/<meta(.*?)>/is',$HTML,$meta);
	if( $meta ){
		foreach( $meta[1] as $v ){
			preg_match( '/name=("|\')description("|\')/is',$v,$descrip );
			if( $descrip ){
				preg_match( '/content=("|\')(.*?)("|\')/is',$v,$descrip );
				if( $descrip ) $data['decrip'] = $descrip[2];
				break;
			}
		}

	}


	echo "<pre>";
	print_r($data);
	echo "</pre>";