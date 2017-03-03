<?php

session_start();

if (isset($_SESSION["usuari"])) {
    if ($_POST["valor"] == "tancar") {
        session_destroy();
    }
}
?>
