<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando uses Anarchy, Georgie, tú también flotarás  \\

require_once realpath('../facade/GlobalController.php');
require_once realpath('../dao/interfaz/IFactoryDao.php');
require_once realpath('../dto/Contenido.php');
require_once realpath('../dao/interfaz/IContenidoDao.php');
require_once realpath('../dto/Modulo.php');

class ContenidoFacade {

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
   * Crea un objeto Contenido a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param titulo
   * @param cuerpo
   * @param modulo
   */
  public static function insert( $id,  $titulo,  $cuerpo,  $modulo){
      $contenido = new Contenido();
      $contenido->setId($id); 
      $contenido->setTitulo($titulo); 
      $contenido->setCuerpo($cuerpo); 
      $contenido->setModulo($modulo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $contenidoDao =$FactoryDao->getcontenidoDao(self::getDataBaseDefault());
     $rtn = $contenidoDao->insert($contenido);
     $contenidoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Contenido de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $contenido = new Contenido();
      $contenido->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $contenidoDao =$FactoryDao->getcontenidoDao(self::getDataBaseDefault());
     $result = $contenidoDao->select($contenido);
     $contenidoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Contenido  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param titulo
   * @param cuerpo
   * @param modulo
   */
  public static function update($id, $titulo, $cuerpo, $modulo){
      $contenido = self::select($id);
      $contenido->setTitulo($titulo); 
      $contenido->setCuerpo($cuerpo); 
      $contenido->setModulo($modulo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $contenidoDao =$FactoryDao->getcontenidoDao(self::getDataBaseDefault());
     $contenidoDao->update($contenido);
     $contenidoDao->close();
  }

  /**
   * Elimina un objeto Contenido de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $contenido = new Contenido();
      $contenido->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $contenidoDao =$FactoryDao->getcontenidoDao(self::getDataBaseDefault());
     $contenidoDao->delete($contenido);
     $contenidoDao->close();
  }

  /**
   * Lista todos los objetos Contenido de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Contenido en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $contenidoDao =$FactoryDao->getcontenidoDao(self::getDataBaseDefault());
     $result = $contenidoDao->listAll();
     $contenidoDao->close();
     return $result;
  }


}
//That`s all folks!