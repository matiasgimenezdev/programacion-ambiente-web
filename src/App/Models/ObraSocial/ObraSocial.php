<?php
namespace PAW\App\Models\ObraSocial;
use PAW\Core\Model;

class ObraSocial extends Model
{
  private $fields = [
    "id" => null,
    "name" => null,
    "img" => null,
  ];

  public function setId($id)
  {
    $this->fields["id"] = $id;
  }

  public function setName($name)
  {
    $this->fields["name"] = $name;
  }

  public function setImg($img)
  {
    $this->fields["img"] = $img;
  }

  public function getName()
  {
    return $this->fields["name"];
  }

  public function getImg()
  {
    return $this->fields["img"];
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