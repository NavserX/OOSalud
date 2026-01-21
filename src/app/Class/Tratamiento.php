<?php

namespace App\Class;

class Tratamiento
{
    private array $medicamentos = [];
    private int $id;
    private string $codigo_tratamiento;
    private string $diagnostico;
    private int $duracion_dias;
    private int $paciente_id;

    /**
     * @param array $medicamentos
     * @param int $id
     * @param string $codigo_tratamiento
     * @param string $diagnostico
     * @param int $duracion_dias
     * @param int $paciente_id
     */
    public function __construct(array $medicamentos, int $id, string $codigo_tratamiento, string $diagnostico, int $duracion_dias, int $paciente_id)
    {
        $this->medicamentos = $medicamentos;
        $this->id = $id;
        $this->codigo_tratamiento = $codigo_tratamiento;
        $this->diagnostico = $diagnostico;
        $this->duracion_dias = $duracion_dias;
        $this->paciente_id = $paciente_id;
    }

    public function getMedicamentos(): array
    {
        return $this->medicamentos;
    }

    public function setMedicamentos(array $medicamentos): Tratamiento
    {
        $this->medicamentos = $medicamentos;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Tratamiento
    {
        $this->id = $id;
        return $this;
    }

    public function getCodigoTratamiento(): string
    {
        return $this->codigo_tratamiento;
    }

    public function setCodigoTratamiento(string $codigo_tratamiento): Tratamiento
    {
        $this->codigo_tratamiento = $codigo_tratamiento;
        return $this;
    }

    public function getDiagnostico(): string
    {
        return $this->diagnostico;
    }

    public function setDiagnostico(string $diagnostico): Tratamiento
    {
        $this->diagnostico = $diagnostico;
        return $this;
    }

    public function getDuracionDias(): int
    {
        return $this->duracion_dias;
    }

    public function setDuracionDias(int $duracion_dias): Tratamiento
    {
        $this->duracion_dias = $duracion_dias;
        return $this;
    }

    public function getPacienteId(): int
    {
        return $this->paciente_id;
    }

    public function setPacienteId(int $paciente_id): Tratamiento
    {
        $this->paciente_id = $paciente_id;
        return $this;
    }


}