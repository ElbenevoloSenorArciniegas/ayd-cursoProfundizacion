<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Oh gloria de las glorias, oh divino testamento de la eterna majestad de la creación de dios  \\


interface IContenidoDao {

    /**
     * Guarda un objeto Contenido en la base de datos.
     * @param contenido objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($contenido);
    /**
     * Modifica un objeto Contenido en la base de datos.
     * @param contenido objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($contenido);
    /**
     * Elimina un objeto Contenido en la base de datos.
     * @param contenido objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($contenido);
    /**
     * Busca un objeto Contenido en la base de datos.
     * @param contenido objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($contenido);
    /**
     * Lista todos los objetos Contenido en la base de datos.
     * @return Array<Contenido> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!