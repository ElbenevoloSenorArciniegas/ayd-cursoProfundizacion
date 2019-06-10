<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Más delgado  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Profesor.php');
require_once realpath('../dao/interfaz/IProfesorDao.php');

class ProfesorFacade {

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
   * Crea un objeto Profesor a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   * @param nombre
   * @param cedula
   * @param password
   * @param isAdmin
   */
  public static function insert( $cod,  $nombre,  $cedula,  $password,  $isAdmin){
      $profesor = new Profesor();
      $profesor->setCod($cod); 
      $profesor->setNombre($nombre); 
      $profesor->setCedula($cedula); 
      $profesor->setPassword($password); 
      $profesor->setIsAdmin($isAdmin); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $profesorDao =$FactoryDao->getprofesorDao(self::getDataBaseDefault());
     $rtn = $profesorDao->insert($profesor);
     $profesorDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Profesor de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   * @return El objeto en base de datos o Null
   */
  public static function select($cod){
      $profesor = new Profesor();
      $profesor->setCod($cod); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $profesorDao =$FactoryDao->getprofesorDao(self::getDataBaseDefault());
     $result = $profesorDao->select($profesor);
     $profesorDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Profesor  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   * @param nombre
   * @param cedula
   * @param password
   * @param isAdmin
   */
  public static function update($cod, $nombre, $cedula, $password, $isAdmin){
      $profesor = self::select($cod);
      $profesor->setNombre($nombre); 
      $profesor->setCedula($cedula); 
      $profesor->setPassword($password); 
      $profesor->setIsAdmin($isAdmin); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $profesorDao =$FactoryDao->getprofesorDao(self::getDataBaseDefault());
     $profesorDao->update($profesor);
     $profesorDao->close();
  }

  /**
   * Elimina un objeto Profesor de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   */
  public static function delete($cod){
      $profesor = new Profesor();
      $profesor->setCod($cod); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $profesorDao =$FactoryDao->getprofesorDao(self::getDataBaseDefault());
     $profesorDao->delete($profesor);
     $profesorDao->close();
  }

  /**
   * Lista todos los objetos Profesor de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Profesor en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $profesorDao =$FactoryDao->getprofesorDao(self::getDataBaseDefault());
     $result = $profesorDao->listAll();
     $profesorDao->close();
     return $result;
  }

  public static function login($usuario,$documento,$password){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $profesorDao =$FactoryDao->getprofesorDao(self::getDataBaseDefault());
     $result = $profesorDao->login($usuario,$documento,$password);
     $profesorDao->close();
     return $result;
  }


}
//That`s all folks!