<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Caminante no hay camino, se hace camino al andar  \\

include_once realpath('../dao/interfaz/IEstudianteDao.php');
include_once realpath('../dto/Estudiante.php');
include_once realpath('../dto/Curso.php');

class EstudianteDao implements IEstudianteDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Estudiante en la base de datos.
     * @param estudiante objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($estudiante){
      $cod=$estudiante->getCod();
$nombre=$estudiante->getNombre();
$correo=$estudiante->getCorreo();
$cedula=$estudiante->getCedula();
$password=$estudiante->getPassword();
$direccion=$estudiante->getDireccion();
$telefono=$estudiante->getTelefono();
$promedio=$estudiante->getPromedio();
$curso=$estudiante->getCurso()->getId();

      try {
          $sql= "INSERT INTO `estudiante`( `cod`, `nombre`, `correo`, `cedula`, `password`, `direccion`, `telefono`, `promedio`, `curso`)"
          ."VALUES ('$cod','$nombre','$correo','$cedula','$password','$direccion','$telefono','$promedio','$curso')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($estudiante){
      $cod=$estudiante->getCod();

      try {
          $sql= "SELECT `cod`, `nombre`, `correo`, `cedula`, `password`, `direccion`, `telefono`, `promedio`, `curso`"
          ."FROM `estudiante`"
          ."WHERE `cod`='$cod'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $estudiante->setCod($data[$i]['cod']);
          $estudiante->setNombre($data[$i]['nombre']);
          $estudiante->setCorreo($data[$i]['correo']);
          $estudiante->setCedula($data[$i]['cedula']);
          $estudiante->setPassword($data[$i]['password']);
          $estudiante->setDireccion($data[$i]['direccion']);
          $estudiante->setTelefono($data[$i]['telefono']);
          $estudiante->setPromedio($data[$i]['promedio']);
           $curso = new Curso();
           $curso->setId($data[$i]['curso']);
           $estudiante->setCurso($curso);

          }
      return $estudiante;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($estudiante){
      $cod=$estudiante->getCod();
$nombre=$estudiante->getNombre();
$correo=$estudiante->getCorreo();
$cedula=$estudiante->getCedula();
$password=$estudiante->getPassword();
$direccion=$estudiante->getDireccion();
$telefono=$estudiante->getTelefono();
$promedio=$estudiante->getPromedio();
$curso=$estudiante->getCurso()->getId();

      try {
          $sql= "UPDATE `estudiante` SET`cod`='$cod' ,`nombre`='$nombre' ,`correo`='$correo' ,`cedula`='$cedula' ,`password`='$password' ,`direccion`='$direccion' ,`telefono`='$telefono' ,`promedio`='$promedio' ,`curso`='$curso' WHERE `cod`='$cod' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Estudiante en la base de datos.
     * @param estudiante objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($estudiante){
      $cod=$estudiante->getCod();

      try {
          $sql ="DELETE FROM `estudiante` WHERE `cod`='$cod'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Estudiante en la base de datos.
     * @return ArrayList<Estudiante> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `cod`, `nombre`, `correo`, `cedula`, `password`, `direccion`, `telefono`, `promedio`, `curso`"
          ."FROM `estudiante`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $estudiante= new Estudiante();
          $estudiante->setCod($data[$i]['cod']);
          $estudiante->setNombre($data[$i]['nombre']);
          $estudiante->setCorreo($data[$i]['correo']);
          $estudiante->setCedula($data[$i]['cedula']);
          $estudiante->setPassword($data[$i]['password']);
          $estudiante->setDireccion($data[$i]['direccion']);
          $estudiante->setTelefono($data[$i]['telefono']);
          $estudiante->setPromedio($data[$i]['promedio']);
           $curso = new Curso();
           $curso->setId($data[$i]['curso']);
           $estudiante->setCurso($curso);

          array_push($lista,$estudiante);
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