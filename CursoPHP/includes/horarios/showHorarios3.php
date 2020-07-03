<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
    include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';
    include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';
    include_once '/xampp/htdocs/CursoPHP/includes/horarios/manipulaHorarios.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaMaterias = new manipulaMaterias();
    $manipulaProfesores = new manipulaProfesores();
    $manipulaSemestre = new manipulaSemestre();
    $manipulaHorarios = new manipulaHorarios();

    $arrayData1 = $manipulaSemestre->consultaSemestre($_POST['idEscuela']);

    for ($i = 0; $i < count($arrayData1); $i++) {
        if ((string) $arrayData1[$i]->NombreSemestre == $_POST['CBSemestre']) {
            $flag1 = $i;
            $idsemestre = $arrayData1[$i]->IDSemestre;
            $nombresemestre = $arrayData1[$i]->NombreSemestre;
        }
    }

    $arrayData2 = $manipulaMaterias->consultaMateria($idsemestre);
    $arrayData3 = $manipulaProfesores->consultaProfesor($idsemestre);


    if ($arrayData2 != false) {

        if ($arrayData3 != false) {

            $arrayData4 = $manipulaHorarios->consultaHorarioM($arrayData2[0]->IDMateria);
            $arrayData5 = $manipulaHorarios->consultaHorarioP($arrayData3[0]->IDProfesor);

            if ($arrayData4 == null || $arrayData5 == null) {
    ?>
                <section class="container-fluid">
                    <div class="form-container">
                        <h2>Alta de horarios</h2>
                        <br>
                        <form action="/CursoPHP/includes/horarios/altaHorariosForm.php" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <br>
                                    <label class="input-group-text">Nombre de la materia:</label>
                                </div>
                                <select name="CBMateria" id="CBMateria" class="custom-select">
                                    <?php
                                    $i = 0;
                                    $nombreMateria = $arrayData2[$i]->NombreMateria;
                                    $idMat = $arrayData2[$i]->IDMateria;
                                    echo " <option value='$idMat' selected> $nombreMateria</option>";
                                    $i++;
                                    while ($i != count($arrayData2)) {
                                        $nombreMateria = $arrayData2[$i]->NombreMateria;
                                        $idMat = $arrayData2[$i]->IDMateria;
                                        echo " <option value='$idMat'> $nombreMateria</option>";
                                    ?>
                                    <?php
                                        $i++;
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <br>
                                    <label class="input-group-text" for="inputGroupSelect01">Nombre del profesor:</label>
                                </div>
                                <select name="CBProfe" id="CBProfe" class="custom-select">
                                    <?php
                                    $i = 0;
                                    $nombreProfe = $arrayData3[$i]->NombreP . " " . $arrayData3[$i]->ApellidoPaternoP . " " . $arrayData3[$i]->ApellidoMaternoP;
                                    $idProfe = $arrayData3[$i]->IDProfesor;
                                    echo " <option value='$idProfe' selected> $nombreProfe</option>";
                                    $i++;
                                    while ($i != count($arrayData3)) {
                                        $nombreProfe = $arrayData3[$i]->NombreP . " " . $arrayData3[$i]->ApellidoPaternoP . " " . $arrayData3[$i]->ApellidoMaternoP;
                                        $idProfe = $arrayData3[$i]->IDProfesor;
                                        echo " <option value='$idProfe'> $nombreProfe</option>";
                                    ?>
                                    <?php
                                        $i++;
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Dia: </label>
                                <input type="text" name="dia" class="form-control" placeholder="Ingresa el dia que tienes la clase" required>
                            </div>

                            <div class='form-group'>
                                <label for="">Hora de entrada: </label>
                                <input type="text" id="datetimepicker1" name="he" class="form-control" required>
                            </div>

                            <div class='form-group'>
                                <label for="">Hora de salida: </label>
                                <input type="text" id="datetimepicker2" name="hs" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Dar de alta</button>
                        </form>
                    </div>

                </section>
                <hr>
                <h3 class="titulo">No hay horarios registrados</h3>


            <?php
            } else {


            ?>
                <section class="container-fluid">
                    <div class="form-container">
                        <h2>Alta de horarios</h2>
                        <br>
                        <form action="/CursoPHP/includes/horarios/altaHorariosForm.php" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <br>
                                    <label class="input-group-text">Nombre de la materia:</label>
                                </div>
                                <select name="CBMateria" id="CBMateria" class="custom-select">
                                    <?php
                                    $i = 0;
                                    $nombreMateria = $arrayData2[$i]->NombreMateria;
                                    $idMat = $arrayData2[$i]->IDMateria;
                                    echo " <option value='$idMat' selected> $nombreMateria</option>";
                                    $i++;
                                    while ($i != count($arrayData2)) {
                                        $nombreMateria = $arrayData2[$i]->NombreMateria;
                                        $idMat = $arrayData2[$i]->IDMateria;
                                        echo " <option value='$idMat'> $nombreMateria</option>";
                                    ?>
                                    <?php
                                        $i++;
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <br>
                                    <label class="input-group-text" for="inputGroupSelect01">Nombre del profesor:</label>
                                </div>
                                <select name="CBProfe" id="CBProfe" class="custom-select">
                                    <?php

                                    $i = 0;
                                    $nombreProfe = $arrayData3[$i]->NombreP . " " . $arrayData3[$i]->ApellidoPaternoP . " " . $arrayData3[$i]->ApellidoMaternoP;
                                    $idProfe = $arrayData3[$i]->IDProfesor;
                                    echo " <option value='$idProfe' selected> $nombreProfe</option>";
                                    $i++;
                                    while ($i != count($arrayData3)) {
                                        $nombreProfe = $arrayData3[$i]->NombreP . " " . $arrayData3[$i]->ApellidoPaternoP . " " . $arrayData3[$i]->ApellidoMaternoP;
                                        $idProfe = $arrayData3[$i]->IDProfesor;
                                        echo " <option value='$idProfe'> $nombreProfe</option>";
                                    ?>
                                    <?php
                                        $i++;
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Dia: </label>
                                <input type="text" name="dia" class="form-control" placeholder="Ingresa el dia que tienes la clase" required>
                            </div>

                            <div class='form-group'>
                                <label for="">Hora de entrada: </label>
                                <input type="text" id="datetimepicker1" name="he" class="form-control" required>
                            </div>

                            <div class='form-group'>
                                <label for="">Hora de salida: </label>
                                <input type="text" id="datetimepicker2" name="hs" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Dar de alta</button>
                        </form>
                    </div>

                </section>
                <hr>
                <h3 class="titulo">Consulta tus horarios registrados</h3>
                <div class="grid-options">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Materia</th>
                                <th>Profesor</th>
                                <th>Dia</th>
                                <th>Hora de entrada</th>
                                <th>Hora de salida</th>
                                <th>Opciones disponibles</th>
                                <th></th>
                            </tr>
                        </thead>

                        <?php



                        $tamañoHM = 0;
                        $arrayBHM = array();
                        $arrayBHP = array();
                        $arrayFHM = array();
                        
                        print("Array final de materias");
                        for ($i = 0; $i < count($arrayData2); $i++) {
                            $arrayBHM[$i] = $manipulaHorarios->consultaHorarioM($arrayData2[$i]->IDMateria);
                            for ($j = 0; $j < count($arrayBHM[$i]); $j++) {
                                $tamañoHM += count($arrayBHM[$i]);
                            }
                        }
                        $arrayFHM[$tamañoHM];
                        print("<br>Tamaño Array final");
                        print($tamañoHM);
                        for ($i = 0; $i < count($arrayData2); $i++) {
                            $arrayBHM[$i] = $manipulaHorarios->consultaHorarioM($arrayData2[$i]->IDMateria);
                            for ($j = 0; $j < count($arrayBHM[$i]); $j++) {
                                $arrayFHM[$i][$j] = $arrayBHM[$i][$j]->IDHorario;
                                print_r($arrayFHM[$i][$j]);
                            }
                        }
                        print("<br>");
                        print(count($arrayFHM));


                        while ($x != count($arrayData2)) {
                            $arrayBHM[$x] = $manipulaHorarios->consultaHorarioM($arrayData2[$x]->IDMateria);
                            $idH = (int) $arrayMaterias[$x][$y]->IDHorario;
                            array_push($arrayFlag, $idH);
                            $x++;
                        }

                        $i = 0;
                        while ($i != count($arrayData3)) {
                            $arrayBHP[$i] = $manipulaHorarios->consultaHorarioP($arrayData3[$i]->IDProfesor);
                            $i++;
                        }

                        for ($a = 0; $a < count($arrayBHP); $a++) {

                            for ($b = 0; $b < count($arrayBHM); $b++) {

                                if ($arrayBHP[$a]->IDHorario == $arrayBHM[$b]) {
                                    $arrayBHP[$a] = null;
                                }
                            }
                        }
                        print("Array final");
                        print_r($arrayFHM);
                        print(count($arrayFHM));
                        print("<br> ");
                        print("<br> ");
                        print("Array de IDP");
                        print_r($arrayData3);
                        print(count($arrayData3));
                        print("<br> ");
                        print("<br> ");
                        print("Array de IDM");
                        print_r($arrayData2);
                        print(count($arrayData2));
                        print("<br> ");
                        print("<br> ");
                        print("Array de busqueda horario por Materia");
                        print_r($arrayBHM);
                        print(count($arrayBHM));
                        print("<br> ");
                        print("<br> ");
                        print("Array de busqueda horario por Profesores");
                        print_r($arrayBHP);
                        print(count($arrayBHP));
                        print("<br> ");
                        print("<br> ");


                        $arrayFinal = array_merge($arrayBHM, $arrayBHP);
                        print(count($arrayFinal));
                        print_r($arrayFinal);

                        $i = 0;
                        while ($i != count($arrayFinal)) {
                            if ($arrayFinal[$i]->IDHorario  != "" || $arrayFinal[$i] != null) {
                                echo "<tr>";

                                $nombreMateria = $arrayFinal[$i]->IDMateria;
                                for ($j = 0; $j < count($arrayData2); $j++) {
                                    if ($arrayData2[$j]->IDMateria == $nombreMateria) {
                                        echo "<td>" . $arrayData2[$j]->NombreMateria . "</td>";
                                    }
                                }

                                $nombreProfesor = $arrayFinal[$i]->IDProfesor;
                                for ($j = 0; $j < count($arrayData3); $j++) {
                                    if ($arrayData3[$j]->IDProfesor == $nombreProfesor) {
                                        echo "<td>" . $arrayData3[$j]->NombreP . " " .
                                            $arrayData3[$j]->ApellidoMaternoP . " " .
                                            $arrayData3[$j]->ApellidoPaternoP . "</td>";
                                    }
                                }

                                $dia = $arrayFinal[$i]->Dia;
                                echo "<td> $dia </td>";

                                $horaE = $arrayFinal[$i]->HoraEntrada;
                                echo "<td> $horaE </td>";

                                $horaS = $arrayFinal[$i]->HoraSalida;
                                echo "<td> $horaS </td>";


                        ?>

                                <td>
                                    <form method="POST" id="baja_<?php echo $i; ?>" action="/CursoPHP/includes/horarios/bajaHorariosForm.php">
                                        <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                                        <input type="hidden" name="idMat" value="<?php echo $arrayData2[$i]->IDMateria; ?>">
                                        <input type="hidden" name="idhor" value="<?php echo $arrayFinal[$i]->IDHorario; ?>">
                                        <input type="hidden" name="bajaH" value="<?php echo $i; ?>">
                                        <input type="submit" value="Eliminar" class="btn btn-danger">
                                    </form>

                                </td>

                                </tr>

                        <?php
                            }
                            $i++;
                        }


                        ?>

                    </table>
                </div>


            <?php
            }
        } else {
            ?>
            <section class="container-fluid">
                <h2>La seleccion de horarios esta desactivada</h2>
                <br>
                <h3>Porfavor captura primero una profesor</h3>
            </section>
        <?php
        }
    } else {
        ?>
        <section class="container-fluid">
            <h2>La seleccion de horarios esta desactivada</h2>
            <br>
            <h3>Porfavor captura primero una materia</h3>
        </section>
    <?php
    }

    ?>
</div>