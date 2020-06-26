<div>
    <?php

    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaEscuelas = new manipulaEscuelas();
    $arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);
    $i = 0;

    if ($arrayData == false) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/escuelas/altaEscuelasForm.php" method="POST">
                    <div class="form-group">
                        <h2>Alta de escuelas</h2>
                        <br>
                        <label for="">Nombre de la escuela: </label>
                        <input type="text" name="nameEscuela" class="form-control" placeholder="Ingresa el nombre de la escuela" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">No hay escuelas registradas</h3>
    <?php
    } else {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/escuelas/altaEscuelasForm.php" method="POST">
                    <div class="form-group">
                        <h2>Alta de escuelas</h2>
                        <br>
                        <label for="">Nombre de la escuela: </label>
                        <input type="text" name="nameEscuela" class="form-control" placeholder="Ingresa el nombre de la escuela" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">Consulta tus escuelas registradas</h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre de la Escuela</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                while ($i != count($arrayData)) {
                    echo "<tr>";
                    $nombreEscuela = $arrayData[$i]->NombreEscuela;
                    echo "<td> $nombreEscuela </td>";
                ?>

                    <td>
                        <form method="POST" id="baja_<?php echo $i; ?>" action="/CursoPHP/includes/escuelas/bajaEscuelasForm.php">
                            <input type="hidden" name="baja" value="<?php echo $i; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>

                    </td>
                    <td>
                        <form method="POST" id="modify<?php echo $i; ?>" action="/CursoPHP/includes/escuelas/conectaModify.php">
                            <input type="hidden" name="modificaID" value="<?php echo $i; ?>">
                            <input type="hidden" name="modificaNAME" value="<?php echo $arrayData[$i]->NombreEscuela ?>">
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