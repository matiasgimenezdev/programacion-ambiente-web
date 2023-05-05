<?php
namespace PAW\App\Models\Turno;

use PAW\App\Models\Turno\Turno;

class TurnosCollection
{

  private $turnos = [
    [
      "id" => 1,
      "paciente" => "",
      "profesional" => "Marcos Gutierrez",
      "especialidad" => "Odontología",
      "fecha" => "2024-03-22",
      "hora" => "19:00",
    ],
    [
      "id" => 2,
      "paciente" => "",
      "profesional" => "Alfredo Montes",
      "especialidad" => "Oculista",
      "fecha" => "2024-03-22",
      "hora" => "15:00",
    ]
  ];

  public function getAll()
  {
    $turnosCollection = [];
    foreach ($this->turnos as $turno) {
      $turnoInstance = new Turno;
      $turnoInstance->set($turno);
      $turnosCollection[] = $turnoInstance;
    }
    return $turnosCollection;
  }

  public function getOne($id)
  {
    $turnoInstance = new Turno;
    $ids = array_column($this->turnos, 'id');
    $index = array_search($id, $ids);
    $turnoInstance->set($this->turnos[$index]);
    return $turnoInstance;
  }

  public function solicitarTurno($shiftData)
  {
    $turnoInstance = new Turno;
    $registerStatus = $turnoInstance->registrarTurno($shiftData);
    return $registerStatus;
  }

}

?>