<?php

require_once("funcions.php");

$mysqli = connexio();

$valorCercador = $_POST["valorCercador"];
$cadena = "SELECT * FROM archivo WHERE titulo like '%$valorCercador%'";

$consulta = consulta($mysqli, $cadena);

$taula = array();
while ($reg = $consulta->fetch_assoc()) {
    $taula[] = $reg;
}
header('Content-type: application/json');
echo json_encode($taula);
