<?php
include_once '/xampp/htdocs/CursoPHP/includes/user.php';
include_once '/xampp/htdocs/CursoPHP/includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['Correo'])) {
  //echo "hay sesion";
  $userSession->setCurrentUser($_SESSION['Correo'], $_SESSION['IDUsuario'], 1);
  include_once '/xampp/htdocs/CursoPHP/vistas/semestres/semestresHome.php';

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

} else {
  //echo "login";
  $userSession->closeSession();
  include_once '../../index.php';
  echo "<script> 
        Swal.fire({
        icon: 'error',
        title: 'Upss...',
        text: 'No hay sesion activa',
        })
        </script>";
}
