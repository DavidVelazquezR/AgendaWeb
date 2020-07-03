<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaNotas extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaNotas($idusuario)
    {
        $query = $this->connect()->prepare('SELECT * FROM notas WHERE IDUsuario = :idusuario');
        $arrayData = $query->execute(['idusuario' => $idusuario]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altaNotas($idusuario, $title, $desc)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDNotas) AS IDNotas FROM notas');
        $data = $query->fetchAll();
        if ($data[0]->IDNotas == "") {
            $query = $this->connect()->prepare('INSERT INTO notas VALUES (1, :idUsuario, :title, :descr)');
            $arrayData = $query->execute(
                [
                    'idUsuario' => $idusuario,
                    'title' => $title,
                    'descr' => $desc
                ]
            );
            return $arrayData;
        } else {
            $idfinal = ((int) $data[0]->IDNotas) + 1;

            try {
                $query = $this->connect()->prepare('INSERT INTO notas VALUES (:idnota, :idUsuario, :title, :descr)');
                $arrayData = $query->execute(
                    [
                        'idnota' => $idfinal,
                        'idUsuario' => $idusuario,
                        'title' => $title,
                        'descr' => $desc
                    ]
                );
                return $arrayData;
            } catch (\Throwable $th) {
            }
        }
    }

    public function eliminaNotas($idusuario, $idnota)
    {
        try {
            $query = $this->connect()->prepare('DELETE FROM notas WHERE IDUsuario = :idusario AND IDNotas = :idnotas');
            $arrayData = $query->execute(['idusario' => $idusuario, 'idnotas' => $idnota]);

        } catch (\Throwable $th) {
            //throw $th;
        }
        
        return $arrayData;
    }

}
