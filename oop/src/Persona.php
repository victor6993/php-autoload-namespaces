<?php

namespace Upgrade;

class Persona {

  protected string $nombre;
  protected $edad;

   public function getNombre()
  {
    return $this->nombre;
  }

   public function getEdad()
  {
    return $this->edad;
  }
} 