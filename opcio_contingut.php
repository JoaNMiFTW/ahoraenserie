<?php

session_start();

if (isset($_SESSION["usuari"])) {

    require_once("funcions.php");
    $connexio = connexio();

    $valorOpcio = "";

    if (isset($_POST["valor"])) {
        $valorOpcio = $_POST["valor"];
        $_SESSION["opcio"] = $_POST["valor"];
    }



    $sql = "select * from archivo where tipo='" . $valorOpcio . "'";
    $resultat = consulta($connexio, $sql);

    $taula = array();
    while ($reg = $resultat->fetch_assoc()) {
        $taula[] = $reg;
    }

    header('Content-type: application/json');
    echo json_encode($taula);
}