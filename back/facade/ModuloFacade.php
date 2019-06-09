<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si crees que las mujeres son difíciles, no conoces Anarchy  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Modulo.php');
require_once realpath('../dao/interfaz/IModuloDao.php');
require_once realpath('../dto/Curso.php');
require_once realpath('../dto/Profesor.php');

class ModuloFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Modulo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param descripcion
   * @param calificacion
   * @param curso
   * @param profesor
   */
  public static function insert( $id,  $nombre,  $descripcion,  $calificacion,  $curso,  $profesor){
      $modulo = new Modulo();
      $modulo->setId($id); 
      $modulo->setNombre($nombre); 
      $modulo->setDescripcion($descripcion); 
      $modulo->setCalificacion($calificacion); 
      $modulo->setCurso($curso); 
      $modulo->setProfesor($profesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $moduloDao =$FactoryDao->getmoduloDao(self::getDataBaseDefault());
     $rtn = $moduloDao->insert($modulo);
     $moduloDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Modulo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $modulo = new Modulo();
      $modulo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $moduloDao =$FactoryDao->getmoduloDao(self::getDataBaseDefault());
     $result = $moduloDao->select($modulo);
     $moduloDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Modulo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param descripcion
   * @param calificacion
   * @param curso
   * @param profesor
   */
  public static function update($id, $nombre, $descripcion, $calificacion, $curso, $profesor){
      $modulo = self::select($id);
      $modulo->setNombre($nombre); 
      $modulo->setDescripcion($descripcion); 
      $modulo->setCalificacion($calificacion); 
      $modulo->setCurso($curso); 
      $modulo->setProfesor($profesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $moduloDao =$FactoryDao->getmoduloDao(self::getDataBaseDefault());
     $moduloDao->update($modulo);
     $moduloDao->close();
  }

  /**
   * Elimina un objeto Modulo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $modulo = new Modulo();
      $modulo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $moduloDao =$FactoryDao->getmoduloDao(self::getDataBaseDefault());
     $moduloDao->delete($modulo);
     $moduloDao->close();
  }

  /**
   * Lista todos los objetos Modulo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Modulo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $moduloDao =$FactoryDao->getmoduloDao(self::getDataBaseDefault());
     $result = $moduloDao->listAll();
     $moduloDao->close();
     return $result;
  }


}
//That`s all folks!