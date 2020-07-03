<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Web Horarios</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c42e92f9a5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="/CursoPHP/css/estilos.css">
    <link rel="stylesheet" href="/CursoPHP/css/calendar.css">
</head>

<body onload="renderDate()">
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
            <a href="/CursoPHP/vistas/calendario/indexCalendar.php" class="active"><i class="fas fa-calendar-alt"></i> Calendario</a>
            <a href="/CursoPHP/vistas/notas/indexNotas.php"><i class="fas fa-sticky-note"></i> Notas</a>

        </nav>

        <main class="main">


            <?php

            if ($_SESSION['Nav'] == 1) {
                include_once '/xampp/htdocs/CursoPHP/includes/calendar/showCalendar.php';
            }

            ?>


        </main>
    </div>

    <footer class="card-footer">
        <div class="container">
            <span class="text-muted">Developed by David Velázquez Ramírez Copyright © 2020</span>
        </div>
    </footer>

    <script src="/CursoPHP/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="/CursoPHP/js/jquery.datetimepicker.full.min.js"></script>
    <script>
        var dt = new Date();

        function renderDate() {
            dt.setDate(1);
            var day = dt.getDay();
            var today = new Date();
            var endDate = new Date(
                dt.getFullYear(),
                dt.getMonth() + 1,
                0
            ).getDate();

            var prevDate = new Date(
                dt.getFullYear(),
                dt.getMonth(),
                0
            ).getDate();
            var months = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ]
            document.getElementById("month").innerHTML = months[dt.getMonth()];
            document.getElementById("date_str").innerHTML = dt.toDateString();
            var cells = "";
            for (x = day; x > 0; x--) {
                cells += "<div class='prev_date'>" + (prevDate - x + 1) + "</div>";
            }
            console.log(day);
            for (i = 1; i <= endDate; i++) {
                if (i == today.getDate() && dt.getMonth() == today.getMonth()) cells += "<div class='today'>" + i + "</div>";
                else
                    cells += "<div>" + i + "</div>";
            }
            document.getElementsByClassName("days")[0].innerHTML = cells;

        }

        function moveDate(para) {
            if (para == "prev") {
                dt.setMonth(dt.getMonth() - 1);
            } else if (para == 'next') {
                dt.setMonth(dt.getMonth() + 1);
            }
            renderDate();
        }
    </script>
</body>

</html>