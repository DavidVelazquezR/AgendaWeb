<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaEscuelas = new manipulaEscuelas();

    $arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);
    $i = 0;

    if ($arrayData == null) {
        //Verificamos primero si hay escuelas
    ?>
        <section class="container-fluid">
            <h2>La seleccion de materias esta desactivada</h2>
            <br>
            <h3>Porfavor captura primero una escuela</h3>
        </section>
    <?php

    } else {
        //error de que caprure primero escuelas
    ?>
        <section class="container-fluid">
            <h2>Seleccione la escuela</h2>
            <br>
            <div class="form-container">
                <form action="/CursoPHP/includes/materias/conecta1.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Nombre de la escuela:</label>
                        </div>
                        <select name="CBEscuela" id="CBEscuela" class="custom-select">
                            <?php
                            $nombreEscuela = $arrayData[$i]->NombreEscuela;
                            echo " <option value='$nombreEscuela' selected> $nombreEscuela </option>";
                            $i++;
                            while ($i != count($arrayData)) {
                                $nombreEscuela = $arrayData[$i]->NombreEscuela;
                                echo " <option value='$nombreEscuela'> $nombreEscuela </option>";
                            ?>
                            <?php
                                $i++;
                            }

                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Seleccionar</button>
                </form>
            </div>
        </section>
    <?php
    }
    ?>
</div>