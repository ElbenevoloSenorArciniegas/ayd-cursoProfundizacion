<?php
$archivo = $_FILES["archivo"];
$resultado = move_uploaded_file($archivo["tmp_name"], getcwd()."/consignaciones/".$archivo["name"]);
if ($resultado) {
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}