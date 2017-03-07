<?php
require_once("funcions.php");
$connexio = connexio();

//Sql para recoger todas las categorias que hay en la Base de Datos.
$sql = "select * from categories";
//Ejecuto la consulta anterior.
$resultat = consulta($connexio, $sql);
//Variable que recoge el año actual.
$anyActural = (new DateTime)->format("Y");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        <script>
            $(document).ready(function () {
                /*
                 * Script que comprueba que en el textarea
                 * esten escritos como minimo 140 caracteres.
                 */
                $('form').on('submit', function (e) {

                    //Caracteres minimos.
                    var minCaracters = 50;

                    //Recojo el valor de la textArea (numero de caracteres).
                    var $textarea = $('#descripcio').val();

                    //Si los caracteres en la text area son menos que los minimos, el formulario no se envia
                    if ($textarea.length < minCaracters) {
                        //Enseño la caja del alert.
                        $("#alert").show();
                        //Elimino el P que contenga el alert.
                        $(".alert p").remove();
                        //Añado un nuevo P al alert
                        $("#alert").append("<p>La descripcion tiene que tener un minimo de " + minCaracters + " caracteres</p>");
                        //Hacemos un scroll a la pagina hasta arriba izquierda.
                        window.scrollTo(0, 0);
                        //Cancelamos el envio del formulario.
                        e.preventDefault();
                    }
                });
            });
        </script>
        <style>
            input[type=text], input[type="number"] , select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
            }

            input[type=checkbox]{
                margin-left: 10px;
            }


            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            textarea {
                width: 100%;
                height: 150px;
                padding: 12px 20px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                background-color: #f8f8f8;
                font-size: 16px;
                resize: none;
            }

            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }

            /* Caja de alerta */
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                margin-bottom: 15px;
            }

            /* Boton de la caja */
            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            /* Al pasar el raton por encima de la X de la caja */
            .closebtn:hover {
                color: black;
            }

            .alert p{
                font-size: 14px;
            }
        </style>
    </head>

    <body>
        <div class="alert" id="alert" style="display: none">
            <span class="closebtn" onclick="this.parentElement.style.display = 'none';">&times;</span> 

        </div>
        <div>
            <form action="valida_subida.php" method="post" enctype="multipart/form-data">
                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo">
                    <option value="serie">Serie</option>
                    <option value="pelicula">Pelicula</option>
                </select>
                <br><br>


                <label for="titol">Títol</label>
                <input type="text" id="titol" name="titol" placeholder="Títol..." required>
                <br><br>

                <label for="categoria">Categoria</label><br>
                <select class="form-control" id="categoria" name="categoria">
                    <?php
                    $sql = "SELECT * from categories";
                    $result = $connexio->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id_categoria"] . "' selected>" . $row["nom"] . "</option>";
                        }
                    }

                    $connexio->close();
                    ?>
                </select>
                <br><br>
                <label>Descripció</label><br>
                <textarea id="descripcio" name="descripcio"></textarea>
                <br><br>

                <label for="duracio">Duració (min)</label><br>
                <input type="number" id="duracio" name="duracio" min="1" max="999" required>
                <br><br>

                <label for="any">Any</label>
                <input type="number" id="any" name="any" min="1950" max="<?php echo $anyActural ?>" required>
                <br><br>

                <label for="imatge">Imatge</label><br>
                <input type="file" name="imatge" accept="image/*" required>
                <br><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
