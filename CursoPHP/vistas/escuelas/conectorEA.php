<?php
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';
$userSession = new UserSession();

$userSession->setCurrentUser($_SESSION['Correo'], $_SESSION['IDUsuario'], 2);

include '/xampp/htdocs/CursoPHP/vistas/escuelas/escuelasHome.php';

