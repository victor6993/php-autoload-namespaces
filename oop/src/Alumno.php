<?php

namespace Upgrade;

class Alumno extends Persona{

  private $asignaturas;

  public function __construct(string $nombre, int $edad)
  {
    $this->nombre = $nombre;
    $this->edad = $edad;
  }

  public function addAsignaturas($asignatura) {
    $this->asignaturas[] = $asignatura;
  }

  public function getAsignaturas(){
    return implode(", ", $this->asignaturas);
  }
}