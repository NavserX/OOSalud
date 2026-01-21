<?php

namespace App\Modelo;

use PDO;
use PDOException;

class PacienteModelo
{

    public static function ObtenerPaciente($id):array{
        try{
            $conexion=new \PDO("mysql:host=localhost;port=3306","alumno","alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
        $sql = "SELECT * FROM paciente WHERE id_paciente = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

}