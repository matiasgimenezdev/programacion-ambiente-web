<?php
namespace PAW\App\Models\ObraSocial;
use PAW\Core\Model;

class ObraSocial extends Model
{
  private $fields = [
    "id_obra_social" => null,
    "name" => null,
    "img" => null,
  ];

  public function setIdObraSocial($id)
  {
    $this->fields["id_obra_social"] = $id;
  }

  public function getIdObraSocial()
  {
    return $this->fields["id_obra_social"];
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
      $property = explode("_", $field);
      if(count($property) > 1) {
          $method = "set" . ucfirst($property[0]) . ucfirst($property[1]) . ucfirst($property[2]);

      } else {
          $method = "set" . ucfirst($property[0]);
      }
      $status = $this->$method($values[$field]);
    }
  }
}
?>