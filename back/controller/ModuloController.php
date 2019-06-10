<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Únicamente cuando se pierde todo somos libres para actuar.  \\
include_once realpath('../facade/ModuloFacade.php');


class ModuloController {

    public static function insert(){
        $nombre = strip_tags($_POST['nombre']);
        $Profesor_cod = strip_tags($_POST['profesor']);
        $profesor= new Profesor();
        $profesor->setCod($Profesor_cod);
        ModuloFacade::insert($nombre,$profesor);
return "true";
    }

    public static function listAll(){
        $list=ModuloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Modulo) {	
	       $rta.="{
	    \"nombre\":\"{$Modulo->getnombre()}\",
	    \"profesor\":\"{$Modulo->getprofesor()->getnombre()}\"
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

    public static function listAll_original(){
        $list=ModuloFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Modulo) {    
           $rta.="{
        \"id\":\"{$Modulo->getid()}\",
        \"nombre\":\"{$Modulo->getnombre()}\",
        \"descripcion\":\"{$Modulo->getdescripcion()}\",
        \"calificacion\":\"{$Modulo->getcalificacion()}\",
        \"curso_id\":\"{$Modulo->getcurso()->getid()}\",
        \"profesor_cod\":\"{$Modulo->getprofesor()->getcod()}\"
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