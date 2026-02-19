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

    public static function nextIdPaciente(): int{
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        }
        catch (PDOException $e) {
            die("Error en buscarPaciente: " . $e->getMessage());
        }

        $sql = "SELECT max(id)+1 FROM pacientes";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_NUM);

        return $resultado[0];

    }

    public static function crearPaciente(Paciente $paciente):bool{

        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
        $sql = "INSERT INTO pacientes VALUES (:id, :nombre, :numero_sip, STR_TO_DATE(:fecha_nacimiento,'%Y-%c-%d'), :alergias)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(":id",$paciente->getId());
        $stmt->bindValue(":nombre",$paciente->getNombre());
        $stmt->bindValue(":numero_sip",$paciente->getSip());
        $stmt->bindValue(":fecha_nacimiento",$paciente->getFechaNacimiento()->format('Y-m-d'));
        $stmt->bindValue(":alergias",$paciente->getAlergias());
        $stmt->execute();

        if($stmt->rowCount()>0){
            return true;
        }else {
            return false;
        }
    }

    public static function modificarPaciente(?Paciente $paciente)
    {
        try{
            $conexion = new PDO("mysql:host=mariadb;dbname=examen", "alumno", "alumno");
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
        $sql = "UPDATE paciente set nombre=:nombre, numero_sip=:numero_sip, fecha_nacimiento=STR_TO_DATE(:fecha_nacimiento,'%Y-%c-%d'), alergias=:alergias WHERE id=:id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(":id",$paciente->getId());
        $stmt->bindValue(":nombre",$paciente->getNombre());
        $stmt->bindValue(":numero_sip",$paciente->getSip());
        $stmt->bindValue(":fecha_nacimiento",$paciente->getFechaNacimiento()->format('Y-m-d'));
        $stmt->bindValue(":alergias",$paciente->getAlergias());
        $stmt->execute();

        if($stmt->rowCount()>0){
            return true;
        }else {
            return false;
        }
    }
}