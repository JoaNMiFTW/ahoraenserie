<?php
require_once("funcions.php");
$connexio = connexio();

$sql = "select * from categories";
$resultat = consulta($connexio, $sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        </style>
    </head>

    <body>
        <div>
            <form action="valida_subida.php" method="post" enctype="multipart/form-data">
                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo">
                    <option value="serie">Serie</option>
                    <option value="pelicula">Pelicula</option>
                </select>
                <br><br>


                <label for="titol">Títol</label>
                <input type="text" id="titol" name="titol" placeholder="Títol...">
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
                <textarea id="descripcio" name="descripcio">Descripcio...</textarea>
                <br><br>

                <label for="duracio">Duració (min)</label><br>
                <input type="number" id="duracio" name="duracio" min="1" max="999">
                <br><br>

                <label for="any">Any</label>
                <input type="text" id="any" name="any" placeholder="Any...">
                <br><br>

                <label for="imatge">Imatge</label><br>
                <input type="file" name="imatge" accept="image/*">
                <br><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
</html>
