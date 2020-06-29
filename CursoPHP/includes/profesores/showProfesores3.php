<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
    include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaProfesores = new manipulaProfesores();
    $manipulaSemestre = new manipulaSemestre();

    $arrayData1 = $manipulaSemestre->consultaSemestre($_POST['idEscuela']);

    for ($i = 0; $i < count($arrayData1); $i++) {
        if ((string) $arrayData1[$i]->NombreSemestre == $_POST['CBSemestre']) {
            $flag1 = $i;
            $idsemestre = $arrayData1[$i]->IDSemestre;
            $nombresemestre = $arrayData1[$i]->NombreSemestre;
        }
    }

    $arrayData2 = $manipulaProfesores->consultaProfesor($idsemestre);

    if ($arrayData2 == false) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/profesores/altaProfesoresForm.php" method="POST">
                    <h2>Alta de profesores</h2>
                    <br>
                    <div class="form-group">
                        <label for="">Nombre del profesor: </label>
                        <input type="text" name="nameProfe" class="form-control" placeholder="Ingresa el nombre del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Paterno del profesor: </label>
                        <input type="text" name="apP" class="form-control" placeholder="Ingresa el apellido paterno del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Materno del profesor: </label>
                        <input type="text" name="amP" class="form-control" placeholder="Ingresa el apellido materno del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telefono: </label>
                        <input type="text" name="telP" class="form-control" placeholder="Ingresa el telefono del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail: </label>
                        <input type="text" name="emailP" class="form-control" placeholder="Ingresa el email del profesor" required>
                    </div>
                    <input type="hidden" name="nombreSem" value="<?php echo $nombresemestre; ?>">
                    <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">No hay profesores registrados</h3>
    <?php
    } else {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/profesores/altaProfesoresForm.php" method="POST">
                    <h2>Alta de profesores</h2>
                    <br>
                    <div class="form-group">
                        <label for="">Nombre del profesor: </label>
                        <input type="text" name="nameProfe" class="form-control" placeholder="Ingresa el nombre del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Paterno del profesor: </label>
                        <input type="text" name="apP" class="form-control" placeholder="Ingresa el apellido paterno del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">Apellido Materno del profesor: </label>
                        <input type="text" name="amP" class="form-control" placeholder="Ingresa el apellido materno del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">Telefono: </label>
                        <input type="text" name="telP" class="form-control" placeholder="Ingresa el telefono del profesor" required>
                    </div>
                    <div class="form-group">
                        <label for="">E-mail: </label>
                        <input type="text" name="emailP" class="form-control" placeholder="Ingresa el email del profesor" required>
                    </div>
                    <input type="hidden" name="nombreSem" value="<?php echo $nombresemestre; ?>">
                    <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">Consulta tus profesores registradas</h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                while ($i != count($arrayData2)) {
                    echo "<tr>";
                    $nombreProfesor = $arrayData2[$i]->NombreP;
                    echo "<td> $nombreProfesor </td>";
                    $apellidoP = $arrayData2[$i]->ApellidoPaternoP;
                    echo "<td> $apellidoP </td>";
                    $apellidoM = $arrayData2[$i]->ApellidoMaternoP;
                    echo "<td> $apellidoM </td>";
                    $telefono = $arrayData2[$i]->Telefono;
                    echo "<td> $telefono </td>";
                    $email = $arrayData2[$i]->Email;
                    echo "<td> $email </td>";
                ?>

                    <td>
                        <form method="POST" id="baja_<?php echo $i; ?>" action="/CursoPHP/includes/profesores/bajaProfesoresForm.php">
                            <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                            <input type="hidden" name="idProf" value="<?php echo $arrayData2[$i]->IDProfesor; ?>">
                            <input type="hidden" name="bajaP" value="<?php echo $i; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>

                    </td>
                    <td>
                        <form method="POST" id="modify<?php echo $i; ?>" action="/CursoPHP/includes/profesores/conectaModify.php">
                            <input type="hidden" name="idSem" value="<?php echo $idsemestre; ?>">
                            <input type="hidden" name="idProf" value="<?php echo $arrayData2[$i]->IDProfesor; ?>">
                            <input type="hidden" name="modP" value="<?php echo $i; ?>">
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