$(document).ready(function () {
    $("#contingutLogin").show();
    $("#join").click(function () {
        carrega_dades();
    });
});


function carrega_dades() {
    var usuari = $("#usuari").val();
    var contrasenya = $("#contrasenya").val();
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
