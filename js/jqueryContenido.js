$(document).ready(function () {

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
        });
    }
    
    
    
    
    $("#drama").click(function () {
        var valor = "drama";
        carrega_categoria(valor);
    });
    
    $("#comedia").click(function () {
        var valor = "comedia";
        carrega_categoria(valor);
    });
    
    $("#accion").click(function () {
        var valor = "accion";
        carrega_categoria(valor);
    });
    
    $("#aventura").click(function () {
        var valor = "aventura";
        carrega_categoria(valor);
    });
    
    $("#terror").click(function () {
        var valor = "terror";
        carrega_categoria(valor);
    });
    
    $("#ficcion").click(function () {
        var valor = "ficcion";
        carrega_categoria(valor);
    });
    
    $("#romantico").click(function () {
        var valor = "romantico";
        carrega_categoria(valor);
    });
    
    $("#musical").click(function () {
        var valor = "musical";
        carrega_categoria(valor);
    });
    
    $("#suspense").click(function () {
        var valor = "suspense";
        carrega_categoria(valor);
    });
    
    $("#fantasia").click(function () {
        var valor = "fantasia";
        carrega_categoria(valor);
    });
    
    function carrega_categoria(valor) {
        $.post("opcio_categories.php", "valor=" + valor, function (dades) {
            borrar_informacio();
            $.each(dades, function (i, caratula) {
                $("#contenidorCaratules").append("<div id='caratula'><img src='" + caratula.imagen + "' width='175' height='250'><div id='caratula-titol'>" + caratula.titulo + "</div></div>");
            });
        });
    }
    

});