<?php
	function sendMail($datos){
		$cabeceras  = 'MIME-Version: 1.0'."\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8'."\r\n";
		if( isset( $datos['from'] ) )
			$cabeceras .= 'From: '.$datos['from']."\r\n";
		if( isset( $datos['cc'] ) )
			$cabeceras .= 'CC: '.$datos['cc']."\r\n";
		if( isset( $datos['bcc'] ) )
			$cabeceras .= 'Bcc: '.$datos['bcc']."\r\n";

		$resultado = mail(
			$datos['destino'],
			$datos['asunto'],
			$datos['mensaje'],
			$cabeceras
		);
		return $resultado;
	}
	
	$resultado = sendMail(array(
		'destino' => alguien@sitio.algo, //Para quien va
		'asunto' => $_POST['asunto'],
		'mensaje' => "<strong>{$_POST['nombre']}</strong> escribio: "{$_POST['mensaje']},
		'from' => $_POST['email'],
	));
	
	if($resultado) echo 'Mensaje enviado';
	else echo 'Error al enviar el menaje';