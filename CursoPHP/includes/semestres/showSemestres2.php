<div>
    <?php

    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';

    $manipulaEscuelas = new manipulaEscuelas();
    $arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);

    $flag = 0;
    $idescuela = 0;
    $nombrescuela = "";

    for ($i = 0; $i < count($arrayData); $i++) {
        if ((string) $arrayData[$i]->NombreEscuela == $_POST['CBEscuela']) {
            $flag1 = $i;
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
    } else if (count($arrayData2) == 1) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='2' selected> Segundo semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 2) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='3' selected> Tercer semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 3) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='4' selected> Cuarto semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 4) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='5' selected> Quinto semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 5) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='6' selected> Sexto semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 6) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='7' selected> Septimo semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 7) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='8' selected> Octavo semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 8) {
    ?><section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='9' selected> Noveno semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 9) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <h2>Altas semestres</h2>
                <?php echo "<h4> " . count($arrayData2) . "</h4>"; ?>
                <br>
                <form action="/CursoPHP/includes/semestres/altaSemestreForm.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <br>
                            <label class="input-group-text" for="inputGroupSelect01">Numero de semestre:</label>
                            <select name="CBSemestres" id="CBSemestres" class="custom-select">
                                <option value='10' selected> Decimo semestre </option>
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
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    } else if (count($arrayData2) == 10) {
    ?>
        <h3 class="titulo">Semestres registrados en: <?php echo $arrayData[$flag1]->NombreEscuela; ?></h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Numero de semestre</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i = 0;
                $numeroSemestre = 0;
                while ($i != count($arrayData2) - 1) {
                    echo "<tr>";
                    $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                    echo "<td> $numeroSemestre Semestre </td>";
                    $i++;
                }
                ?>
                <?php
                echo "<tr>";
                $numeroSemestre = $arrayData2[$i]->NombreSemestre;
                echo "<td> $numeroSemestre Semestre </td>";
                ?>
                <td>
                    <form method="POST" id="bajaS_<?php echo $i; ?>" action="/CursoPHP/includes/semestres/bajaSemestresForm.php">
                        <input type="hidden" name="baja" value="<?php echo $i; ?>">
                        <input type="hidden" name="idEscuela" value="<?php echo $idescuela; ?>">
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>

                </td>

            </table>
        </div>
    <?php
    }

    ?>