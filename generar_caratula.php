<?php

session_start();

if (isset($_SESSION["usuari"])) {

    require_once("funcions.php");
    $connexio = connexio();

    $sql = "select count(USUARI) from usuaris WHERE USUARI='$usuari' AND CONTRASENYA='$contrasenya'";
    $resultat = consulta($connexio, $sql);

    $numeroFilesAfectades = 0;

    $resposta;

    while ($files = mysqli_fetch_array($resultat)) {
        $numeroFilesAfectades = $files[0];
    }

    if ($numeroFilesAfectades == 1) {
        $resposta = "registrat";
        $_SESSION["usuari"] = $usuari;
    } else {
        $resposta = "noRegistrat";
    }
    header('Content-type: application/json');
    echo json_encode($resposta);
}