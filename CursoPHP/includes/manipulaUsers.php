<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaUser extends DB
{

    public function createUser($name, $ap, $am, $correo, $pass)
    {
        $idfinal = 0;
        $passFinal = md5($pass);
        $query = $this->connect()->query('SELECT MAX(IDUsuario) as IDUsuario FROM users');

        $data = $query->fetchAll();

        
        if ($data[0]->IDUsuario == "") {
            $query = $this->connect()->prepare(
                'INSERT INTO users VALUES(
                1,
                :nombre,
                :apellidoP,
                :apellidoM,
                :correo,
                :pass,
                1)'
            );

            $query->execute([
                'nombre' => $name,
                'apellidoP' => $ap,
                'apellidoM' => $am,
                'correo' => $correo,
                'pass' => $pass,
            ]);
        } else {
            $idfinal = ($data[0]->IDUsuario) + 1;

            $query = $this->connect()->prepare(
                'INSERT INTO users VALUES(
                :idFinal,
                :nombre,
                :apellidoP,
                :apellidoM,
                :correo,
                :pass,
                1)'
            );

            $query->execute([
                'idFinal' => $idfinal,
                'nombre' => $name,
                'apellidoP' => $ap,
                'apellidoM' => $am,
                'correo' => $correo,
                'pass' => $pass,
            ]);
        }


        return true;
    }

    public function verificaCorreo($correo)
    {
        $query = $this->connect()->prepare('SELECT * FROM users WHERE Correo = :correo');
        $query->execute(['correo' => $correo]);
        $data = $query->fetchAll();

        return $data;
    }
}
