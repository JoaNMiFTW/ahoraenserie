$(document).ready(function () {
    
    function carrega_dades() {
        $.post("generar_caratula.php", function (dades) {
            mostrar_dades(dades);
        });
    }


    function mostrar_dades(dades) {
        $.each(dades,function (i,caratula){
            $("#contenidorCaratules").append("<div><img src='"+caratula.imagen+"' width='140' height='200'><span>"+caratula.titulo+"</span></div>");
        });
        
    }

    carrega_dades();
});
