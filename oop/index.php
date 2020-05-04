<?php

namespace Upgrade;
require 'vendor/autoload.php';


$alumno = new Alumno("Francesco", 24);
// $alumno->addAsignaturas("PHP");
// $alumno->addAsignaturas("Javascript");
$alumno->addAsignaturas("PHP","Lenguaje de backend","Kiko",100);
$alumno->addAsignaturas("HTML-CSS","Lenguajes de frontend","Jose Manuel",120);

// echo "El alumno {$alumno->getNombre()} tiene {$alumno->getEdad()} años y estudia {$alumno->asignaturas[0]->getNombreAsignatura()} y {$alumno->asignaturas[1]->getNombreAsignatura()}.<br>";

echo "El alumno {$alumno->getNombre()} tiene {$alumno->getEdad()} años y estudia {$alumno->getAsignaturas()}.<br>";


$profesor = new Profesor("Kiko", 36, 20);
$profesor->setHorasTrabajadas(80);

echo "El profesor {$profesor->getNombre()} tiene {$profesor->getEdad()} años y gana ".round($profesor->calcularSalarioNeto(), 2)." euros mensuales netos.";
