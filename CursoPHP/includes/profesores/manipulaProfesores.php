<?php

include_once '/xampp/htdocs/CursoPHP/includes/db.php';

class manipulaProfesores extends DB
{
    /*private IDEscuela;
        private IDUsuario;
        private NombreEscuela;*/

    public function consultaProfesor($idsemestre)
    {
        $query = $this->connect()->prepare('SELECT * FROM profesores WHERE IDSemestre = :idsemestre');
        $arrayData = $query->execute(['idsemestre' => $idsemestre]);

        $arrayData = $query->fetchAll();

        return $arrayData;
    }

    public function altaProfesor($idsemestre, $nomP, $apP, $amP, $telP, $emailP)
    {
        $idfinal = 0;
        $query = $this->connect()->query('SELECT MAX(IDProfesor) AS IDProfesor FROM profesores');
        $data = $query->fetchAll();

        if ($data[0]->IDProfesor == "") {
            $query = $this->connect()->prepare('INSERT INTO profesores VALUES (1, :idsemestre, :nombreP, :apP, :amP, :telefono, :email)');
            $arrayData = $query->execute([
                'idsemestre' => $idsemestre,
                'nombreP' => $nomP,
                'apP' => $apP,
                'amP' => $amP,
                'telefono' => $telP,
                'email' => $emailP
            ]);
            return $arrayData;
        } else {
            $idfinal = ((int) $data[0]->IDProfesor) + 1;

            try {
                $query = $this->connect()->prepare('INSERT INTO profesores VALUES (:idprofe, :idsemestre, :nombreP, :apP, :amP, :telefono, :email)');
                $arrayData = $query->execute([
                    'idprofe' => $idfinal,
                    'idsemestre' => $idsemestre,
                    'nombreP' => $nomP,
                    'apP' => $apP,
                    'amP' => $amP,
                    'telefono' => $telP,
                    'email' => $emailP
                ]);
                return $arrayData;
            } catch (\Throwable $th) {
            }
        }
    }

    public function eliminaProfesores($idprofe, $idsemestre)
    {
        $query = $this->connect()->prepare('DELETE FROM profesores WHERE IDSemestre = :idsemestre AND IDProfesor = :idprofe');
        $arrayData = $query->execute(['idsemestre' => $idsemestre, 'idprofe' => $idprofe]);

        return $arrayData;
    }

    public function modificaProfesores($idprofesor, $nomP, $apP, $amP, $tel, $emailP)
    {
        $query = $this->connect()->prepare('UPDATE profesores SET NombreP = :nameprof, ApellidoPaternoP = :app, ApellidoMaternoP = :amp, Telefono = :tel, Email = :email WHERE IDProfesor = :idprofe');

        $arrayData = $query->execute(
            [
                'nameprof' => $nomP,
                'app' => $apP,
                'amp' => $amP,
                'tel' => $tel,
                'email' => $emailP,
                'idprofe' => $idprofesor
            ]
        );

        return $arrayData;
    }
}
