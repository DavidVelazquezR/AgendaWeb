<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaEscuelas = new manipulaEscuelas();
    $manipulaSemestre = new manipulaSemestre();

    $arrayData1 = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);

    for ($i = 0; $i < count($arrayData1); $i++) {
        if ((string) $arrayData1[$i]->NombreEscuela == $_POST['CBEscuela']) {
            $flag1 = $i;
            $idescuela = $arrayData1[$i]->IDEscuela;
            $nombrescula = $arrayData1[$i]->NombreEscuela;
        }
    }


    $arrayData2 = $manipulaSemestre->consultaSemestre($idescuela);
    $i = 0;

    if ($arrayData2 == null) {
        //Verificamos primero si hay escuelas
    ?>
        <section class="container-fluid">
            <h2>La seleccion de horarios esta desactivada</h2>
            <br>
            <h3>Porfavor captura primero un semestre</h3>
        </section>
    <?php

    } else {
        //error de que caprure primero semestre
    ?>
        <section class="container-fluid">
            <h2>Seleccione el semestre</h2>
            <br>
            <div class="form-container">
                <form action="/CursoPHP/includes/horarios/conecta2.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                        </div>
                        <select name="CBSemestre" id="CBSemestre" class="custom-select">
                            <?php
                            $nombreSemestre = $arrayData2[$i]->NombreSemestre;
                            echo " <option value='$nombreSemestre' selected> $nombreSemestre Semestre</option>";
                            $i++;
                            while ($i != count($arrayData2)) {
                                $nombreSemestre = $arrayData2[$i]->NombreSemestre;
                                echo " <option value='$nombreSemestre'> $nombreSemestre Semestre</option>";
                            ?>
                            <?php
                                $i++;
                            }

                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="nombreEscuela" value="<?php echo $nombrescula; ?>">
                    <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                    <button type="submit" class="btn btn-primary">Seleccionar</button>
                </form>
            </div>
        </section>
    <?php
    }
    ?>
</div>