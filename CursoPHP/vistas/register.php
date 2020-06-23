<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Web Register</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/CursoPHP/css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <section class="container-fluid bg">
        <section class="row justify-content-center">
            <section class="container-md">
                <form action="/CursoPHP/includes/newUser.php" method="POST">
                    <div class="form-container">
                        <h2>Registrate</h2>
                        <br>
                        <div class="form-group">
                            <label>Nombre: </label>
                            <input type="text" name="name" class="form-control" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Paterno: </label>
                            <input type="text" name="ap" class="form-control" placeholder="Ingresa tu apellido paterno" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido Materno: </label>
                            <input type="text" name="am" class="form-control" placeholder="Ingresa tu apellido materno" required>
                        </div>
                        <div class="form-group">
                            <label>Correo: </label>
                            <input type="email" name="correo" class="form-control" placeholder="Ingresa tu correo electronico" required>
                        </div>
                        <div class="form-group">
                            <label>Password: </label>
                            <input type="password" name="pass" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Crear cuenta</button>
                        <br>
                        <div class="alert alert-primary">
                            Inicia sesion <a href="/CursoPHP/index.php" class="alert-link">aquí.</a>
                        </div>
                    </div>

                </form>
            </section>
        </section>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>