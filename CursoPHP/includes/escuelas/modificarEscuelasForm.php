<?php
include_once '/xampp/htdocs/CursoPHP/includes/escuelas/manipulaEscuelas.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaEscuelas = new manipulaEscuelas();

$namescuela = (string)$_POST['nameEscuela'];
$idusuario = $_SESSION['IDUsuario'];
$idescuela = $_POST['modificaID'];


//Validacion BackEnd
if ($_POST['nameEscuela'] != "") {
    //EL formulario se lleno correctamente
    if (!$query) {
        //Reset del methodo POST
        unset($_POST['modificaID']);
        unset($_POST['modificaNAME']);
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/home.php';

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
        include_once '/xampp/htdocs/CursoPHP/vistas/home.php';

        echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se modifico la escuela correctamente',
        'success'
        )
        </script>";
    }
} else {
    //EL formulario no se lleno correctamente

    //Reset del methodo POST
    unset($_POST['modificaID']);
    unset($_POST['modificaNAME']);

    include_once '/xampp/htdocs/CursoPHP/vistas/home.php';

    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'El valor no se modifico',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
