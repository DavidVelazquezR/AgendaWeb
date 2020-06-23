<?php

include_once 'db.php';

class manipulaUser extends DB
{
    private $idu;
    private $nombre;
    private $apellidoM;
    private $apellidoP;
    private $correo;
    private $pass;
    private $rol;
    private $cadenaValida;

    public function createUser($correo)
    {
        //Relizo la preparacion de mi query utilizando PDO
        $query = $this->connect()->prepare('SELECT Correo FROM users WHERE Correo = :correo');
        $query->execute(['correo' => $correo]);
        //Guardo el obj PDO en cadenaValida
        $this->cadenaValida = $query->fetch();

        //si el resultado retorna true no inserta, de lo contrario inserta
        if (!$this->cadenaValida == null || !$this->cadenaValida == " ") {
            //El usuario ya existe, hay que retornar mensaje de lo que paso
            return $resultado = true;
        }else
        {
            //El correo buscado no existe, hay que insertar en tabla users
            //Obtenemos el ultimo valor de ID de usuario para agregar al nuevo
            $idTemp = $this->connect()->query('SELECT MAX(IDUsuario) FROM users');
            
            $a = $idTemp->fetch(PDO::FETCH_BOTH);

            $this->idu = $a[0];

            $this->idu = (int) $this->idu + 1;
            $this->nombre = $_POST['name'];
            $this->apellidoP = $_POST['ap'];
            $this->apellidoM = $_POST['am'];
            $this->correo = $_POST['correo'];
            $this->pass = md5($_POST['pass']);
            $this->rol = 1;

            $query = $this->connect()->prepare(
                'INSERT INTO users VALUES(
                :idTemp,
                :nombre,
                :apellidoP,
                :apellidoM,
                :correo,
                :pass,
                :rol)'
                );

            $query->execute([
                'idTemp' => $this->idu,
                'nombre' => $this->nombre,
                'apellidoP' => $this->apellidoP,
                'apellidoM' => $this->apellidoM,
                'correo' => $this->correo,
                'pass' => $this->pass,
                'rol' => $this->rol]);

            return $resultado = false;
        }
    }
}
