<?php

namespace App\Class;

class Medicamento
{
    private int $id;
    private string $nombre_comercial;
    private string $principio_activo;
    private float $precio;

    /**
     * @param int $id
     * @param string $nombre_comercial
     * @param string $principio_activo
     * @param float $precio
     */
    public function __construct(int $id, string $nombre_comercial, string $principio_activo, float $precio)
    {
        $this->id = $id;
        $this->nombre_comercial = $nombre_comercial;
        $this->principio_activo = $principio_activo;
        $this->precio = $precio;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Medicamento
    {
        $this->id = $id;
        return $this;
    }

    public function getNombreComercial(): string
    {
        return $this->nombre_comercial;
    }

    public function setNombreComercial(string $nombre_comercial): Medicamento
    {
        $this->nombre_comercial = $nombre_comercial;
        return $this;
    }

    public function getPrincipioActivo(): string
    {
        return $this->principio_activo;
    }

    public function setPrincipioActivo(string $principio_activo): Medicamento
    {
        $this->principio_activo = $principio_activo;
        return $this;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): Medicamento
    {
        $this->precio = $precio;
        return $this;
    }


}