function validarForm(){
  // alert("Validando");
	var verificar = true;
	var expRegLetras = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
	var expRegEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2-4}$/;

	var formulario = document.getElementById("formLlantaAlta");
	var numero 		 = document.getElementById("numero");
	var rin 	     = document.getElementById("rin");
	var marca 		 = document.getElementById("marca");
	var modelo  	 = document.getElementById("modelo");
	var almacen1 	 = document.getElementById("almacen1");
	var almacen2 	 = document.getElementById("almacen2");
	var almacen3 	 = document.getElementById("almacen3");
	var almacen4 	 = document.getElementById("almacen4");

	if (!numero.value) {

      alert("El campo Numero es requerido.");
      numero.focus();
      verificar = false;
     
    } else if (!rin.value){
     
      alert("El campo Rin es requerido.");
      rin.focus();
      verificar = false;
      
    } else if (rin.value < 13){
      
      alert("El tamaño del rin debe ser minimo 13.");
      rin.focus();
      verificar = false;
    }
    
    else if (!marca.value){
     
      alert("El campo Marca es requerido.");
      marca.focus();
      verificar = false;
      
    } else if(!expRegLetras.exec(marca.value)){
      
      alert("El campo Marca solo acepta letras.");
      marca.focus();
      verificar = false;
    
    } else if (!modelo.value){ 
      
      alert("El campo Modelo es requerido.");
      modelo.focus();
      verificar = false;
      
    } else if(!expRegLetras.exec(modelo.value)){
      
      alert("El campo Modelo solo acepta letras.");
      modelo.focus();
      verificar = false;
    }
  
    if (verificar == true){
      alert("El formulario ha sido enviado");
    }
  
}

function limpiarForm(){
  alert("Limpiando");
  document.formLlantaAlta.reset();
   
}

window.onload = function(){
  var botonEnviar, botonLimpiar;
  botonLimpiar = document.getElementById("limpiar");
  botonLimpiar.onclick = limpiarForm;
  botonEnviar = document.formLlantaAlta.enviar_btn;
  botonEnviar.onclick = validarForm;  
}