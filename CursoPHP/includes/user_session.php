<?php

class UserSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentUser($Correo, $IDUsuario, $Nav){
        $_SESSION['Correo'] = $Correo;
        $_SESSION['IDUsuario'] = $IDUsuario;
        $_SESSION['Nav'] = $Nav;
    }

    public function getCurrentUser(){
        return $_SESSION['Correo'];
    }

    public function getCurrentID()
    {
        return $_SESSION['IDUsuario'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}
