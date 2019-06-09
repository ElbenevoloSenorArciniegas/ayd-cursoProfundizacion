<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Y pensar que Anarchy está hecho en código espagueti...  \\

include_once realpath('../dao/entities/ContenidoDao.php');
include_once realpath('../dao/entities/CursoDao.php');
include_once realpath('../dao/entities/EstudianteDao.php');
include_once realpath('../dao/entities/ModuloDao.php');
include_once realpath('../dao/entities/ProfesorDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de ContenidoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ContenidoDao
     */
     public function getContenidoDao($dbName);
     /**
     * Devuelve una instancia de CursoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CursoDao
     */
     public function getCursoDao($dbName);
     /**
     * Devuelve una instancia de EstudianteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstudianteDao
     */
     public function getEstudianteDao($dbName);
     /**
     * Devuelve una instancia de ModuloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ModuloDao
     */
     public function getModuloDao($dbName);
     /**
     * Devuelve una instancia de ProfesorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProfesorDao
     */
     public function getProfesorDao($dbName);

}
//That`s all folks!