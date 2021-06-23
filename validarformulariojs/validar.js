//Metodos para validar formularios
var validarCampos = function(vopciones, cbf){

	//Propiedades por defecto
	var op = {};
	op.tipo = vopciones.tipo || "";
	op.largo = vopciones.largo || 0;
	op.valor = vopciones.valor || true;
	op.errdata = vopciones.errdata || "campoerror";
	op.sucdata = vopciones.sucdata || "campocorrect";
	op.elemento = vopciones.elemento || {};
	op.cadena = vopciones.cadena || "";
	//Cadena sera igual al value del input
	if(op.valor){
		op.cadena = op.elemento.value;
	}
	var cbf = cbf || false;
	this.estado = false;

	//Validar que una cadena cumpla con un numero de caracteres minimo
	var largo = function(cadena, nl){
		if( cadena.length >= nl ){
			estado = true;
			return true;
		}else{
			return false;
		}
	};
	
	//Validar que una cadena sea una url
	var url = function(cadena){
		var expreg = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/;
		if( expreg.test(cadena) ){
			estado = true;
			return true;
		}
		return false;
	};
	
	//Validar que un campo de tags tenga el formato deseado
	//Ejemplo: (etiqueta1, etiqueta2, etiqueta3)
	var tags = function(cadena, ne){
		if( cadena.charAt(cadena.length-1) == "," ){
			cadena = cadena.substring(0, cadena.length-1);
		}
		var ts = cadena.split(",");
		if(ts.length>=ne){
			estado = true;
			return true;
		}
		return false;
	};
	
	//Verificar que se haya seleccionado una opción en un elemento select
	var select = function(cadena){
		var indice = cadena.selectedIndex;
		if( indice ){
			estado = true;
			return true
		}
		return false;
	}
	
	//Validar que un campo contenga el numero minimo de palabras deseadas
	var palabras = function(cadena, np){
		if( cadena.charAt(cadena.length-1) == " " ){
			cadena = cadena.substring(0, cadena.length-1);
		}
		var ts = cadena.split(" ");
		if(ts.length>=np){
			estado = true;
			return true;
		}
		return false;
	};
	
	//Agregamos una propiedad data con valor diferente en caso de exito o de error al elemento
	var faddata = function(resultado){
		op.elemento.addEventListener("click", function(){
			op.elemento.setAttribute('data-valid', "");
		}, false);
		if( resultado ){
			op.elemento.setAttribute('data-valid', op.sucdata);
			return true;
		}else{
			op.elemento.setAttribute('data-valid', op.errdata);
			return false;
		}
	};
	
	//Invocamos el metodo requerido
	switch(op.tipo){
		case "largo":
			var validado = largo(op.cadena, op.largo);
			if( typeof(cbf) == "function" ){cbf();}
			return faddata(validado);
			break;
		case "url":
			var validado = url(op.cadena);
			if( typeof(cbf) == "function" ){cbf();}
			return faddata(validado);
			return 
			break;
		case "tags":
			var validado = tags(op.cadena, op.largo);
			if( typeof(cbf) == "function" ){cbf();}
			return faddata(validado);
			break;
		case "select":
			var validado = select(op.elemento);
			if( typeof(cbf) == "function" ){cbf();}
			return faddata(validado);
			break;
		case "palabras":
			var validado = palabras(op.cadena, op.largo);
			if( typeof(cbf) == "function" ){cbf();}
			return faddata(validado);
			break;
		default:
			return false;
			break;
	}
	return false;
};