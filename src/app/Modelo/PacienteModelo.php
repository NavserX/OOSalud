<?php

namespace App\Modelo;

use App\Class\Paciente;
use App\Controlador\PacienteControlador;
use PDO;
use PDOException;

class PacienteModelo
{

    /*public static function ObtenerPaciente($id):array{
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
        $paciente = Paciente::fromArray($resultado);
        return $resultado;
    }*/

    public static function ObtenerPacientes($id): ?Paciente{
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
        $sql = "SELECT * FROM pacientes WHERE id_paciente = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return self::fromArray($resultado);
    }

    public static function fromArray(array $datos):Paciente{
        $paciente = new Paciente($datos['id'], $datos['nombre'], $datos['numero_sip'], $datos['fecha_nacimiento'], $datos['alergias']);
        $paciente->setId($datos['id']);
        $paciente->setNombre($datos['nombre']);
        $paciente->setNumeroSip($datos['numero_sip']);
        $paciente->setFechaNacimiento($datos['fecha_nacimiento']);
        $paciente->setAlergias($datos['alergias']);
        return $paciente;
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

    /*/public function buscarPaciente(int $id): ?Paciente
    {
        for ($i = 0; $i < count($this->pacientes); $i++) {
            if ($this->pacientes[$i]->getId() === $id) {
                return $this->pacientes[$i];
            }
        }
        return null;
    }*/

    public static function buscarPaciente(int $id): ?Paciente
    {
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM pacientes WHERE id_paciente = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$resultado) {
                return null;

            }
            return self::fromArray($resultado);

        }
        catch (PDOException $e) {
            die("Error en buscarPaciente: " . $e->getMessage());
        }

    }
}