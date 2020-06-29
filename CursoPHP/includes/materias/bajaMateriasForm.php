<?php
include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';
include_once '/xampp/htdocs/CursoPHP/includes/horarios/manipulaHorarios.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaMaterias = new manipulaMaterias();
$manipulaHorarios = new manipulaHorarios();



//Validacion BackEnd
if ($_POST['bajaM'] != "" || $_POST['bajaM'] != null) {
    //Significa que se lleno el formulario correctamente
    //EL valor de i es el valor del array que contiene los datos msotrados en la venatna de showSmestres2
    //por tanto es el seleccionado en el boton del delete

    $arrayData1 = $manipulaHorarios->consultaHorarioM($_POST['idMat']);

    //elimina horarios que contengan el profesor a eliminar
    for ($i=0; $i < count($arrayData1); $i++) { 

        if ($arrayData1[$i]->IDMateria == $_POST['idMat']) {
            $s1 = $manipulaHorarios->eliminaHorarioMat($_POST['idMat'], $arrayData1[$i]->IDHorario);
        }
        
    }

    //elimina el profesor de la bd
    $arrayData2 = $manipulaMaterias->eliminaMaterias($_POST['idMat'], $_POST['idSem']);



    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';

    echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se elimino la materia correctamente',
        'success'
        )
        </script>";

}else{
    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Recargaste pero ya se elimino el dato',
        })
        </script>";
}

?>
