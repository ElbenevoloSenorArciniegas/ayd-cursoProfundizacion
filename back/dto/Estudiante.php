<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Me han encontrado! ¡No sé cómo pero me han encontrado!  \\


class Estudiante {

  private $cod;
  private $nombre;
  private $correo;
  private $cedula;
  private $password;
  private $direccion;
  private $telefono;
  private $promedio;
  private $curso;

    /**
     * Constructor de Estudiante
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a cod
     * @return cod
     */
  public function getCod(){
      return $this->cod;
  }

    /**
     * Modifica el valor correspondiente a cod
     * @param cod
     */
  public function setCod($cod){
      $this->cod = $cod;
  }
    /**
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
  }
    /**
     * Devuelve el valor correspondiente a correo
     * @return correo
     */
  public function getCorreo(){
      return $this->correo;
  }

    /**
     * Modifica el valor correspondiente a correo
     * @param correo
     */
  public function setCorreo($correo){
      $this->correo = $correo;
  }
    /**
     * Devuelve el valor correspondiente a cedula
     * @return cedula
     */
  public function getCedula(){
      return $this->cedula;
  }

    /**
     * Modifica el valor correspondiente a cedula
     * @param cedula
     */
  public function setCedula($cedula){
      $this->cedula = $cedula;
  }
    /**
     * Devuelve el valor correspondiente a password
     * @return password
     */
  public function getPassword(){
      return $this->password;
  }

    /**
     * Modifica el valor correspondiente a password
     * @param password
     */
  public function setPassword($password){
      $this->password = $password;
  }
    /**
     * Devuelve el valor correspondiente a direccion
     * @return direccion
     */
  public function getDireccion(){
      return $this->direccion;
  }

    /**
     * Modifica el valor correspondiente a direccion
     * @param direccion
     */
  public function setDireccion($direccion){
      $this->direccion = $direccion;
  }
    /**
     * Devuelve el valor correspondiente a telefono
     * @return telefono
     */
  public function getTelefono(){
      return $this->telefono;
  }

    /**
     * Modifica el valor correspondiente a telefono
     * @param telefono
     */
  public function setTelefono($telefono){
      $this->telefono = $telefono;
  }
    /**
     * Devuelve el valor correspondiente a promedio
     * @return promedio
     */
  public function getPromedio(){
      return $this->promedio;
  }

    /**
     * Modifica el valor correspondiente a promedio
     * @param promedio
     */
  public function setPromedio($promedio){
      $this->promedio = $promedio;
  }
    /**
     * Devuelve el valor correspondiente a curso
     * @return curso
     */
  public function getCurso(){
      return $this->curso;
  }

    /**
     * Modifica el valor correspondiente a curso
     * @param curso
     */
  public function setCurso($curso){
      $this->curso = $curso;
  }


}
//That`s all folks!