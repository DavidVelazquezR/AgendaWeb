<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaMaterias extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaMateria($idsemestre)
    {
        $query = $this->connect()->prepare('SELECT * FROM materias WHERE IDSemestre = :idsemestre');
        $arrayData = $query->execute(['idsemestre' => $idsemestre]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altaMateria($idsemestre, $nombreMat)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDMateria) AS IDMateria FROM materias');
        $data = $query->fetchAll();

        if ($data[0]->IDMateria == "") {
            $query = $this->connect()->prepare('INSERT INTO materias VALUES (1, :idsemestre, :nombremateria)');
            $arrayData = $query->execute(
                [
                    'idsemestre' => $idsemestre,
                    'nombremateria' => $nombreMat
                ]
            );
            return $arrayData;
        } else {
            $idfinal = ((int) $data[0]->IDMateria) + 1;

            try {
                $query = $this->connect()->prepare('INSERT INTO materias VALUES (:idmateria, :idsemestre, :nombremateria)');
                $arrayData = $query->execute(
                    [
                        'idmateria' => $idfinal,
                        'idsemestre' => $idsemestre,
                        'nombremateria' => $nombreMat
                    ]
                );
                return $arrayData;
            } catch (\Throwable $th) {
            }
        }
    }

    public function eliminaMaterias($idmat, $idsemestre)
    {
        $query = $this->connect()->prepare('DELETE FROM materias WHERE IDSemestre = :idsemestre AND IDMateria = :idmat');
        $arrayData = $query->execute(['idsemestre' => $idsemestre, 'idmat' => $idmat]);

        return $arrayData;
    }

    public function modificaMaterias($idmateria, $nomMat)
    {
        $query = $this->connect()->prepare('UPDATE materias SET NombreMateria = :nameMat WHERE IDMateria = :idmat');

        $arrayData = $query->execute(
            [
                'nameMat' => $nomMat,
                'idmat' => $idmateria
            ]
        );

        return $arrayData;
    }
}
