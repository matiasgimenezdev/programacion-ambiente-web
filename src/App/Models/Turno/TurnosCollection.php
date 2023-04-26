<?php
namespace PAW\App\Models\Turno;

use PAW\App\Models\Turno\Turno;

class TurnosCollection
{

  public function getAll()
  {
    $turnos = [
      [
        "id" => 1,
        "paciente" => "",
        "profesional" => "Marcos Gutierrez",
        "especialidad" => "Odontología",
        "fecha" => "22/03/2023",
        "hora" => "19:00",
      ],
      [
        "id" => 2,
        "paciente" => "",
        "profesional" => "Alfredo Montes",
        "especialidad" => "Oculista",
        "fecha" => "25/03/2023",
        "hora" => "15:00",
      ]
    ];
    $turnosCollection = [];
    foreach ($turnos as $turno) {
      $turnoInstance = new Turno;
      $turnoInstance->set($turno);
      $turnosCollection[] = $turnoInstance;
    }
    return $turnosCollection;
  }
}

?>