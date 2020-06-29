<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
    include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaMaterias = new manipulaMaterias();
    $manipulaSemestre = new manipulaSemestre();

    $arrayData1 = $manipulaSemestre->consultaSemestre($_POST['idEscuela']);

    for ($i = 0; $i < count($arrayData1); $i++) {
        if ((string) $arrayData1[$i]->NombreSemestre == $_POST['CBSemestre']) {
            $flag1 = $i;
            $idsemestre = $arrayData1[$i]->IDSemestre;
            $nombresemestre = $arrayData1[$i]->NombreSemestre;
        }
    }

    $arrayData2 = $manipulaMaterias->consultaMateria($idsemestre);

    if ($arrayData2 == false) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/materias/altaMateriasForm.php" method="POST">
                    <h2>Alta de materias</h2>
                    <br>
                    <div class="form-group">
                        <label for="">Nombre de la materia: </label>
                        <input type="text" name="nameMat" class="form-control" placeholder="Ingresa el nombre del profesor" required>
                    </div>
                    <input type="hidden" name="nombreSem" value="<?php echo $nombresemestre; ?>">
                    <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">No hay materias registrados</h3>
    <?php
    } else {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/materias/altaMateriasForm.php" method="POST">
                    <h2>Alta de materias</h2>
                    <br>
                    <div class="form-group">
                        <label for="">Nombre de la materia: </label>
                        <input type="text" name="nameMat" class="form-control" placeholder="Ingresa el nombre de la materia" required>
                    </div>
                    <input type="hidden" name="nombreSem" value="<?php echo $nombresemestre; ?>">
                    <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">Consulta tus materias registradas</h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre de la materia</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                while ($i != count($arrayData2)) {
                    echo "<tr>";
                    $nombreMateria = $arrayData2[$i]->NombreMateria;
                    echo "<td> $nombreMateria </td>";
                ?>

                    <td>
                        <form method="POST" id="baja_<?php echo $i; ?>" action="/CursoPHP/includes/materias/bajaMateriasForm.php">
                            <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                            <input type="hidden" name="idMat" value="<?php echo $arrayData2[$i]->IDMateria; ?>">
                            <input type="hidden" name="bajaM" value="<?php echo $i; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>

                    </td>
                    <td>
                        <form method="POST" id="modify<?php echo $i; ?>" action="/CursoPHP/includes/materias/conectaModify.php">
                            <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                            <input type="hidden" name="idMat" value="<?php echo $arrayData2[$i]->IDMateria; ?>">
                            <input type="hidden" name="modM" value="<?php echo $i; ?>">
                            <input type="submit" value="Modificar" class="btn btn-warning">
                        </form>
                    </td>
                    </tr>

                <?php
                    $i++;
                }
                ?>

            </table>
        </div>
    <?php
    }

    ?>
</div>