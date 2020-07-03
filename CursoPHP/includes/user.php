<?php
include 'db.php';

class User extends DB
{
    private $idusuario;
    private $nombre;
    private $correo;
    private $navigation;


    public function userExists($correo, $pass)
    {
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM users WHERE Correo = :correo AND Pass = :pass');
        $query->execute(['correo' => $correo, 'pass' => $pass]);

        if ($query->rowCount()) {
            return true;
        } else {
            return false;
        }
    }

    public function setUser($correo, $nav)
    {
        $query = $this->connect()->prepare('SELECT * FROM users WHERE Correo = :correo');
        $query->execute(['correo' => $correo]);
        $arrayWithAll = $query->fetch(PDO::FETCH_BOTH);


        //vacia del array de objetos los datos de las columnas consultadas
        $this->idusuario = $arrayWithAll[0];
        $this->nombre = $arrayWithAll[1];
        $this->correo = $arrayWithAll[4];
        $this->navigation = $nav;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getIDUsuario()
    {
        return $this->idusuario;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNavigation()
    {
        return $this->navigation;
    }
}
