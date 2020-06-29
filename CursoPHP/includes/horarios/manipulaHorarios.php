<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaHorarios extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaHorarioP($idprofesor)
    {
        $query = $this->connect()->prepare('SELECT * FROM horarios WHERE IDProfesor = :idprofesor');
        $arrayData = $query->execute(['idprofesor' => $idprofesor]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function consultaHorarioM($idmateria)
    {
        $query = $this->connect()->prepare('SELECT * FROM horarios WHERE IDMateria = :idmateria');
        $arrayData = $query->execute(['idmateria' => $idmateria]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altahorario($idescuela, $idsemestre, $nombreSemestre)
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

    public function eliminaHorarioProf($idprofe, $idhorario)
    {
        $query = $this->connect()->prepare('DELETE FROM horarios WHERE IDHorario = :idhorario AND IDProfesor = :idprofe');
        $arrayData = $query->execute(['idhorario' => $idhorario, 'idprofe' => $idprofe]);

        return $arrayData;
    }

    public function eliminaHorarioMat($idmateria, $idhorario)
    {
        $query = $this->connect()->prepare('DELETE FROM profesores WHERE IDHorario = :idhorario AND IDMateria = :idmateria');
        $arrayData = $query->execute(['idhorario' => $idhorario, 'idmateria' => $idmateria]);

        return $arrayData;
    }

    public function modificaHorario($idusuario, $nombreEscuela)
    {
        
    }
}
