<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include_once '/xampp/htdocs/CursoPHP/includes/manipulaUsers.php';
$manipulaUser = new manipulaUser();

$name = $_POST['name'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];

//Validacion en BackEnd
if (isset($_POST['name'])) {
    //Significa que los datos estan completos
    $arrayData2 = $manipulaUser->verificaCorreo($correo);
    try {
        if ($arrayData2[0]->Correo != $correo) {

            $manipulaUser->createUser($name, $ap, $am, $correo, $pass);

            include_once('/xampp/htdocs/CursoPHP/vistas/register.php');

            echo "<script> 
             Swal.fire(
            'Felicidades!',
            'Se creo tu cuenta correctamente',
            'success'
            )
            </script>";
        } else {
            include_once('/xampp/htdocs/CursoPHP/vistas/register.php');
            echo "<script> 
            Swal.fire({
            icon: 'error',
            title: 'Error...',
            text: 'El correo ya esta en uso',
            })
            </script>";
        }
    } catch (\Throwable $th) {
        //throw $th;
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
