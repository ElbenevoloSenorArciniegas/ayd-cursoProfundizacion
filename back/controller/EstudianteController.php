<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\
include_once realpath('../facade/EstudianteFacade.php');


class EstudianteController {

    public static function insert(){
        $cod = strip_tags($_POST['cod']);
        $nombre = strip_tags($_POST['nombre']);
        $correo = strip_tags($_POST['correo']);
        $cedula = strip_tags($_POST['cedula']);
        $password = strip_tags($_POST['password']);
        $direccion = strip_tags($_POST['direccion']);
        $telefono = strip_tags($_POST['telefono']);
        $promedio = strip_tags($_POST['promedio']);
        $Curso_id = strip_tags($_POST['curso']);
        $curso= new Curso();
        $curso->setId($Curso_id);
        EstudianteFacade::insert($cod, $nombre, $correo, $cedula, $password, $direccion, $telefono, $promedio, $curso);
return true;
    }

    public static function listAll(){
        $list=EstudianteFacade::listAll();
        $rta="";
        foreach ($list as $obj => $Estudiante) {	
	       $rta.="{
	    \"cod\":\"{$Estudiante->getcod()}\",
	    \"cedula\":\"{$Estudiante->getcedula()}\",
        \"nombre\":\"{$Estudiante->getnombre()}\",
	    \"correo\":\"{$Estudiante->getcorreo()}\",
	    \"direccion\":\"{$Estudiante->getdireccion()}\",
	    \"telefono\":\"{$Estudiante->gettelefono()}\",
	    \"promedio\":\"{$Estudiante->getpromedio()}\"},";
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