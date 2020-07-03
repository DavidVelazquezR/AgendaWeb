<?php


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">



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
                <a href="#" class="avatar"><img src="/CursoPHP/img/user.jpg" alt="" class="src"></a>

            </div>
        </header>

        <nav class="menu_lateral">
            <a href="/CursoPHP/vistas/escuelas/indexEscuelas.php"><i class="fas fa-school"></i> Escuelas</a>
            <a href="/CursoPHP/vistas/semestres/indexSemestres.php"><i class="fas fa-vote-yea"></i> Semestres</a>
            <a href="/CursoPHP/vistas/materias/indexMaterias.php"><i class="fas fa-book-open"></i> Materias</a>
            <a href="/CursoPHP/vistas/profesores/indexProfesores.php"><i class="fas fa-chalkboard-teacher"></i> Profesores</a>
            <!--<a href="/CursoPHP/vistas/horarios/indexHorarios.php"><i class="fas fa-clock"></i> Horarios</a>-->
            <a href="/CursoPHP/vistas/calendario/indexCalendar.php"><i class="fas fa-calendar-alt"></i> Calendario</a>
            <a href="/CursoPHP/vistas/notas/indexNotas.php"><i class="fas fa-sticky-note"></i> Notas</a>

        </nav>

        <main class="main">
            <div class="texto">
                <h1 class="texto">Bienvenido</h1>
                <h4>A tu Agenda Web personal</h4>
            </div>
            <br>
            <div class="grid-options">
                <p class="">Nuestra AGENDA WEB te permite capturar lo mas importante de tu escuela, lo cual a veces se hace complicado tener un control siendo estudiante, es por eso que te ofrecemos: </p>
            </div>

            <div class="grid-options">

                <h4><i class="fas fa-check"></i> Tener control de tus Escuelas</h4>
                <h4><i class="fas fa-check"></i> Tener control de tus Semestres</h4>
                <h4><i class="fas fa-check"></i> Tener control de tus Materias</h4>
                <h4><i class="fas fa-check"></i> Tener control de tus Profesores</h4>
                <h4><i class="fas fa-check"></i> Tener control de tus Notas</h4>
            </div>


        </main>

    </div>
    <footer class="card-footer">
        <div class="container">
            <span class="text-muted">Developed by David Velázquez Ramírez Copyright © 2020</span>
        </div>
    </footer>


    <script src="/CursoPHP/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>