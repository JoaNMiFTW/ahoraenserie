<?php
    require_once("funcions.php");

    $connexio = connexio();
    
    $sql = "select * from categories";
    $resultat = consulta($connexio, $sql);

    $taula = array();
    while ($reg = $resultat->fetch_assoc()) {
        $taula[] = $reg;
    }

    header('Content-type: application/json');
    echo json_encode($taula);
?>