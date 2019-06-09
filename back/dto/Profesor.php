<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Alza el puño y ven! ¡En la hoguera hay de beber!  \\


class Profesor {

  private $cod;
  private $nombre;
  private $cedula;
  private $password;
  private $isAdmin;

    /**
     * Constructor de Profesor
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
     * Devuelve el valor correspondiente a isAdmin
     * @return isAdmin
     */
  public function getIsAdmin(){
      return $this->isAdmin;
  }

    /**
     * Modifica el valor correspondiente a isAdmin
     * @param isAdmin
     */
  public function setIsAdmin($isAdmin){
      $this->isAdmin = $isAdmin;
  }


}
//That`s all folks!