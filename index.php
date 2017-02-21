<?php
session_start();
if (isset($_SESSION["usuari"])){
    
//if($pagina=="principal"){
    include("paginas/header.html");
    include("paginas/contenido.html");
    include("paginas/footer.html");
}else{
    include("paginas/index.html");
}


?>
