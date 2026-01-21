<?php

namespace App\Controlador;

class PacienteControlador
{
    public function show($id){

    }

    public function listar(){
        $pacientes = \App\Modelo\PacienteModelo::obtenerTodos();
        require_once __DIR__. '/../View/principal.php';
    }

}