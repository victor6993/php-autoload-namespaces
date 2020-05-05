<?php

namespace Upgrade;

class Asignatura {
  private $nombreAsignatura;
  private $descripcion;
  private $profesor;
  private $horas;

  public function __construct(string $nombreAsignatura, string $descripcion, string $profesor, int $horas)
  {
    $this->nombreAsignatura = $nombreAsignatura;
    $this->descripcion = $descripcion;
    $this->profesor = $profesor;
    $this->horas = $horas;
  }

  public function getNombreAsignatura():string {
    return $this->nombreAsignatura;
  }

  public function getDescripcion():string {
    return $this->descripcion;
  }

  public function getProfesor():string {
    return $this->profesor;
  }

  public function getHoras():int {
    return $this->horas;
  }
}