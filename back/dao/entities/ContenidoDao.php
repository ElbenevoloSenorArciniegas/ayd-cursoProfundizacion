<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Traigo una pizza para ¿y se la creyó?  \\

include_once realpath('../dao/interfaz/IContenidoDao.php');
include_once realpath('../dto/Contenido.php');
include_once realpath('../dto/Modulo.php');

class ContenidoDao implements IContenidoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Contenido en la base de datos.
     * @param contenido objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($contenido){
      $id=$contenido->getId();
$titulo=$contenido->getTitulo();
$cuerpo=$contenido->getCuerpo();
$modulo=$contenido->getModulo()->getId();

      try {
          $sql= "INSERT INTO `contenido`( `id`, `titulo`, `cuerpo`, `modulo`)"
          ."VALUES ('$id','$titulo','$cuerpo','$modulo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Contenido en la base de datos.
     * @param contenido objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($contenido){
      $id=$contenido->getId();

      try {
          $sql= "SELECT `id`, `titulo`, `cuerpo`, `modulo`"
          ."FROM `contenido`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $contenido->setId($data[$i]['id']);
          $contenido->setTitulo($data[$i]['titulo']);
          $contenido->setCuerpo($data[$i]['cuerpo']);
           $modulo = new Modulo();
           $modulo->setId($data[$i]['modulo']);
           $contenido->setModulo($modulo);

          }
      return $contenido;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Contenido en la base de datos.
     * @param contenido objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($contenido){
      $id=$contenido->getId();
$titulo=$contenido->getTitulo();
$cuerpo=$contenido->getCuerpo();
$modulo=$contenido->getModulo()->getId();

      try {
          $sql= "UPDATE `contenido` SET`id`='$id' ,`titulo`='$titulo' ,`cuerpo`='$cuerpo' ,`modulo`='$modulo' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Contenido en la base de datos.
     * @param contenido objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($contenido){
      $id=$contenido->getId();

      try {
          $sql ="DELETE FROM `contenido` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Contenido en la base de datos.
     * @return ArrayList<Contenido> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `titulo`, `cuerpo`, `modulo`"
          ."FROM `contenido`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $contenido= new Contenido();
          $contenido->setId($data[$i]['id']);
          $contenido->setTitulo($data[$i]['titulo']);
          $contenido->setCuerpo($data[$i]['cuerpo']);
           $modulo = new Modulo();
           $modulo->setId($data[$i]['modulo']);
           $contenido->setModulo($modulo);

          array_push($lista,$contenido);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That`s all folks!