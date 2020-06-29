<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaSemestre extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaSemestre($idescuela)
    {
        $query = $this->connect()->prepare('SELECT * FROM semestre WHERE IDEscuela = :idescuela');
        $arrayData = $query->execute(['idescuela' => $idescuela]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altaSemestre($idescuela, $nombreSemestre)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDSemestre) AS IDSemestre FROM semestre');
        $data = $query->fetchAll();

        if ($data[0]->IDSemestre == "") {
            $query = $this->connect()->prepare('INSERT INTO semestre VALUES (1, :idescuela, :nombresemestre)');
            $arrayData = $query->execute(['idescuela' => $idescuela, 'nombresemestre' => $nombreSemestre]);
            return $arrayData;
        }else {
            $idfinal = ((int) $data[0]->IDSemestre) + 1;

            try {
                $query = $this->connect()->prepare('INSERT INTO semestre VALUES (:idsemestre, :idescuela,  :nombresemestre)');
                $arrayData = $query->execute(['idsemestre' => $idfinal, 'idescuela' => $idescuela, 'nombresemestre' => $nombreSemestre]);
                return $arrayData;
            } catch (\Throwable $th) {

            }
        }

    }

    public function eliminaSemestre($idescuela, $idsemestre)
    {
        $query = $this->connect()->prepare('DELETE FROM semestre WHERE IDSemestre = :idsemestre AND IDEscuela = :idescuela');
        $arrayData = $query->execute(['idsemestre' => $idsemestre, 'idescuela' => $idescuela]);

        return $arrayData;
    }
}
