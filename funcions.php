<?php
function connexio() {
    $mysqli = new mysqli('localhost', 'root', 'danone', 'ahoraenserie');
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }
    $mysqli->set_charset("utf8");
    return $mysqli;
}

function consulta($mysqli, $sql) {
    $resultat = $mysqli->query($sql) or die("<h4>Operació Incorrecta. Consulta: $sql</h4>");
    return $resultat;
}

function escapa($mysqli, $text){
    return $mysqli->real_escape_string($text);
}

