<?php
include_once '/xampp/htdocs/CursoPHP/includes/profesores/manipulaProfesores.php';
include_once '/xampp/htdocs/CursoPHP/includes/materias/manipulaMaterias.php';
include_once '/xampp/htdocs/CursoPHP/includes/semestres/manipulaSemestre.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();
$manipulaSemestre = new manipulaSemestre();
$manipulaProfesores = new manipulaProfesores();
$manipulaMaterias = new manipulaMaterias();



//Validacion BackEnd
if ($_POST['baja'] != "" || $_POST['baja'] != null) {
    //Significa que se lleno el formulario correctamente
    //EL valor de i es el valor del array que contiene los datos msotrados en la venatna de showSmestres2
    //por tanto es el seleccionado en el boton del delete
    $i = (int) $_POST['baja'];
    //Hacemos la consulta de mis semestres
    $s1 = $manipulaSemestre->consultaSemestre($_POST['idEscuela']);
    $ide = 0;
    $ide = (int) $s1[$i]->IDSemestre;

    $s2 = $manipulaProfesores->consultaProfesor($ide);
    $s3 = $manipulaMaterias->consultaMateria($ide);


    if ($s2 == "" || $s2 == null) {

        if ($s3 == "" || $s3 == null) {
            //No hay profesores y materias enlazados, podemos borrar
            $data = $manipulaSemestre->eliminaSemestre($_POST['idEscuela'], $ide);

            $_SESSION['Nav'] = 1;
            include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semestresHome.php';

            echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se elimino el semestre correctamente',
        'success'
        )
        </script>";
            $_POST['baja'] = "";
            exit();

        } else {
            $_SESSION['Nav'] = 1;
            include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semestresHome.php';
            echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Asegurate de borrar materias enlazados al semestre a eliminar',
        })
        </script>";
        }
    } else {
        //Hay semestres, no podemos borrar

        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semestresHome.php';
        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Asegurate de borrar profesores enlazados al semestre a eliminar',
        })
        </script>";
    }
} else {
    $_SESSION['Nav'] = 1;
    include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semestresHome.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error al eliminar',
        text: 'Recargaste pero ya se elimino el dato',
        })
        </script>";
}
