<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Somos los amish del software  \\


interface IModuloDao {

    /**
     * Guarda un objeto Modulo en la base de datos.
     * @param modulo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($modulo);
    /**
     * Modifica un objeto Modulo en la base de datos.
     * @param modulo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($modulo);
    /**
     * Elimina un objeto Modulo en la base de datos.
     * @param modulo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($modulo);
    /**
     * Busca un objeto Modulo en la base de datos.
     * @param modulo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($modulo);
    /**
     * Lista todos los objetos Modulo en la base de datos.
     * @return Array<Modulo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!