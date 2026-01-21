<?php

namespace App\Modelo;

use PDO;
use PDOException;

class PacienteModelo
{

    public static function ObtenerPaciente($id):array{
        try{
            $conexion = new \PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
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

    public static function obtenerTodos(): array
    {
        try {

            $conexion = new \PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM pacientes";
            $stmt = $conexion->query($sql);
            $pacientes = [];
            while ($fila = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $pacientes[] = new \App\Class\Paciente(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['numero_sip'],
                    $fila['fecha_nacimiento'],
                    $fila['alergias']
                );
            }

            return $pacientes;

        } catch (\PDOException $e) {
            die("Error en obtenerTodos: " . $e->getMessage());
        }
    }

}