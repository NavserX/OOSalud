<?php

namespace App\Class;

use DateTime;

class Paciente
{
    /*private string $SIP;
    private string $nombre;
    private string $peso;
    private array $historial;
    private DateTime $fecha;

    public function __construct(string $SIP, string $nombre){
        $this->SIP = $SIP;
        $this->nombre = $nombre;
        $this->peso = 0;
        $this->historial = [];
        $this->fecha = new DateTime();
    }

    public function getSIP(): string
    {
        return $this->SIP;
    }

    public function setSIP(string $SIP): Paciente
    {
        $this->SIP = $SIP;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Paciente
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPeso(): string
    {
        return $this->peso;
    }

    public function setPeso(string $peso): Paciente
    {
        $this->peso = $peso;
        return $this;
    }

    public function getHistorial(): array
    {
        return $this->historial;
    }

    public function setHistorial(array $historial): Paciente
    {
        $this->historial = $historial;
        return $this;
    }

    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    public function setFecha(DateTime $fecha): Paciente
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function addIntervencion(Intervencion $intervencion): Paciente{
        $this->historial[] = $intervencion;
        return $this;
    }

    public function calcularCoste(): float{
        $coste = 0;
        foreach($this->historial as $intervecion){
            $coste += $intervecion->getCoste();
        }
        return $coste;
    }

    public static function pacienteFromArray(array $array): Paciente{
        $paciente = new Paciente();
        $paciente->setSIP($array['SIP']);
        $paciente->setNombre($array['NOMBRE']);
        $paciente->setPeso($array['PESO']);
        $paciente->setHistorial($array['HISTORIAL']);
        $paciente->setFecha(new DateTime($array['FECHA']));
        return $paciente;
    }

*/
    private int $id;
    private string $nombre;
    private string $numero_sip;
    private string $fecha_nacimiento;
    private string $alergias;

    /**
     * @param int $id
     * @param string $nombre
     * @param string $numero_sip
     * @param string $fecha_nacimiento
     * @param string $alergias
     */
    public function __construct(int $id, string $nombre, string $numero_sip, string $fecha_nacimiento, string $alergias)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->numero_sip = $numero_sip;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->alergias = $alergias;
    }


    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getSip(): string {
        return $this->numero_sip;
    }

    public function getFechaNacimiento(): string {
        return $this->fecha_nacimiento;
    }

    public function getAlergias(): ?string {
        return $this->alergias;
    }

}