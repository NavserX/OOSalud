<?php

namespace App\Class;

use App\Enum\TipoIntervencion;
use DateTime;

class Intervencion
{
    private DateTime $fIntervencion;
    private string $descripcion;
    private float $coste;
    private TipoIntervencion $tipo;

    /**
     * @param DateTime $fIntervencion
     */
    public function __construct(DateTime $fIntervencion)
    {
        $this->fIntervencion = $fIntervencion;
        $this->descripcion = '';
        $this->coste = 0.0;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): Intervencion
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getFIntervencion(): DateTime
    {
        return $this->fIntervencion;
    }

    public function setFIntervencion(DateTime $fIntervencion): Intervencion
    {
        $this->fIntervencion = $fIntervencion;
        return $this;
    }

    public function getCoste(): float
    {
        return $this->coste;
    }

    public function setCoste(float $coste): Intervencion
    {
        $this->coste = $coste;
        return $this;
    }

    public function getTipo(): TipoIntervencion
    {
        return $this->tipo;
    }

    public function setTipo(TipoIntervencion $tipo): Intervencion
    {
        $this->tipo = $tipo;
        return $this;
    }


}