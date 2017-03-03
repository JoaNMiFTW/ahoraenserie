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
            $.post("logout.php", "valor=" + valor, function (){
                window.location.href = "index.php";
            });
        }

        carrega_logout();
    });
});
