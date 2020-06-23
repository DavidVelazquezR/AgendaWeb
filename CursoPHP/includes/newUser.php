<?php

include_once '/xampp/htdocs/CursoPHP/includes/manipulaUsers.php';
$newUser = new manipulaUser();

//Validacion en BackEnd
if (isset($_POST['name'])) {
    //Significa que los datos estan completos
    $correo = $_POST['correo'];
    $resultado = $newUser->createUser($correo);

    if ($resultado) {

        include_once('/xampp/htdocs/CursoPHP/vistas/register.php');

        
    } else {

        include_once('/xampp/htdocs/CursoPHP/vistas/register.php');
        echo "<script> 
             Swal.fire(
            'Felicidades!',
            'Se creo tu cuenta correctamente',
            'success'
            )
            </script>";
    }
} else {
    //Significa que no esta completo el formulario
    include_once('/xampp/htdocs/CursoPHP/vistas/register.php');
    echo "<script> 
            Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'Completa el formulario',
            })
            </script>";
}
