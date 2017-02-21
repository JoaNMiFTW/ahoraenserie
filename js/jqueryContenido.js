$(document).ready(function () {
    function carrega_dades() {
        $.post("comprovar_login.php", function (dades) {
            mostrar_dades(dades);
        });
    }


    function mostrar_dades(dades) {
        

    }
});
