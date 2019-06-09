<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vva 'l doro  \\

include_once realpath('../dao/conexion/Conexion.php');
include_once realpath('../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de ContenidoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ContenidoDao
     */
     public function getContenidoDao($dbName){
        return new ContenidoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de CursoDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de CursoDao
     */
     public function getCursoDao($dbName){
        return new CursoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de EstudianteDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de EstudianteDao
     */
     public function getEstudianteDao($dbName){
        return new EstudianteDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ModuloDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ModuloDao
     */
     public function getModuloDao($dbName){
        return new ModuloDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ProfesorDao con una conexiÃ³n que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ProfesorDao
     */
     public function getProfesorDao($dbName){
        return new ProfesorDao($this->conn->obtener($dbName));
    }

}
//That`s all folks!