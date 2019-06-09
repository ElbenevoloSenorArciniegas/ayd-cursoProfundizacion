<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando uses Anarchy, Georgie, tú también flotarás  \\


interface ICursoDao {

    /**
     * Guarda un objeto Curso en la base de datos.
     * @param curso objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($curso);
    /**
     * Modifica un objeto Curso en la base de datos.
     * @param curso objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($curso);
    /**
     * Elimina un objeto Curso en la base de datos.
     * @param curso objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($curso);
    /**
     * Busca un objeto Curso en la base de datos.
     * @param curso objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($curso);
    /**
     * Lista todos los objetos Curso en la base de datos.
     * @return Array<Curso> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That`s all folks!