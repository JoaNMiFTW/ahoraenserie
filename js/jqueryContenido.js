$(document).ready(function () {
    
    $(".upload").on("click",uploadModal);

    
    
    function uploadModal(){
        $("#modalUploadCont").load("pujada.php");
        $("#modalUpload").show();
    }

    function carrega_dades() {
        $.post("generar_caratula.php", function (dades) {
            mostrar_dades(dades);
        });
    }


    function mostrar_dades(dades) {
        $.each(dades, function (i, caratula) {
            $("#contenidorCaratules").append("<div id='caratula'><img src='" + caratula.imagen + "' width='175' height='250'><div id='caratula-titol'>" + caratula.titulo + "</div></div>");
        });

    }

    carrega_dades();


    $("#boto-cercador").click(function () {
        var valorCercador = $("#cercador").val();

        function carrega_dades_cercador() {
            $.post("resultat_cercador.php", "valorCercador=" + valorCercador, function (dades) {
                mostrar_dades_cercador(dades);
            });
        }

        function mostrar_dades_cercador(dades) {
            borrar_informacio();

            $.each(dades, function (i, caratula) {
                $("#contenidorCaratules").append("<div id='caratula'><img src='" + caratula.imagen + "' width='175' height='250'><div id='caratula-titol'>" + caratula.titulo + "</div></div>");
            });
        }

        carrega_dades_cercador();
    });

    function borrar_informacio() {
        $("#contenidorCaratules").empty();
    }


    $(".logout").click(function () {
        var valor = "tancar";

        function carrega_logout() {
            $.post("logout.php", "valor=" + valor, function () {
                window.location.href = "index.php";
            });
        }

        carrega_logout();
    });


    
    $("#pelicules").click(function () {
        var valor = "pelicula";
        carrega_opcio(valor);
    });
    
    $("#series").click(function () {
        var valor = "serie";
        carrega_opcio(valor);
    });

    function carrega_opcio(valor) {
        $.post("opcio_contingut.php", "valor=" + valor, function (dades) {
            borrar_informacio();
            $.each(dades, function (i, caratula) {
                $("#contenidorCaratules").append("<div id='caratula'><img src='" + caratula.imagen + "' width='175' height='250'><div id='caratula-titol'>" + caratula.titulo + "</div></div>");
            });
            
            mostra_categories();
        });
    }
    
    function mostra_categories(){
        $("#categories").empty();
        $("#categories").load("paginas/categories.html");
        $.post("retornaCategories.php",function(dades){
            $.each(dades, function(i, categoria){
                $("#ul-categories").append("<li class='li-categoria' value='"+categoria.nom+"'>"+categoria.nom+"</li>");
            });
            
            $(".li-categoria").on("click",function(){
                var valor = $(this).attr("value");
                carrega_categoria(valor);
            });
        });
    }
    
    function carrega_categoria(valor) {
        $.post("opcio_categories.php", "valor=" + valor, function (dades) {
            borrar_informacio();
            $.each(dades, function (i, caratula) {
                $("#contenidorCaratules").append("<div id='caratula'><img src='" + caratula.imagen + "' width='175' height='250'><div id='caratula-titol'>" + caratula.titulo + "</div></div>");
            });
        });
    }
    

});