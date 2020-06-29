<div>
    <?php
    include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
    include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';

    $manipulaProfesores = new manipulaProfesores();

    $arrayData1 = $manipulaProfesores->consultaProfesor($_POST['idSem']);
    ?>
    <section class="container-fluid">
        <div class="form-container">
            <form action="/CursoPHP/includes/profesores/modificarProfesoresForm.php" method="POST">
                <h2>Modificacion de profesores</h2>
                <br>
                <div class="form-group">
                    <label for="">Nombre del profesor: </label>
                    <input type="text" name="nameProfe" class="form-control" placeholder="Ingresa el nombre del profesor que sustituira a '<?php echo $arrayData1[$_POST['modP']]->NombreP; ?>'" required>
                </div>
                <div class="form-group">
                    <label for="">Apellido Paterno del profesor: </label>
                    <input type="text" name="apP" class="form-control" placeholder="Ingresa el apellido paterno del profesor que sustituira a '<?php echo $arrayData1[$_POST['modP']]->ApellidoPaternoP; ?>'" required>
                </div>
                <div class="form-group">
                    <label for="">Apellido Materno del profesor: </label>
                    <input type="text" name="amP" class="form-control" placeholder="Ingresa el apellido materno del profesor que sustituira a '<?php echo $arrayData1[$_POST['modP']]->ApellidoMaternoP; ?>'" required>
                </div>
                <div class="form-group">
                    <label for="">Telefono: </label>
                    <input type="text" name="telP" class="form-control" placeholder="Ingresa el telefono del profesor que sustituira a '<?php echo $arrayData1[$_POST['modP']]->Telefono; ?>'" required>
                </div>
                <div class="form-group">
                    <label for="">E-mail: </label>
                    <input type="text" name="emailP" class="form-control" placeholder="Ingresa el email del profesor que sustituira a '<?php echo $arrayData1[$_POST['modP']]->Email; ?>'" required>
                </div>
                <input type="hidden" name="idProf" value="<?php echo $_POST['idProf']; ?>">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>

    </section>

</div>