<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    They call me Mr. Espagueti  \\

include_once realpath('../dao/interfaz/IModuloDao.php');
include_once realpath('../dto/Modulo.php');
include_once realpath('../dto/Curso.php');
include_once realpath('../dto/Profesor.php');

class ModuloDao implements IModuloDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Modulo en la base de datos.
     * @param modulo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($modulo){
$nombre=$modulo->getNombre();
$profesor=$modulo->getProfesor()->getCod();

      try {
          $sql= "INSERT INTO `modulo`( `nombre`, `profesor`)"
          ."VALUES ('$nombre','$profesor')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Modulo en la base de datos.
     * @param modulo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($modulo){
      $id=$modulo->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `descripcion`, `calificacion`, `curso`, `profesor`"
          ."FROM `modulo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $modulo->setId($data[$i]['id']);
          $modulo->setNombre($data[$i]['nombre']);
          $modulo->setDescripcion($data[$i]['descripcion']);
          $modulo->setCalificacion($data[$i]['calificacion']);
           $curso = new Curso();
           $curso->setId($data[$i]['curso']);
           $modulo->setCurso($curso);
           $profesor = new Profesor();
           $profesor->setCod($data[$i]['profesor']);
           $modulo->setProfesor($profesor);

          }
      return $modulo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Modulo en la base de datos.
     * @param modulo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($modulo){
      $id=$modulo->getId();
$nombre=$modulo->getNombre();
$descripcion=$modulo->getDescripcion();
$calificacion=$modulo->getCalificacion();
$curso=$modulo->getCurso()->getId();
$profesor=$modulo->getProfesor()->getCod();

      try {
          $sql= "UPDATE `modulo` SET`id`='$id' ,`nombre`='$nombre' ,`descripcion`='$descripcion' ,`calificacion`='$calificacion' ,`curso`='$curso' ,`profesor`='$profesor' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Modulo en la base de datos.
     * @param modulo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($modulo){
      $id=$modulo->getId();

      try {
          $sql ="DELETE FROM `modulo` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Modulo en la base de datos.
     * @return ArrayList<Modulo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT m.`nombre`, p.`nombre` as \"profesor\""
          ."FROM `modulo` m INNER JOIN `profesor` p ON m.`profesor` = p.`cod`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $modulo= new Modulo();
          $modulo->setNombre($data[$i]['nombre']);
           $profesor = new Profesor();
           $profesor->setNombre($data[$i]['profesor']);
           $modulo->setProfesor($profesor);

          array_push($lista,$modulo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

public function listBy($cod){
      $lista = array();
      try {
          $sql ="SELECT DISTINCT m.`nombre`, p.`nombre` as \"profesor\""
          ."FROM `modulo` m INNER JOIN `profesor` p ON m.`profesor` = p.`cod` "
          ."INNER JOIN `estudiante` e ON m.`curso` = e.`curso` "
          ."WHERE m.`profesor`=$cod OR e.`cod`=$cod";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $modulo= new Modulo();
          $modulo->setNombre($data[$i]['nombre']);
           $profesor = new Profesor();
           $profesor->setNombre($data[$i]['profesor']);
           $modulo->setProfesor($profesor);

          array_push($lista,$modulo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function listAll_original(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `descripcion`, `calificacion`, `curso`, `profesor`"
          ."FROM `modulo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $modulo= new Modulo();
          $modulo->setId($data[$i]['id']);
          $modulo->setNombre($data[$i]['nombre']);
          $modulo->setDescripcion($data[$i]['descripcion']);
          $modulo->setCalificacion($data[$i]['calificacion']);
           $curso = new Curso();
           $curso->setId($data[$i]['curso']);
           $modulo->setCurso($curso);
           $profesor = new Profesor();
           $profesor->setCod($data[$i]['profesor']);
           $modulo->setProfesor($profesor);

          array_push($lista,$modulo);
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