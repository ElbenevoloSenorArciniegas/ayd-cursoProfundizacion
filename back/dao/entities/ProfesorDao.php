<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Mátalos a todos, y que dios elija  \\

include_once realpath('../dao/interfaz/IProfesorDao.php');
include_once realpath('../dto/Profesor.php');

class ProfesorDao implements IProfesorDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Profesor en la base de datos.
     * @param profesor objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($profesor){
      $cod=$profesor->getCod();
$nombre=$profesor->getNombre();
$cedula=$profesor->getCedula();
$password=$profesor->getPassword();
$isAdmin=$profesor->getIsAdmin();

      try {
          $sql= "INSERT INTO `profesor`( `cod`, `nombre`, `cedula`, `password`, `isAdmin`)"
          ."VALUES ('$cod','$nombre','$cedula','$password','$isAdmin')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Profesor en la base de datos.
     * @param profesor objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($profesor){
      $cod=$profesor->getCod();

      try {
          $sql= "SELECT `cod`, `nombre`, `cedula`, `password`, `isAdmin`"
          ."FROM `profesor`"
          ."WHERE `cod`='$cod'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $profesor->setCod($data[$i]['cod']);
          $profesor->setNombre($data[$i]['nombre']);
          $profesor->setCedula($data[$i]['cedula']);
          $profesor->setPassword($data[$i]['password']);
          $profesor->setIsAdmin($data[$i]['isAdmin']);

          }
      return $profesor;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Profesor en la base de datos.
     * @param profesor objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($profesor){
      $cod=$profesor->getCod();
$nombre=$profesor->getNombre();
$cedula=$profesor->getCedula();
$password=$profesor->getPassword();
$isAdmin=$profesor->getIsAdmin();

      try {
          $sql= "UPDATE `profesor` SET`cod`='$cod' ,`nombre`='$nombre' ,`cedula`='$cedula' ,`password`='$password' ,`isAdmin`='$isAdmin' WHERE `cod`='$cod' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Profesor en la base de datos.
     * @param profesor objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($profesor){
      $cod=$profesor->getCod();

      try {
          $sql ="DELETE FROM `profesor` WHERE `cod`='$cod'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Profesor en la base de datos.
     * @return ArrayList<Profesor> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `cod`, `nombre`, `cedula`, `password`, `isAdmin`"
          ."FROM `profesor`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $profesor= new Profesor();
          $profesor->setCod($data[$i]['cod']);
          $profesor->setNombre($data[$i]['nombre']);
          $profesor->setCedula($data[$i]['cedula']);
          $profesor->setPassword($data[$i]['password']);
          $profesor->setIsAdmin($data[$i]['isAdmin']);

          array_push($lista,$profesor);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

   public function login($usuario,$documento,$password){
      $lista = array();

      $sql_1 = "SELECT * FROM `estudiante` WHERE `cod` = '$usuario' AND `cedula` = '$documento' AND `password` = '$password'";
      $sql_2 = "SELECT * FROM `profesor` WHERE `cod` = '$usuario' AND `cedula` = '$documento' AND `password` = '$password'";

      try {
          $data = $this->ejecutarConsulta($sql_1);
          if(empty($data)){
            $data = $this->ejecutarConsulta($sql_2);
            if(empty($data)){
              return array('msg' => 'false');
            }else{
              $rol="profesor";
              if($data[0]['isAdmin']){
                $rol="admin";
              }
              return array('msg' => 'true',
                'obj'=>array('cod'=>$data[0]['cod'],'nombre'=>$data[0]['nombre'],'cedula'=>$data[0]['cedula'],'tipo'=>$rol));
            }
          }else{
            $rol="estudiante";
            return array('msg' => 'true',
                  'obj'=>array('cod'=>$data[0]['cod'],'nombre'=>$data[0]['nombre'],'cedula'=>$data[0]['cedula'],'tipo'=>$rol)
              );
          }
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