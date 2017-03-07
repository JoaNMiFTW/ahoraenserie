<?php

require_once("funcions.php");

$mysqli = connexio();

//SQL QUE SELECCIONA EL MAXIMO ID DEL ARCHIVO.
$sqlMaxId = "select MAX(id_archivo) from archivo";

//QUERY CON EL SQL ANTERIOR.
$maximaID = $mysqli->query($sqlMaxId);

//OBTENGO EL MAX ID DE LA CONSULTA ANTERIOR.
while ($row = $maximaID->fetch_assoc()) {
    $id = $row["MAX(id_archivo)"];
}


//Al ID maximo obtenido anteriormente le sumo 1.
$id = $id+1;
//Recojo el nombre recibido por post.
$tipo = $_POST["tipo"];
//Recojo el titulo recibido por post.
$titol = $_POST["titol"];
//Recojo la categoria recibida por post.
$categoria = $_POST["categoria"];
//Recojo la descripcion recibida por post.
$descripcio = $_POST["descripcio"];
//Recojo la duracion recibida por post.
$duracio = $_POST["duracio"];
//Recojo el año recibido por post.
$any = $_POST["any"];

//Recojo la foto que me pasan.
$foto = $_FILES["imatge"]["name"];

$ruta = $_FILES["imatge"]["tmp_name"];

//Recojo la extension de la imagen.
$ext = strtolower(substr(strrchr($foto, '.'), 1));

//Guardo la imagen en la carpeta con el nuevo nombre (id) y su extension.
$destino = "images/caratulas/" . $id. ".".$ext;

copy($ruta, $destino);

//Sql del insert con las variables anteriores.
$sqlInsert = "insert into archivo (id_archivo, tipo,titulo,categoria,descripcion,duracion,año,imagen) values($id,'$tipo','$titol','$categoria','$descripcio','$duracio','$any','$destino')";

//Ejecuto el insert con el sql anterior.
$consulta = consulta($mysqli, $sqlInsert);

//Devuelvo al usuario al index.
header("Location: index.php");
