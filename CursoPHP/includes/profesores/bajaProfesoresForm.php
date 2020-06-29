<?php
include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';
include_once '/xampp/htdocs/CursoPHP/includes/horarios/manipulaHorarios.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaProfesores = new manipulaProfesores();
$manipulaHorarios = new manipulaHorarios();



//Validacion BackEnd
if ($_POST['bajaP'] != "" || $_POST['bajaP'] != null) {
    //Significa que se lleno el formulario correctamente
    //EL valor de i es el valor del array que contiene los datos msotrados en la venatna de showSmestres2
    //por tanto es el seleccionado en el boton del delete

    $arrayData1 = $manipulaHorarios->consultaHorarioP($_POST['idProf']);

    //elimina horarios que contengan el profesor a eliminar
    for ($i=0; $i < count($arrayData1); $i++) { 

        if ($arrayData1[$i]->IDProfesor == $_POST['idProf']) {
            $s1 = $manipulaHorarios->eliminaHorarioProf($_POST['idProf'], $arrayData1[$i]->IDHorario);
        }
        
    }

    //elimina el profesor de la bd
    $arrayData2 = $manipulaProfesores->eliminaProfesores($_POST['idProf'], $_POST['idSem']);



    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';

    echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se elimino el profesor correctamente',
        'success'
        )
        </script>";

}else{
    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/profesores/profesoresHome.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Recargaste pero ya se elimino el dato',
        })
        </script>";
}

?>
