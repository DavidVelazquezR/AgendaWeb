<?php
include_once '/xampp/htdocs/CursoPHP/includes/horarios/manipulaHorarios.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';

$userSession = new UserSession();

$manipulaHorarios = new manipulaHorarios();

//Validacion BackEnd
if (isset($_POST['CBMateria'])) {
        //EL formulario se lleno correctamente
        $query = $manipulaHorarios->altaHorario(
                $_POST['CBMateria'],
                $_POST['CBProfe'],
                $_POST['dia'],
                $_POST['he'],
                $_POST['hs']
        );

        if (!$query) {
                //Reset del methodo POST
                $_SESSION['Nav'] = 1;
                include_once '/xampp/htdocs/CursoPHP/vistas/horarios/horariosHome.php';

                echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Este valor ya se encuentra ingresado :C',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
        } else {
                //Reset del methodo POST
                $_SESSION['Nav'] = 1;
                include_once '/xampp/htdocs/CursoPHP/vistas/horarios/horariosHome.php';

                echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Se dio de alta el nuevo horario',
        'success'
        )
        </script>";
        }

} else {
        //EL formulario no se lleno correctamente

        //Reset del methodo POST
        $_SESSION['Nav'] = 1;
        include_once '/xampp/htdocs/CursoPHP/vistas/horarios/horariosHome.php';

        echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Captura bien los datos de tu horario...',
        text: 'Recargaste, pero hay que colocar nuevos datos :C',
        })
        </script>";
}
