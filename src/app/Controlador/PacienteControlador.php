<?php

namespace App\Controlador;

use App\Class\Paciente;
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

    }

    public function create(){
        return include_once "app/View/insertarPaciente.php";
    }


    public function store(): bool
    {
        var_dump($_POST);

        $paciente = Paciente::fromArray($_POST);
        var_dump($paciente);

        return PacienteModelo::crearPaciente($paciente);
    }

    public function update(int $id){

        $paciente = PacienteModelo::buscarPaciente($id);
        $put = json_decode(file_get_contents("php://input"),true);

        $paciente->setNumeroSip($put["numeroSip"]??$paciente->getSip());
        $paciente->setNombre($put["nombre"]??$paciente->getNombre());
        $paciente->setAlergias($put["alergias"]??$paciente->getAlergias());

        if (isset($put["fechaNacimiento"])){
            \DateTime::createFromFormat('d/m/Y', $put["fechaNacimiento"]);
        }

        PacienteModelo::modificarPaciente($paciente);
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