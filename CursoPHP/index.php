<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['Correo'])) {
  //echo "hay sesion";
  $userSession->setCurrentUser($_SESSION['Correo'], $_SESSION['IDUsuario'], 1);
  include_once 'vistas/home.php';

  $user->setUser($userSession->getCurrentUser(), 1);
  $correoUser = $user->getCorreo();

  echo "<script> 
        let timerInterval
Swal.fire({
  position: 'top-end',
  title: 'Verificando...',
  html: 'Se duplico/recargo tu sesion.',
  timer: 500,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
        </script>";
} else if (isset($_POST['correo']) && isset($_POST['password'])) {

  $userForm = $_POST['correo'];
  $passForm = $_POST['password'];
  $nav = 1;

  $user = new User();
  if ($user->userExists($userForm, $passForm)) {
    //echo "Existe el usuario";
    $user->setUser($userForm, $nav);

    (string) $correoUser = $user->getCorreo();
    (string) $idUsuario = $user->getIDUsuario();

    $userSession->setCurrentUser($correoUser, $idUsuario, 1);

    include_once 'vistas/home.php';

    echo "<script> 
        Swal.fire(
        'Felicidades!',
        'Accediste como: $correoUser',
        'success'
        )
        </script>";
  } else {
    //echo "No existe el usuario";
    include_once 'vistas/login.php';
    echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Error...',
        text: 'Nombre de usuario y/o password incorrecto',
        })
        </script>";
  }
} else {
  //echo "login";
  $userSession->closeSession();
  include_once 'vistas/login.php';
  echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Upss...',
        text: 'No hay sesion activa',
        })
        </script>";
}
