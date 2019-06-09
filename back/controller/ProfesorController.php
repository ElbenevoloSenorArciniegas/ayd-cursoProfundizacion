<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Un generador de código no basta. Ahora debo inventar también un generador de frases tontas  \\
include_once realpath('../facade/ProfesorFacade.php');


class ProfesorController {

    public static function insert(){
        $cod = strip_tags($_POST['cod']);
        $nombre = strip_tags($_POST['nombre']);
        $cedula = strip_tags($_POST['cedula']);
        $password = strip_tags($_POST['password']);
        $isAdmin = strip_tags($_POST['isAdmin']);
        ProfesorFacade::insert($cod, $nombre, $cedula, $password, $isAdmin);
return true;
    }

    public static function listAll(){
        $list=ProfesorFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Profesor) {	
	       $rta.="{
	    \"cod\":\"{$Profesor->getcod()}\",
	    \"nombre\":\"{$Profesor->getnombre()}\",
	    \"cedula\":\"{$Profesor->getcedula()}\",
	    \"password\":\"{$Profesor->getpassword()}\",
	    \"isAdmin\":\"{$Profesor->getisAdmin()}\"
	       },";
        }

        if($rta!=""){
	       $rta = substr($rta, 0, -1);
	       $msg="{\"msg\":\"exito\"}";
        }else{
	       $msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	       $rta="{\"result\":\"No se encontraron registros.\"}";	
        }
        return "[{$msg},{$rta}]";
    }

}
//That`s all folks!