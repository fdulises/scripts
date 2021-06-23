<?php

	require 'DBConnector.php';
	require 'DB.php';

	DBConnector::connect('localhost', 'root', '', 'simulado');

	function userCreate(){
		DB::insert('usuarios_mock')
			->columns(['nickname', 'email', 'registro', 'estado', 'grupo'])
			->values(['lorem', 'lorem@debred.com', date('Y-m-d'), 3, 1])
			->send();
		DB::insert('usuarios_perfiles_mock')
			->columns(['uid', 'nombre', 'sexo', 'edad'])
			->values([DB::insertId(), 'lorem', '1', 18])
			->send();
	}
	function userRead(){
		return DB::select('usuarios_mock')
			->columns(
				['id', 'nickname', 'email', 'registro', 'estado', 'grupo', 'nombre', 'sexo', 'edad']
			)
			->leftJoin('usuarios_perfiles_mock', 'id', '=', 'uid')
			->limit(5)
			->order('id desc')
			->send();
	}
	function userUpdate(){
		DB::update('usuarios_mock')
			->leftJoin('usuarios_perfiles_mock', 'id', '=', 'uid')
			->set(['estado'=>2, 'nombre'=>'sit'])
			->where('nickname', '=', 'lorem')
			->send();
	}
	function userDelete(){
		DB::delete('usuarios_mock')
			->leftJoin('usuarios_perfiles_mock', 'id', '=', 'uid')
			->where('nickname', '=', 'lorem')
			->orWhere('nickname', '=', 'ipsum')
			->send();
	}

	//userCreate();
	//userUpdate();
	//userDelete();

	echo "<pre>";
	print_r( userRead() );
	echo "</pre>";
