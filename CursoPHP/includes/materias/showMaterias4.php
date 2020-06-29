<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';

    $manipulaMaterias = new manipulaMaterias();

    $arrayData1 = $manipulaMaterias->consultaMateria($_POST['idSem']);
    ?>
    <section class="container-fluid">
        <div class="form-container">
            <form action="/CursoPHP/includes/materias/modificarMateriasForm.php" method="POST">
                <h2>Modificacion de materias</h2>
                <br>
                <div class="form-group">
                    <label for="">Nombre de la materia: </label>
                    <input type="text" name="nameMat" class="form-control" placeholder="Ingresa el nombre de la materia que sustituira a '<?php echo $arrayData1[$_POST['modM']]->NombreMateria; ?>'" required>
                </div>
                <input type="hidden" name="idMat" value="<?php echo $_POST['idMat']; ?>">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>

    </section>

</div>