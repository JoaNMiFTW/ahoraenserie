$(document).ready(function () {
    function carrega_dades() {
        $.post("comprovar_login.php", "usuari=" + usuari + "&contrasenya=" + contrasenya, function (dades) {
            mostrar_dades(dades);
        });
    }


    function mostrar_dades(dades) {
        if (dades === "registrat") {
            window.location.href = "principal.html";
        } else {
            $(alert("Usuari incorrecte"));
            $("#usuari").val("");
            $("#contrasenya").val("");
        }

    }
});
