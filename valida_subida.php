<?php
require_once("funcions.php");
$mysqli = connexio();


$tipo = $_POST["tipo"];
$titol = $_POST["titol"];
$categoria = $_POST["categoria"];
$descripcio = $_POST["descripcio"];
$duracio = $_POST["duracio"];
$any = $_POST["any"];

$foto=$_FILES["imatge"]["name"];
$ruta=$_FILES["imatge"]["tmp_name"];

$destino="images/caratulas/".$foto;
copy($ruta,$destino);

$sqlInsert = "insert into archivo (tipo,titulo,categoria,descripcion,duracion,año,imagen) values('$tipo','$titol','$categoria','$descripcio','$duracio','$any','$destino')";

$consulta = consulta($mysqli, $sqlInsert);
header("Location: index.php");
