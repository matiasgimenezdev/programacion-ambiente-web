<?php
namespace PAW\App\Models\Turno;

use PAW\Core\Traits\Messenger;
use PAW\Core\SubmitStatus;
use finfo;
use const FILEINFO_MIME_TYPE;

use DateTime;

class Turno
{
  use Messenger;
  private $fields = [
    "id" => null,
    "dni" => null,
    "name" => null,
    "lastname" => null,
    "genero" => null,
    "nacimiento" => null,
    "edad" => null,
    "email" => null,
    "telefono" => null,
    "especialidad" => null,
    "profesional" => null,
    "obraSocial" => null,
    "fecha" => null,
    "hora" => null,
    "estudio" => null,
    "pendiente" => true,
  ];

  public function setId($id)
  {
    $this->fields["id"] = $id;
  }

  public function setDni($dni)
  {
    $status = null;
    $dni = trim($dni);
    if (strlen($dni) < 7 || strlen($dni) > 8 || !is_numeric($dni)) {
      return SubmitStatus::NOT_VALID_DNI;
    }

    $this->fields["dni"] = $dni;
    return $status;

  }

  public function setName($name)
  {
    $status = null;
    $name = strtolower(trim($name));
    if (strlen($name) === 0 || strlen($name) > 50) {
      return SubmitStatus::NOT_VALID_NAME;
    }

    if (!preg_match('/^[a-zA-Záéíóú\s]+$/', $name)) {
      return SubmitStatus::NOT_VALID_NAME;
    }

    $name = array_map('trim', explode(' ', $name));
    $name = array_map(function ($word) {
      return ucfirst(strtolower($word));
    }, $name);
    $name = implode(' ', $name);
    $this->fields["name"] = $name;
    return $status;
  }

  public function setLastname($lastname)
  {
    $status = null;
    $lastname = strtolower(trim($lastname));
    if (strlen($lastname) === 0 || strlen($lastname) > 50) {
      return SubmitStatus::NOT_VALID_NAME;
    }

    if (!preg_match('/^[a-zA-Záéíóú\s]+$/', $lastname)) {
      return SubmitStatus::NOT_VALID_NAME;
    }

    $lastname = array_map('trim', explode(' ', $lastname));
    $lastname = array_map(function ($word) {
      return ucfirst(strtolower($word));
    }, $lastname);
    $lastname = implode(' ', $lastname);
    $this->fields["lastname"] = $lastname;
    return $status;
  }


  public function setEmail($email)
  {
    $status = null;
    $email = strtolower(trim($email));
    if (strlen($email) === 0 || strlen($email) > 128) {
      return SubmitStatus::NOT_VALID_EMAIL;
    }

    if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
      return SubmitStatus::NOT_VALID_EMAIL;
    }

    $this->fields["email"] = $email;
    return $status;

  }

  public function setGenero($gender)
  {
    $status = null;
    if ($gender !== "M" && $gender !== "F") {
      return SubmitStatus::NOT_VALID_GENDER;
    }

    $this->fields["genero"] = $gender;
    return $status;
  }

  public function setNacimiento($birthdate)
  {
    $status = null;
    if (!(date_create($birthdate))) {
      return SubmitStatus::NOT_VALID_BIRTHDATE;
    }


    list($year, $month, $day) = explode('-', $birthdate);
    if (!checkdate($month, $day, $year)) {
      return SubmitStatus::NOT_VALID_BIRTHDATE;
    }

    $currentDate = new DateTime();
    if ($birthdate >= $currentDate->format('yy-m-d')) {
      return SubmitStatus::NOT_VALID_BIRTHDATE;
    }

    $this->fields["nacimiento"] = $birthdate;
    return $status;
  }

  public function setEdad($edad)
  {
    if ($edad < 0 || $edad > 120) {
      return SubmitStatus::NOT_VALID_AGE;
    }
  }

  public function setTelefono($phone)
  {
    $status = null;
    $phone = preg_replace('/\D+/', '', $phone);
    if (!preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $phone)) {
      return SubmitStatus::NOT_VALID_PHONE;
    }

    $this->fields["teléfono"] = $phone;
    return $status;
  }

  public function setEspecialidad($especialidad)
  {
    if (!preg_match('/^[a-zA-Záéíóú\s]+$/', $especialidad)) {
      return SubmitStatus::NOT_VALID_SPECIALTY;
    }
    $this->fields["especialidad"] = $especialidad;
  }

  public function setProfesional($name)
  {
    $status = null;
    $name = strtolower(trim($name));
    if (strlen($name) === 0 || strlen($name) > 50) {
      return SubmitStatus::NOT_VALID_PROFESIONAL;
    }

    if (!preg_match('/^[a-zA-Záéíóú\s]+$/', $name)) {
      return SubmitStatus::NOT_VALID_PROFESIONAL;
    }

    $name = array_map('trim', explode(' ', $name));
    $name = array_map(function ($word) {
      return ucfirst(strtolower($word));
    }, $name);
    $name = implode(' ', $name);
    $this->fields["profesional"] = $name;
    return $status;
  }


  public function setFecha($date)
  {
    $status = null;
    if (!(date_create($date))) {
      return SubmitStatus::NOT_VALID_SHIFTDATE;
    }

    list($year, $month, $day) = explode('-', $date);
    if (!checkdate($month, $day, $year)) {
      return SubmitStatus::NOT_VALID_SHIFTDATE;
    }

    $currentDate = new DateTime();
    if ($date < $currentDate->format('Y-m-d')) {
      return SubmitStatus::NOT_VALID_SHIFTDATE;
    }

    $this->fields["fecha"] = $date;
    return $status;
  }

  public function setHora($hora)
  {
    $status = null;
    if (!(DateTime::createFromFormat('H:i', $hora))) {
      return SubmitStatus::NOT_VALID_SHIFTTIME;
    }

    $this->fields["hora"] = $hora;
    return $status;
  }

  public function setObrasocial($os)
  {
    if (!preg_match('/^[a-zA-Záéíóú\s]+$/', $os)) {
      return SubmitStatus::NOT_VALID_SOCIALWORK;
    }
    $this->fields["obraSocial"] = $os;
  }

  public function setEstudio($estudio)
  {
    if (isset($estudio) && $estudio['error'] === UPLOAD_ERR_OK) {
      $maxSize = 20 * 1024 * 1024;
      if ($estudio["size"] > $maxSize) {
        return SubmitStatus::EXCEEDED_FILE_SIZE;
      }

      if ($estudio['type'] !== "application/pdf" && $estudio['type'] !== "image/png" && $estudio['type'] !== "image/jpeg" && $estudio['type'] !== "image/jpg") {
        return SubmitStatus::NOT_ALLOWED_FILE_TYPE;
      }

      $tempName = $estudio['tmp_name'];
      $finfo = new finfo(FILEINFO_MIME_TYPE);
      $type = $finfo->file($tempName);

      if ($type !== "application/pdf" && $type !== "image/jpeg" && $type !== "image/jpg" && $type !== "image/png") {
        return SubmitStatus::NOT_ALLOWED_FILE_TYPE;
      }

      $fileName = $estudio['name'];
      $path = __DIR__ . '/../../Uploads/' . $fileName;
      move_uploaded_file($tempName, $path);
      $this->fields["estudio"] = $path;
    }
  }

  public function getId()
  {
    return $this->fields["id"];
  }

  public function getDni()
  {
    return $this->fields["dni"];
  }

  public function getName()
  {
    return $this->fields["name"];
  }

  public function getLastname()
  {
    return $this->fields["lastname"];
  }

  public function getProfesional()
  {
    return $this->fields["profesional"];
  }


  public function getGenero()
  {
    return $this->fields["genero"];
  }

  public function getNacimiento()
  {
    return $this->fields["nacimiento"];
  }

  public function getEdad()
  {
    return $this->fields["edad"];
  }

  public function getEspecialidad()
  {
    return $this->fields["especialidad"];
  }

  public function getTelefono()
  {
    return $this->fields["telefono"];
  }

  public function getEmail()
  {
    return $this->fields["email"];
  }

  public function getFecha()
  {
    return $this->fields["fecha"];
  }

  public function getObrasocial()
  {
    return $this->fields["obra"];
  }

  public function getHora()
  {
    return $this->fields["hora"];
  }

  public function getEstudio()
  {
    return $this->fields["estudio"];
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

  public function registrarTurno(array $shiftData)
  {
    $status = SubmitStatus::REGISTER_OK;
    $status = $this->setName($shiftData["name"]) ?? $status;
    $status = $this->setLastname($shiftData["lastname"]) ?? $status;
    $status = $this->setDni($shiftData["dni"]) ?? $status;
    $status = $this->setEmail($shiftData["email"]) ?? $status;
    $status = $this->setGenero($shiftData["genero"]) ?? $status;
    $status = $this->setNacimiento($shiftData["nacimiento"]) ?? $status;
    $status = $this->setEdad($shiftData["edad"]) ?? $status;
    $status = $this->setTelefono($shiftData["telefono"]) ?? $status;
    $status = $this->setEspecialidad($shiftData["especialidad"]) ?? $status;
    $status = $this->setProfesional($shiftData["profesional"]) ?? $status;
    $status = $this->setObrasocial($shiftData["obraSocial"]) ?? $status;
    $status = $this->setFecha($shiftData["fecha"]) ?? $status;
    $status = $this->setHora($shiftData["hora"]) ?? $status;
    $status = $this->setEstudio($shiftData["estudio"]) ?? $status;

    // Almacena el turno en la BDD
    return ["status" => $status, "message" => $this->getMessage($status)];
  }

// /**
//  * @param mixed $fields 
//  * @return self
//  */
// public function setFields($fields): self
// {
//   $this->fields = $fields;
//   return $this;
// }
}
?>