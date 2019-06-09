<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Podrías agradecernos con unos cuantos billetes _/(n.n)\_  \\


class Modulo {

  private $id;
  private $nombre;
  private $descripcion;
  private $calificacion;
  private $curso;
  private $profesor;

    /**
     * Constructor de Modulo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
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
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
  }
    /**
     * Devuelve el valor correspondiente a calificacion
     * @return calificacion
     */
  public function getCalificacion(){
      return $this->calificacion;
  }

    /**
     * Modifica el valor correspondiente a calificacion
     * @param calificacion
     */
  public function setCalificacion($calificacion){
      $this->calificacion = $calificacion;
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
    /**
     * Devuelve el valor correspondiente a profesor
     * @return profesor
     */
  public function getProfesor(){
      return $this->profesor;
  }

    /**
     * Modifica el valor correspondiente a profesor
     * @param profesor
     */
  public function setProfesor($profesor){
      $this->profesor = $profesor;
  }


}
//That`s all folks!