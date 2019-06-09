<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Quédate con quien te quiera por tu back-end, no por tu front-end  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Estudiante.php');
require_once realpath('../dao/interfaz/IEstudianteDao.php');
require_once realpath('../dto/Curso.php');

class EstudianteFacade {

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
   * Crea un objeto Estudiante a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   * @param nombre
   * @param correo
   * @param cedula
   * @param password
   * @param direccion
   * @param telefono
   * @param promedio
   * @param curso
   */
  public static function insert( $cod,  $nombre,  $correo,  $cedula,  $password,  $direccion,  $telefono,  $promedio,  $curso){
      $estudiante = new Estudiante();
      $estudiante->setCod($cod); 
      $estudiante->setNombre($nombre); 
      $estudiante->setCorreo($correo); 
      $estudiante->setCedula($cedula); 
      $estudiante->setPassword($password); 
      $estudiante->setDireccion($direccion); 
      $estudiante->setTelefono($telefono); 
      $estudiante->setPromedio($promedio); 
      $estudiante->setCurso($curso); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $rtn = $estudianteDao->insert($estudiante);
     $estudianteDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Estudiante de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   * @return El objeto en base de datos o Null
   */
  public static function select($cod){
      $estudiante = new Estudiante();
      $estudiante->setCod($cod); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $result = $estudianteDao->select($estudiante);
     $estudianteDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Estudiante  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   * @param nombre
   * @param correo
   * @param cedula
   * @param password
   * @param direccion
   * @param telefono
   * @param promedio
   * @param curso
   */
  public static function update($cod, $nombre, $correo, $cedula, $password, $direccion, $telefono, $promedio, $curso){
      $estudiante = self::select($cod);
      $estudiante->setNombre($nombre); 
      $estudiante->setCorreo($correo); 
      $estudiante->setCedula($cedula); 
      $estudiante->setPassword($password); 
      $estudiante->setDireccion($direccion); 
      $estudiante->setTelefono($telefono); 
      $estudiante->setPromedio($promedio); 
      $estudiante->setCurso($curso); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $estudianteDao->update($estudiante);
     $estudianteDao->close();
  }

  /**
   * Elimina un objeto Estudiante de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param cod
   */
  public static function delete($cod){
      $estudiante = new Estudiante();
      $estudiante->setCod($cod); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $estudianteDao->delete($estudiante);
     $estudianteDao->close();
  }

  /**
   * Lista todos los objetos Estudiante de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Estudiante en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $estudianteDao =$FactoryDao->getestudianteDao(self::getDataBaseDefault());
     $result = $estudianteDao->listAll();
     $estudianteDao->close();
     return $result;
  }


}
//That`s all folks!