<?php

namespace App\Controlador;

use App\Modelo\PacienteModelo;

class PacienteControlador
{
    public function show(int $id)
    {
        //return PacienteModelo::obtenerPaciente($id);
        $paciente = PacienteModelo::ObtenerPaciente($id);
        return json_encode([
            "msg"=>"Datos encontrados correctamente",
            "data"=>$paciente
        ]);

        Class Paciente implements \JsonSerializable{

            public function jsonSerialize(): mixed {
                return[
                    "nombre"=>$this->name
                ];
            }
        }
    }

    public function create(array $datos): bool
    {
        return PacienteModelo::crearPaciente($datos);
    }

    public function delete(int $id): bool
    {
        return PacienteModelo::eliminarPaciente($id);
    }

    public function listar(){
        $pacientes = \App\Modelo\PacienteModelo::obtenerTodos();
        require_once __DIR__. '/../View/principal.php';
    }

}