<?php
session_start();
$pagina = isset($_GET['loc']) ? $_GET['loc'] : 'login';

if($pagina=="principal"){
    include("paginas/header.html");
    include("paginas/contenido.html");
    include("paginas/footer.html");
}else{
    include("paginas/index.html");
}

?>