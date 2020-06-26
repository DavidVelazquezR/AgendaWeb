<div>
    <?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';

$manipulaEscuelas = new manipulaEscuelas();

$arrayData = $manipulaEscuelas->consultaEscuela($_SESSION['IDUsuario']);

$idescuela = 0;

for ($i = 0; $i < count($arrayData); $i++) {
    if ((string)$arrayData[$i]->NombreEscuela == $_POST['modificaNAME']) {
        
        $idescuela = $arrayData[$i]->IDEscuela;
            
    }
}

?>
    <section class="container-fluid">
        <div class="form-container">
            <form action="/CursoPHP/includes/escuelas/modificarEscuelasForm.php" method="POST">
                <div class="form-group">
                    <h2>Modificacion de escuelas</h2>
                    <br>
                    <label for="">Nombre de la escuela: </label>
                    <input type="hidden" name="modificaID" value="<?php echo $idescuela; ?>">
                    <input type="hidden" name="modificaNAME" value="<?php echo $_POST['modificaNAME']; ?>">
                    <input type="text" name="nameEscuela" class="form-control" placeholder="Ingresa el nombre que remplazara a *<?php echo $_POST['modificaNAME'];?>*" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </form>
        </div>

    </section>

</div>