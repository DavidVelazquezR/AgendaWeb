<?php
print_r($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Web Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c42e92f9a5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/CursoPHP/css/estilos.css">
</head>

<body>
    <div class="contenedor active" id="contenedor">
        <header class="header">
            <div class="contenedor-log">
                <button id="boton-menu" class="boton-menu"><i class="fas fa-ellipsis-h"></i></button>
                <a href="/CursoPHP/index.php" class="logo"><i class="fas fa-calendar-day"></i><span>Agenda WEB</span></a>
            </div>

            <!--<div class="barra-busqueda">
                <input type="text" placeholder="Buscar">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>-->

            <div class="botones-header">
                <a href="/CursoPHP/includes/logout.php" class="logout"><i class="fas fa-sign-out-alt"></i></a>
                <a href="#" class="avatar"><img src="img/user.jpg" alt="" class="src"></a>

            </div>
        </header>

        <nav class="menu_lateral">
            <a href="/CursoPHP/vistas/escuelas/indexEscuelas.php"><i class="fas fa-school"></i> Escuelas</a>
            <a href="#"><i class="fas fa-vote-yea"></i> Semestres</a>
            <a href="#"><i class="fas fa-book-open"></i> Materias</a>
            <a href="#"><i class="fas fa-chalkboard-teacher"></i> Profesores</a>
            <a href="#"><i class="fas fa-clock"></i> Horarios</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Calendario</a>
            <a href="#"><i class="fas fa-sticky-note"></i> Notas</a>

        </nav>

        <main class="main">
            <h3 class="titulo">Welcome to AGENDA</h3>
            <div class="grid-options">
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, similique hic. Harum totam laudantium eligendi, possimus excepturi voluptate provident et vitae modi amet nisi libero? Ex optio harum blanditiis esse?</p>
            </div>
        </main>
    </div>


    <script src="/CursoPHP/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>