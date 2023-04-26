<?php
namespace PAW\App\Models\Paciente;

class Paciente {
    private $fields = [
        "id" => null, 
        "dni" => null,
        "name" => null,
        "lastname" => null,
        "email" => null,
        "password" => null,
        "gender" => null,
        "dateOfBirth" => null,
        "phone" => null
    ];

    public function setId($id) {
        $this -> fields["id"] = $id;
    }

    public function setDni($dni) {
        $this -> fields["dni"] = $dni;
    }

    public function setName($name) {
        $this -> fields["name"] = $name;
    }

    public function setLastname($lastname) {
        $this -> fields["lastname"] = $lastname;
    }

    public function setEmail($email) {
        $this -> fields["email"] = $email;
    }

    public function setPassword($password) {
        $this -> fields["password"] = $password;
    }
    public function setGender($gender) {
        $this -> fields["gender"] = $gender;
    }

    public function setDateOfBirth($date) {
        $this -> fields["dateOfBirth"] = $date;
    }

    public function setPhone($phone) {
        $this -> fields["phone"] = $phone;
    }

    public function getDni(){
        return $this -> fields["dni"];
    }

    public function getName(){
        return $this -> fields["name"];
    }

    public function getLastname(){
        return $this -> fields["lastname"];
    }

    public function getEmail(){
        return $this -> fields["email"];
    }

    public function getPassword(){
        return $this -> fields["password"];
    }

    public function getGender(){
        return $this -> fields["gender"];
    }

    public function getDateOfBirth(){
        return $this -> fields["dateOfBirth"];
    }
    public function getPhone(){
        return $this -> fields["phone"];
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