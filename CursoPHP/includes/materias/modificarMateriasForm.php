<?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaEscuelas = new manipulaEscuelas();
$manipulaMaterias = new manipulaMaterias();

$idM = $_POST['idMat'];
$nameM = $_POST['nameMat'];

//Validacion BackEnd
if ($_POST['idMat'] != "") {
    //EL formulario se lleno correctamente
    $query = $manipulaMaterias->modificaMaterias(
        $idM,
        $nameM,
    );

    if (!$query) {
        //Reset del methodo POST
        unset($_POST['modificaID']);
        unset($_POST['modificaNAME']);
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'El valor no se modifico',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
    } else {
        //Reset del methodo POST
        unset($_POST['modificaID']);
        unset($_POST['modificaNAME']);
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

        echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se modifico la materia correctamente',
        'success'
        )
        </script>";
    }
} else {
    //EL formulario no se lleno correctamente

    //Reset del methodo POST
    unset($_POST['modificaID']);
    unset($_POST['modificaNAME']);

    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'El valor no se modifico',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
