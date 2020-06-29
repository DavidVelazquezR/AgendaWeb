<?php
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';
$userSession = new UserSession();
$_SESSION['Nav'] = 4;
include_once '/xampp/htdocs/CursoPHP/vistas/materias/materiasHome.php';
?>