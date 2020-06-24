<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaProfesores extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaProfesor($idsemestre)
    {
        $query = $this->connect()->prepare('SELECT IDSemestre, NombreSemestre FROM semestre WHERE IDSemestre = :idsemestre');
        $arrayData = $query->execute(['idsemestre' => $idsemestre]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altaProfesor($idescuela, $idsemestre, $nombreSemestre)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDSemestre) AS IDSemestre FROM semestre');
        $data = $query->fetchAll();

        if ($data[0]->IDSemestre == "") {
            $query = $this->connect()->prepare('INSERT INTO semestre VALUES (1, :idsemestre, :nombresemestre)');
            $arrayData = $query->execute(['idsemestre' => $idsemestre, 'nombresemestre' => $nombreSemestre]);
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

    public function modificaEscuela($idusuario, $nombreEscuela)
    {
        
    }
}
