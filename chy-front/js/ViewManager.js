/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No se fije en el corte de cabello, soy mucho muy rico  \\

var rutaBack = '../back/controller/Router.php';

/** Valida los campos requeridos en un formulario
 * Returns flag Devuelve true si el form cuenta con los datos mÃ­nimos requeridos
 */
function validarForm(idForm){
	var form=$('#'+idForm)[0];
	for (var i = 0; i < form.length; i++) {
		var input = form[i];
		if(input.required && input.value==""){
			return false;
		}
	}
	return true;
}

////////// CONTENIDO \\\\\\\\\\
function preContenidoInsert(idForm){
     //Haga aquÃ­ las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
     formData["ruta"]="ContenidoInsert";
 	enviar(formData, rutaBack ,postContenidoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postContenidoInsert(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     //Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Contenido registrado con Ã©xito");
                     }else{
                        alert("Hubo un errror en la inserciÃ³n ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preContenidoList(container){
     //Solicite informaciÃ³n del servidor
     cargaContenido(container,'ContenidoList.html'); 
     var formData = {};
     formData["ruta"]="ContenidoList";
 	enviar(formData, rutaBack ,postContenidoList); 
}

 function postContenidoList(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Contenido = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("ContenidoList").appendChild(createTR(Contenido));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// CURSO \\\\\\\\\\
function preCursoInsert(idForm){
     //Haga aquÃ­ las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
     formData["ruta"]="CursoInsert";
 	enviar(formData, rutaBack ,postCursoInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postCursoInsert(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     //Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Curso registrado con Ã©xito");
                     }else{
                        alert("Hubo un errror en la inserciÃ³n ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preCursoList(container){
     //Solicite informaciÃ³n del servidor
     cargaContenido(container,'CursoList.html'); 
     var formData = {};
     formData["ruta"]="CursoList";
 	enviar(formData, rutaBack ,postCursoList); 
}

 function postCursoList(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Curso = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("CursoList").appendChild(createTR(Curso));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// ESTUDIANTE \\\\\\\\\\
function preEstudianteInsert(idForm){
     //Haga aquÃ­ las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
     formData["ruta"]="EstudianteInsert";
 	enviar(formData, rutaBack ,postEstudianteInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postEstudianteInsert(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     //Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Estudiante registrado con Ã©xito");
                     }else{
                        alert("Hubo un errror en la inserciÃ³n ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preEstudianteList(container){
     //Solicite informaciÃ³n del servidor
     cargaContenido(container,'EstudianteList.html'); 
     var formData = {};
     formData["ruta"]="EstudianteList";
 	enviar(formData, rutaBack ,postEstudianteList); 
}

 function postEstudianteList(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Estudiante = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("EstudianteList").appendChild(createTR(Estudiante));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// MODULO \\\\\\\\\\
function preModuloInsert(idForm){
     //Haga aquÃ­ las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
     formData["ruta"]="ModuloInsert";
 	enviar(formData, rutaBack ,postModuloInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postModuloInsert(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     //Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Modulo registrado con Ã©xito");
                     }else{
                        alert("Hubo un errror en la inserciÃ³n ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preModuloList(container){
     //Solicite informaciÃ³n del servidor
     cargaContenido(container,'ModuloList.html'); 
     var formData = {};
     formData["ruta"]="ModuloList";
 	enviar(formData, rutaBack ,postModuloList); 
}

 function postModuloList(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Modulo = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("ModuloList").appendChild(createTR(Modulo));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

////////// PROFESOR \\\\\\\\\\
function preProfesorInsert(idForm){
     //Haga aquÃ­ las validaciones necesarias antes de enviar el formulario.
	if(validarForm(idForm)){
 	var formData=$('#'+idForm).serialize();
     formData["ruta"]="ProfesorInsert";
 	enviar(formData, rutaBack ,postProfesorInsert);
 	}else{
 		alert("Debe llenar los campos requeridos");
 	}
}

 function postProfesorInsert(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     //Consideramos buena prÃ¡ctica no manejar cÃ³digo HTML antes de este punto.
 		if(state=="success"){
                     if(result=="true"){            
 			alert("Profesor registrado con Ã©xito");
                     }else{
                        alert("Hubo un errror en la inserciÃ³n ( u.u)\n"+result);
                     } 		}else{
 			alert("Hubo un errror interno ( u.u)\n"+result);
 		}
}

function preProfesorList(container){
     //Solicite informaciÃ³n del servidor
     cargaContenido(container,'ProfesorList.html'); 
     var formData = {};
     formData["ruta"]="ProfesorList";
 	enviar(formData, rutaBack ,postProfesorList); 
}

 function postProfesorList(result,state){
     //Maneje aquÃ­ la respuesta del servidor.
     if(state=="success"){
         var json=JSON.parse(result);
         if(json[0].msg=="exito"){

            for(var i=1; i < Object.keys(json).length; i++) {   
                var Profesor = json[i];
                //----------------- Para una tabla -----------------------
                document.getElementById("ProfesorList").appendChild(createTR(Profesor));
                //-------- Para otras opciones ver htmlBuilder.js ---------
            }
         }else{
            alert(json[0].msg);
         }
     }else{
         alert("Hubo un errror interno ( u.u)\n"+result);
     }
}

//That`s all folks!