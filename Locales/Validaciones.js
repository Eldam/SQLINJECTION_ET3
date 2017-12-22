//Creador m3xep6 
//Fecha: 03/10/17
//Este archivo contiene las validaciones necesarias para validar los formularios

	//comprueba si un campo esta vacio
  	function comprobarVacio(campo){
  		//ve si es nulo o su longitud es 0
  		if ((campo.value == null) || (campo.value.length == 0)){
  			alert('El atributo ' + campo.name + ' no puede ser vacio');
  			campo.focus();	
  			return false;
  		}
  		else{
  			return true;
  		}
  	} 
  	//comprueba que los campos de los formularios esten cubiertos
  	function comprobarFormsVacios(form){
	    var i;//iterador
	    for (i = 0; i < form.length; i++) {//itera por todos los campos del form
	    	//llama a comprobar vacio para ver si tiene datos.
	           if(!comprobarVacio(form[i])){
	            return false;
	        }
	    }
	    return true;
	}


	//comprueba que los campos de los formularios esten cubiertos
	function comprobarFormVaciosWithoutButton(form){
		var i;//iterador
		for (i = 0; i < form.length -1; i++) {//itera por todos los campos del form
			//llama a comprobar vacio para ver si tiene datos.
			if(!comprobarVacio(form[i])){
				return false;
			}
		}
		return true;
	}



	function comprobarTexto(campo,size) {
		//comprueba si el texto introducido ocupa menos que el tamaño maximo
		if (campo.value.length>size) {
			//si es mayor salta un aviso
    		alert('Longitud incorrecta. El atributo ' + campo.name + 
    			'debe ser maximo ' + size + ' y es ' + campo.value.length);
        	campo.focus();
    		return false;
  		}
  		return true;
  	}

	function comprobarAlfabetico(campo,size){
		//Comprueba que el campo introducido es mayor que el tamaño maximo
			if (campo.value.length>size) {
				//si es mayor salta un aviso
	    		alert('Longitud incorrecta. El atributo ' + campo.name + 
	    			'debe ser maximo ' + size + ' y es ' + campo.value.length);
	        	campo.focus();
	    		return false;
	  		}
	  		if(!/^\D+$/.test(campo.value)){
	  			//si los datos no son letras saltara un aviso
	  			alert('Datos incorrectos. Introducir solo caracteres Alfabeticos.');
	  			campo.focus();
	  			return false;
	  		}
	  		return true;
	}
	function comprobarEntero(campo, valormenor, valormayor){
		/*comprueba si el numero es entero y entra dentro del maximo y minimo*/
		if(!Number(campo.value) || valormenor > campo.value || valormayor < campo.value) {
			alert("Numeros validos entre:" + valormenor + " y " + valormayor);
			return false;
		}
			return true;



	}
	function comprobarReal(campo, numeroDecimales, valormenor, valormayor){
		/*comprueba si el numero es real para ello comprueba si es un numero, si
		si tiene el numero de decimales acordado y si entra entre el valor minimo y maximo
		*/
		if (!number(campo.value) || campo.value.toPrecision(numeroDecimales) != 
				campo.value || campo.value < valormenor || campo.value > valormayor || 
				campo.value !=campo.value.toPrecision(0)){
			alert("El campo solo admite numeros reales con " + 
				numeroDecimales + " de decimales." )
			return false;
		}
		return true;
	}

//menu desplegable
	function menuDesplegable(){
		$(document).ready(function(){//cuando el documento este listo llama a function
			$('.menujq > ul > li:has(ul)').addClass('desplegable');//añade la clase desplegable
			$('.menujq > ul > li > a').click(function() {//cuando se clicka en una lista se llama a la function
					var comprobar = $(this).next();
				$('.menujq li').removeClass('activa');
				$(this).closest('li').addClass('activa');
				//comprueba si la lista es visible y la despliega
				if((comprobar.is('ul')) && (comprobar.is(':visible'))) {
					$(this).closest('li').removeClass('activa');
					comprobar.slideUp('normal');
				}
				//comprueba si la lista esta no visible y la contrae
				if((comprobar.is('ul')) && (!comprobar.is(':visible'))) {
					$('.menujq ul ul:visible').slideUp('normal');
					comprobar.slideDown('normal');
				}
			});
		});
	}




	function comprobarTelf(campo){
		//comprueba que el telefono empieze por +34 y 9 digitos
		if (!/^(\+34)?[0-9]{9}$/.test(campo.value)){
			alert("Numero no valido");
			return false;
		}
		return true;
	}


	function comprobarDni(campo){	
		var numero;//guardara el modulo del numero del dni
		var char;//guardara la letra del dni
		var letra;//guardara las posibles letras
		var expresion_regular_dni;//la expresion regular con la que se va a comparar el formato del dni
		var dni = campo.value;//variable introducida en el campo
	 
		expresion_regular_dni = /^\d{8}[a-zA-Z]$/;

		if(expresion_regular_dni.test (dni) == true){//comprueba si el campo introducido coincide con la expresion regular
			numero = dni.substr(0,dni.length-1);
			char = dni.substr(dni.length-1,1);
			numero = numero % 23;
			letra='TRWAGMYFPDXBNJZSQVHLCKET';
			letra=letra.substring(numero,numero+1);

			if (letra!=char.toUpperCase()) {//comprueba si la letra del dni corresponde con los numeros introducidos
				alert('Dni erroneo, la letra del NIF no se corresponde');
				//la letra no corresponde con el modulo
				campo.focus();
				return false;
			}else{
				return true;
			}
		}else{
			alert('Dni erroneo, formato no válido');//alerta de dni erroneo
			campo.focus();
			return false;
		}
	}

	function comprobarEmail(campo,length){
    //comprueba un email valido
    if(!/[A-Za-z0-9]+@([a-z]+.)+[a-z]+/.test(campo.value)){//comprueba si la expresion regular coincide en el campo
        alert("Email no valido!");//alerta si no contiene los elementos requeridos
        campo.focus();
        return false;
    }
    return comprobarTexto(campo,length);
	}

	function comprobarNoVacio(form){
    var i;//iterador
    for (i = 0; i < form.length -1; i++) {//itera atraves del form
           if(form[i].value.length> 0){ //comprueba si el campo contiene algun elemento
            return true;
        }
    }

    alert('Rellene algun campo para buscar.');//si no tiene manda un aviso.
    return false;
	}


//rellenar campos de modificar tabla. 
	/*function rellenarModify(selectData){        
	    var i;//iterador
	    for (i = 0; i < document.forms["ModifyForm"].length-1; i++) {//rellena los campos del form edit
	           document.forms["ModifyForm"][i].value = selectData[i];
	    }
	}*/


//funcion que se ejecuta al cargar el DOM
	window.addEventListener("DOMContentLoaded", function() {
		//rellena los campos de modificar tabla
	       rellenar();
	    //carga elmenu desplegable
	       menuDesplegable();
	    }, false);

	function rellenar(){
	    selectData = ["User","","10/16/2017","IU1","user@email.com","UserName","UserSurname",2,"userTitulation"];
	    rellenarModify(selectData);
	}

//confirmacion de borrado de tabla
	function seguroBorrar(){
		//si es si la tabla se borra si no mensaje de cancelado.
		if(confirm('¿Estas seguro?')){
			alert("Tabla Borrada.")
		}else{
			alert("No se ha borrado la tabla");
		}

	}