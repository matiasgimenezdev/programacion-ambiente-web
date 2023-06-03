<?php
namespace PAW\App\Models\Profesional;

use PAW\Core\Model;

class Profesional extends Model{

  private $table = 'profesional';

  private $fields = [
    "matricula" => null,
    "name" => null,
    "lastname" => null,
    "especialidad" => null,
    "description" => null,
  ];

  public function setMatricula($id)
  {
    $this->fields["matricula"] = $id;
  }

  public function setName($name)
  {
    $this->fields["name"] = $name;
  }

  public function setLastname($lastname)
  {
    $this->fields["lastname"] = $lastname;
  }

  public function setEspecialidad($especialidad)
  {
    $this->fields["especialidad"] = $especialidad;
  }

  public function setDescription($description)
  {
    $this->fields["description"] = $description;
  }

  public function getId()
  {
    return $this->fields["matricula"];
  }

  public function getName()
  {
    return $this->fields["name"];
  }

  public function getLastname()
  {
    return $this->fields["lastname"];
  }

  public function getEspecialidad()
  {
    return $this->fields["especialidad"];
  }

  public function getDescription()
  {
    return $this->fields["description"];
  }

  public function set(array $values) {
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