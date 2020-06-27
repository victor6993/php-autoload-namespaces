<?php

namespace Upgrade;

class Profesor extends Persona {

  const IVA = 0.21;
  private $tarifa;
  private $horasTrabajadas;

  public function __construct(string $nombre, int $edad, float $tarifa)
  {
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->tarifa = $tarifa;
  }

  public function setHorasTrabajadas(int $horas) {
    $this->horasTrabajadas = $horas;
  } 

  public function calcularSalarioNeto():float {
    $salarioBruto = $this->tarifa * $this->horasTrabajadas;

    return  $salarioBruto / (1 + self::IVA);
  }
}