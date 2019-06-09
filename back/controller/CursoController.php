<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cansado de escribir bugs? tranquilo, los escribimos por ti  \\
include_once realpath('../facade/CursoFacade.php');


class CursoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $nombre = strip_tags($_POST['nombre']);
        CursoFacade::insert($id, $nombre);
return true;
    }

    public static function listAll(){
        $list=CursoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Curso) {	
	       $rta.="{
	    \"id\":\"{$Curso->getid()}\",
	    \"nombre\":\"{$Curso->getnombre()}\"
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