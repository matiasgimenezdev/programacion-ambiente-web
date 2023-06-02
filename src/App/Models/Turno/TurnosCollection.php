<?php
namespace PAW\App\Models\Turno;

use PAW\App\Models\Turno\Turno;
use PAW\Core\Model;

class TurnosCollection extends Model
{

  private $table = "turno";

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
    $turnoInstance -> setQueryBuilder($this -> queryBuilder);
    $registerStatus = $turnoInstance->registrarTurno($shiftData);
    return $registerStatus;
  }

  public function cancelarTurno($id)
  {
    $turnoInstance = $this -> getOne($id);
    $cancelStatus = $turnoInstance -> cancelarTurno();
    return $cancelStatus;
  }

  public function getTurnos(){
    $turnos = $this->queryBuilder->select($this->table);
    $json = json_encode($turnos);
    header("Content-Type: application/json");
    echo $json;
  }

  public function getJoinTurnos($table2, $table3){
    $turnosProfesional = $this->queryBuilder->join($this->table, 'profesional', $table3, 'matricula', 'turno.id_turno, turno.fecha_turno, turno.hora_turno, turno.especialidad, profesional.name as profesional_name, profesional.lastname as profesional_lastname');
    $json = json_encode($turnosProfesional);
    header("Content-Type: application/json");
    echo $json;
  }

}

?>