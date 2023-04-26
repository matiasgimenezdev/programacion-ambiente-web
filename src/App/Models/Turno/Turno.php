<?php
namespace PAW\App\Models\Turno;


class Turno
{
  private $fields = [
    "id" => null,
    "paciente" => null,
    "profesional" => null,
    "especialidad" => null,
    "fecha" => null,
    "hora" => null
  ];

  public function setId($id)
  {
    $this->fields["id"] = $id;
  }

  public function setPaciente($paciente)
  {
    $this->fields["paciente"] = $paciente;
  }

  public function setEspecialidad($especialidad)
  {
    $this->fields["especialidad"] = $especialidad;
  }

  public function setProfesional($profesional)
  {
    $this->fields["profesional"] = $profesional;
  }

  public function setFecha($fecha)
  {
    $this->fields["fecha"] = $fecha;
  }

  public function setHora($hora)
  {
    $this->fields["hora"] = $hora;
  }

  public function getId()
  {
    return $this->fields["id"];
  }

  public function getName()
  {
    return $this->fields["name"];
  }

  public function getEspecialidad()
  {
    return $this->fields["especialidad"];
  }

  public function getPaciente()
  {
    return $this->fields["paciente"];
  }

  public function getProfesional()
  {
    return $this->fields["profesional"];
  }

  public function getFecha()
  {
    return $this->fields["fecha"];
  }

  public function getHora()
  {
    return $this->fields["hora"];
  }

  public function set(array $values)
  {
    foreach (array_keys($this->fields) as $field) {
      if (!isset($values[$field])) {
        continue;
      }
      $method = "set" . ucfirst($field);
      $this->$method($values[$field]);
    }
  }
}
?>