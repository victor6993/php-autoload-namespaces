<?php

namespace Upgrade;

class Alumno extends Persona{

  public $asignaturas;

  public function __construct(string $nombre, int $edad)
  {
    $this->nombre = $nombre;
    $this->edad = $edad;
  }

  public function addAsignaturas(string $nombreAsignatura, string $descripcion, string $profesor, int $horas) {
    $this->asignaturas[] = new Asignatura($nombreAsignatura, $descripcion, $profesor, $horas);
  }

  public function getAsignaturas(){
    $todasLasAsignaturas = [];
    foreach($this->asignaturas as $asignatura) {
      $todasLasAsignaturas[] = $asignatura->getNombreAsignatura();
    }

    return implode(", ", $todasLasAsignaturas);
  }
}