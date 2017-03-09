<?php

session_start();

if (isset($_SESSION["usuari"])) {

    require_once("funcions.php");
    $connexio = connexio();

    $valorCategoria = $_POST["valor"];

    $sql = "select * from archivo where categoria='" . $valorCategoria . "' and tipo='".$_SESSION["opcio"]."'";
    $resultat = consulta($connexio, $sql);

    $taula = array();
    while ($reg = $resultat->fetch_assoc()) {
        $taula[] = $reg;
    }

    header('Content-type: application/json');
    echo json_encode($taula);
}