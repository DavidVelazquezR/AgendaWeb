<?php
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';
$userSession = new UserSession();
$_SESSION['Nav'] = 2;
include_once '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';
?>