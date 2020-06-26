<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaEscuelas extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaEscuela($idusuario)
    {
        $query = $this->connect()->prepare('SELECT * FROM escuelas WHERE IDUsuario = :idusuario');
        $arrayData = $query->execute(['idusuario' => $idusuario]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altaEscuela($idusuario, $nombreEscuela)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDEscuela) AS IDEscuela FROM escuelas');
        $data = $query->fetchAll();
        if ($data[0]->IDEscuela == "") {
            $query = $this->connect()->prepare('INSERT INTO escuelas VALUES (1, :idUsuario, :nombreEscuela)');
            $arrayData = $query->execute(['idUsuario' => $idusuario, 'nombreEscuela' => $nombreEscuela]);
            return $arrayData;
        }else {
            $idfinal = ((int) $data[0]->IDEscuela) + 1;

            try {
                $query = $this->connect()->prepare('INSERT INTO escuelas VALUES (:idescuela, :idusuario,  :nombreEscuela)');
                $arrayData = $query->execute(['idescuela' => $idfinal, 'idusuario' => $idusuario, 'nombreEscuela' => $nombreEscuela]);
                return $arrayData;
            } catch (\Throwable $th) {

            }
        }

    }

    public function eliminaEscuela($idusuario, $idescuela)
    {
        $query = $this->connect()->prepare('DELETE FROM escuelas WHERE IDUsuario = :idusario AND IDEscuela = :idescuela');
        $arrayData = $query->execute(['idusario' => $idusuario, 'idescuela' => $idescuela]);

        return $arrayData;
    }

    public function modificaEscuela($idescuela, $nombreEscuela)
    {
        $query = $this->connect()->prepare('UPDATE escuelas SET NombreEscuela = :nombrescuela WHERE IDEscuela = :idescuela');

        $arrayData = $query->execute(['nombrescuela' => $nombreEscuela, 'idescuela' => $idescuela]);

        return $arrayData;
    }
}
