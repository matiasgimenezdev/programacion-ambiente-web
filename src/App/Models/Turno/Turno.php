<?php
namespace PAW\App\Models\Turno;

use DateTime;

class Turno
{
  private $fields = [
    "id" => null,
    "dni" => null,
    "name-paciente" => null,
    "lastname-paciente" => null,
    "genero" => null,
    "fecha-nacimiento" => null,
    "edad" => null,
    "email" => null,
    "telefono" => null,
    "especialidad" => null,
    "profesional" => null,
    "obra-social" => null,
    "fecha-turno" => null,
    "hora-turno" => null,
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
    $this->fields["name-paciente"] = $name;
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
    $this->fields["lastname-paciente"] = $lastname;
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

  public function setGender($gender)
  {
    $status = null;
    if ($gender !== "M" && $gender !== "F") {
      return SubmitStatus::NOT_VALID_GENDER;
    }

    $this->fields["genero"] = $gender;
    return $status;
  }

  public function setBirthdate($birthdate)
  {
    $status = null;
    if (!(date_create($birthdate))) {
      return SubmitStatus::NOT_VALID_DATE;
    }


    list($year, $month, $day) = explode('-', $birthdate);
    if (!checkdate($month, $day, $year)) {
      return SubmitStatus::NOT_VALID_DATE;
    }

    $currentDate = new DateTime();
    if ($birthdate > $currentDate->format('yy-m-d')) {
      return SubmitStatus::NOT_VALID_DATE;
    }

    $this->fields["fecha-nacimiento"] = $birthdate;
    return $status;
  }

  public function setEdad($edad)
  {
    if ($edad < 0 || $edad > 120) {
      return SubmitStatus::NOT_VALID_AGE;
    }
  }

  public function setPhone($phone)
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
    $this->fields["profecional"] = $name;
    return $status;
  }


  public function setFechaTurno($date)
  {
    $status = null;
    if (!(date_create($date))) {
      return SubmitStatus::NOT_VALID_DATE;
    }


    list($year, $month, $day) = explode('-', $date);
    if (!checkdate($month, $day, $year)) {
      return SubmitStatus::NOT_VALID_DATE;
    }

    $currentDate = new DateTime();
    if ($date < $currentDate->format('yy-m-d')) {
      return SubmitStatus::NOT_VALID_DATE;
    }

    $this->fields["fecha-turno"] = $date;
    return $status;
  }

  public function setHoraTurno($hora)
  {
    $status = null;
    if (!(DateTime::createFromFormat('H:i', $hora))) {
      return SubmitStatus::NOT_VALID_TIME;
    }

    $this->fields["hora-turno"] = $hora;
    return $status;
  }

  public function setObraSocial($os)
  {
    if (!preg_match('/^[a-zA-Záéíóú\s]+$/', $os)) {
      return SubmitStatus::NOT_VALID_SPECIALTY;
    }
    $this->fields["obra-social"] = $os;
  }

  public function getId()
  {
    return $this->fields["id"];
  }

  public function getDni()
  {
    return $this->fields["dni"];
  }

  public function getNamePaciente()
  {
    return $this->fields["name-paciente"];
  }

  public function getLastNamePaciente()
  {
    return $this->fields["lastname-paciente"];
  }

  public function getProfesional()
  {
    return $this->fields["profesional"];
  }


  public function getGender()
  {
    return $this->fields["genero"];
  }

  public function getBirthdate()
  {
    return $this->fields["fecha-nacimiento"];
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

  public function getFechaTurno()
  {
    return $this->fields["fecha-turno"];
  }

  public function getObraSocial()
  {
    return $this->fields["obra-social"];
  }

  public function getHoraTurno()
  {
    return $this->fields["hora-turno"];
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

  public function nuevoTurno(array $turnoData)
  {
    $status = SubmitStatus::REGISTER_OK;
    $status = $this->setName($turnoData["name"]) ?? $status;
    $status = $this->setLastname($turnoData["lastname"]) ?? $status;
    $status = $this->setDni($turnoData["dni"]) ?? $status;
    $status = $this->setEmail($turnoData["email"]) ?? $status;
    $status = $this->setGender($turnoData["genero"]) ?? $status;
    $status = $this->setBirthdate($turnoData["fecha-nacimiento"]) ?? $status;
    $status = $this->setEdad($turnoData["edad"]) ?? $status;
    $status = $this->setPhone($turnoData["telefono"]) ?? $status;
    $status = $this->setEspecialidad($turnoData["especialidad"]) ?? $status;
    $status = $this->setProfesional($turnoData["profesional"]) ?? $status;
    $status = $this->setObraSocial($turnoData["obra-social"]) ?? $status;
    $status = $this->setFechaTurno($turnoData["fecha-turno"]) ?? $status;
    $status = $this->setHoraTurno($turnoData["hora-turno"]) ?? $status;

    // Almacena el turno en la BDD
    return $status;
  }

  /**
   * @param mixed $fields 
   * @return self
   */
  public function setFields($fields): self
  {
    $this->fields = $fields;
    return $this;
  }
}
?>