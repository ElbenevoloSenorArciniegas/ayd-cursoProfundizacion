<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Si crees que las mujeres son difíciles, no conoces Anarchy  \\


class Contenido {

  private $id;
  private $titulo;
  private $cuerpo;
  private $modulo;

    /**
     * Constructor de Contenido
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
     * Devuelve el valor correspondiente a titulo
     * @return titulo
     */
  public function getTitulo(){
      return $this->titulo;
  }

    /**
     * Modifica el valor correspondiente a titulo
     * @param titulo
     */
  public function setTitulo($titulo){
      $this->titulo = $titulo;
  }
    /**
     * Devuelve el valor correspondiente a cuerpo
     * @return cuerpo
     */
  public function getCuerpo(){
      return $this->cuerpo;
  }

    /**
     * Modifica el valor correspondiente a cuerpo
     * @param cuerpo
     */
  public function setCuerpo($cuerpo){
      $this->cuerpo = $cuerpo;
  }
    /**
     * Devuelve el valor correspondiente a modulo
     * @return modulo
     */
  public function getModulo(){
      return $this->modulo;
  }

    /**
     * Modifica el valor correspondiente a modulo
     * @param modulo
     */
  public function setModulo($modulo){
      $this->modulo = $modulo;
  }


}
//That`s all folks!