<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    El coronel necesitó setenta y cinco años -los setenta y cinco años de su vida, minuto a minuto- para llegar a ese instante. Se sintió puro, explícito, invencible, en el momento de responder:  \\
include_once realpath('ContenidoController.php');
include_once realpath('CursoController.php');
include_once realpath('EstudianteController.php');
include_once realpath('ModuloController.php');
include_once realpath('ProfesorController.php');

$ruta = strip_tags($_POST['ruta']);
    	$rtn = "";
    	switch ($ruta) {
           case 'ContenidoInsert':
    			$rtn = ContenidoController::insert();
    			break;
    		case 'ContenidoList':
    			$rtn = ContenidoController::listAll();
    			break;
           case 'CursoInsert':
    			$rtn = CursoController::insert();
    			break;
    		case 'CursoList':
    			$rtn = CursoController::listAll();
    			break;
           case 'EstudianteInsert':
    			$rtn = EstudianteController::insert();
    			break;
    		case 'EstudianteList':
    			$rtn = EstudianteController::listAll();
    			break;
           case 'ModuloInsert':
    			$rtn = ModuloController::insert();
    			break;
    		case 'ModuloList':
    			$rtn = ModuloController::listAll();
    			break;
           case 'ProfesorInsert':
    			$rtn = ProfesorController::insert();
    			break;
    		case 'ProfesorList':
    			$rtn = ProfesorController::listAll();
    			break;
        case 'login':
          $rtn = ProfesorController::login();
          break;
    		default:
    			$rtn="404 Ruta no encontrada.";
    			break;
    	}

echo $rtn;

//That`s all folks!