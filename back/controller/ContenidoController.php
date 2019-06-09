<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    404 Frase no encontrada  \\
include_once realpath('../facade/ContenidoFacade.php');


class ContenidoController {

    public static function insert(){
        $id = strip_tags($_POST['id']);
        $titulo = strip_tags($_POST['titulo']);
        $cuerpo = strip_tags($_POST['cuerpo']);
        $Modulo_id = strip_tags($_POST['modulo']);
        $modulo= new Modulo();
        $modulo->setId($Modulo_id);
        ContenidoFacade::insert($id, $titulo, $cuerpo, $modulo);
return true;
    }

    public static function listAll(){
        $list=ContenidoFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Contenido) {	
	       $rta.="{
	    \"id\":\"{$Contenido->getid()}\",
	    \"titulo\":\"{$Contenido->gettitulo()}\",
	    \"cuerpo\":\"{$Contenido->getcuerpo()}\",
	    \"modulo_id\":\"{$Contenido->getmodulo()->getid()}\"
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