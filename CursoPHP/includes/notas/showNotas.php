<div>
    <?php

    include_once '/xampp/htdocs/CursoPHP/includes/notas/manipulaNotas.php';
    //Reset del methodo POST
    unset($_POST['nameEscuela']);

    $manipulaNotas = new manipulaNotas();
    $arrayData = $manipulaNotas->consultaNotas($_SESSION['IDUsuario']);
    $i = 0;

    if ($arrayData == false) {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/notas/altaNotasForm.php" method="POST">
                    <h2>Alta de Notas</h2>
                    <br>
                    <div class="form-group">
                        <label for="">Titulo de la nota: </label>
                        <input type="text" name="title" class="form-control" placeholder="Ingresa el titulo de la nota" required>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion: </label>
                        <textarea class="form-control" name="desc" rows="4" placeholder="Ingresa la descripcion de tu nota" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">No hay notas guardadas</h3>
    <?php
    } else {
    ?>
        <section class="container-fluid">
            <div class="form-container">
                <form action="/CursoPHP/includes/notas/altaNotasForm.php" method="POST">
                    <h2>Alta de Notas</h2>
                    <br>
                    <div class="form-group">
                        <label for="">Titulo de la nota: </label>
                        <input type="text" name="title" class="form-control" placeholder="Ingresa el titulo de la nota" required>
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion: </label>
                        <textarea class="form-control" name="desc" rows="4" placeholder="Ingresa la descripcion de tu nota"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Dar de alta</button>
                </form>
            </div>

        </section>
        <hr>
        <h3 class="titulo">Consulta tus notas registradas</h3>
        <div class="grid-options">

            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Titulo de la nota</th>
                        <th>Descripcion</th>
                        <th>Opciones disponibles</th>
                        <th></th>
                    </tr>
                </thead>

                <?php
                $i =0;
                while ($i != count($arrayData)) {
                    echo "<tr>";
                    $titulo = $arrayData[$i]->Titulo;
                    echo "<td> $titulo </td>";
                    $desc = $arrayData[$i]->Descripcion;
                    echo "<td> $desc </td>";
                ?>

                    <td>
                        <form method="POST" id="baja_<?php echo $i; ?>" action="/CursoPHP/includes/notas/bajaNotasForm.php">
                            <input type="hidden" name="baja" value="<?php echo $i; ?>">
                            <input type="hidden" name="idNota" value="<?php echo $arrayData[$i]->IDNotas; ?>">
                            <input type="submit" value="Eliminar" class="btn btn-danger">
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