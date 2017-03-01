$(document).ready(function () {

    function carrega_dades() {
        $.post("generar_caratula.php", function (dades) {
            mostrar_dades(dades);
        });
    }


    function mostrar_dades(dades) {
        $.each(dades,function (i,caratula){
            $("#contenidorCaratules").append("<div id='caratula'><img src='"+caratula.imagen+"' width='175' height='250'><div id='caratula-titol'>"+caratula.titulo+"</div></div>");
        });

    }

    carrega_dades();
    
    
    $("#boto-cercador").click(function (){
        
    })
});
