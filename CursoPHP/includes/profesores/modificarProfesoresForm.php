<?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaEscuelas = new manipulaEscuelas();
$manipulaProfesores = new manipulaProfesores();

$idP = $_POST['idProf'];
$nameP = $_POST['nameProfe'];
$apP = $_POST['apP'];
$amP = $_POST['amP'];
$telP = $_POST['telP'];
$emailP = $_POST['emailP'];

//Validacion BackEnd
if ($_POST['idProf'] != "") {
    //EL formulario se lleno correctamente
    $query = $manipulaProfesores->modificaProfesores(
        $idP,
        $nameP,
        $apP,
        $amP,
        $telP,
        $emailP,
    );

    if (!$query) {
        //Reset del methodo POST
        unset($_POST['modificaID']);
        unset($_POST['modificaNAME']);
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';

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
        include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';

        echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se modifico el profesor correctamente',
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
    include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';

    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'El valor no se modifico',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
