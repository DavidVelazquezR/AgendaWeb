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


    public function altaHorario($idmateria, $idprofesor, $dia, $he, $hs)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDHorario) AS IDHorario FROM horarios');
        $data = $query->fetchAll();

        if ($data[0]->IDHorario == "") {
            $query = $this->connect()->prepare('INSERT INTO horarios VALUES (1, :idmat, :idpro, :dia, :he, :hs)');
            $arrayData = $query->execute([
                'idmat' => $idmateria,
                'idpro' => $idprofesor,
                'dia' => $dia,
                'he' => $he,
                'hs' => $hs,
            ]);
            return $arrayData;
        } else {
            $idfinal = ((int) $data[0]->IDHorario) + 1;

            try {
                $query = $this->connect()->prepare('INSERT INTO horarios VALUES (:idhor, :idmat, :idpro, :dia, :he, :hs)');
                $arrayData = $query->execute([
                    'idhor' => $idfinal,
                    'idmat' => $idmateria,
                    'idpro' => $idprofesor,
                    'dia' => $dia,
                    'he' => $he,
                    'hs' => $hs,
                ]);
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
        $query = $this->connect()->prepare('DELETE FROM horarios WHERE IDHorario = :idhorario AND IDMateria = :idmateria');
        $arrayData = $query->execute(['idhorario' => $idhorario, 'idmateria' => $idmateria]);

        return $arrayData;
    }

    public function eliminaHorario($idhorario)
    {
        $query = $this->connect()->prepare('DELETE FROM horarios WHERE IDHorario = :idhorario');
        $arrayData = $query->execute(['idhorario' => $idhorario]);

        return $arrayData;
    }


    public function modificaHorario($idusuario, $nombreEscuela)
    {
    }
}
