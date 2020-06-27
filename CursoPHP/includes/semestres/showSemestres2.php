<div>
    <?php

    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';

    $manipulaEscuelas = new manipulaEscuelas();
    $arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);
    $idescuela = 0;
    $nombrescuela = "";
    for ($i = 0; $i < count($arrayData); $i++) {
        if ((string) $arrayData[$i]->NombreEscuela == $_POST['CBEscuela']) {
            $flag = $i;
            $idescuela = $arrayData[$i]->IDEscuela;
            $nombrescula = $arrayData[$i]->NombreEscuela;
        }
    }

    $manipulaSemestre = new manipulaSemestre();
    $arrayData2 = $manipulaSemestre->consultaSemestre($idescuela);


    if ($arrayData2 == null) {
        //No hya nada, vista 1
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='1' selected> Primer semestre </option>
                                <option value='2'> Segundo semestre </option>
                                <option value='3'> Tercero semestre </option>
                                <option value='4'> Cuarto semestre </option>
                                <option value='5'> Quinto semestre </option>
                                <option value='6'> Sexto semestre </option>
                                <option value='7'> Septimo semestre </option>
                                <option value='8'> Octavo semestre </option>
                                <option value='9'> Noveno semestre </option>
                                <option value='10'> Decimo semestre </option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="nombreEscuela" value="<?php echo $nombrescuela; ?>">
                    <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>
        </section>
        <hr>
        <h3 class="titulo">No hay semestres registrados en: <?php echo $arrayData[$flag]->NombreEscuela; ?></h3>
    <?php
    } else if (count($arrayData2) == 10) {
        //Esta lleno, Vista 3
    } else {
        //hay datos pero no esta lleno, Vista 2
    }

    ?>