<?php
namespace PAW\App\Models\Paciente;

use PAW\Core\Model;
use PAW\Core\Traits\Messenger;
use PAW\Core\SubmitStatus;
use DateTime;

class Paciente extends Model {
    use Messenger;


    private $table = 'paciente';

    private $fields = [
        "id_paciente" => null,
        "dni" => null,
        "name" => null,
        "lastname" => null,
        "email" => null,
        "password" => null,
        "gender" => null,
        "birthdate" => null,
        "phone" => null
    ];


    public function setIdPaciente($id)
    {
        $this->fields["id_paciente"] = $id;
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

    public function setEmail($email, $emailConfirmation = false)
    {
        $status = null;
        $email = strtolower(trim($email));
        if (strlen($email) === 0 || strlen($email) > 128) {
            return SubmitStatus::NOT_VALID_EMAIL;
        }

        if (!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)) {
            return SubmitStatus::NOT_VALID_EMAIL;
        }

        // El email de confirmacion solo se pasa al momento de registrarse. En el resto de usos del metodo setEmail, no se tiene en cuenta este segundo parametro.
        if ($emailConfirmation) {
            $emailConfirmation = strtolower(trim($emailConfirmation));
            if ($email !== $emailConfirmation) {
                return SubmitStatus::EMAIL_DONT_MATCH;
            }
            // TODO Verificar que el email no exista en la BDD.
            // exists("email", $email) funcion que verifica si el email ya esta siendo utilizado por otro paciente.
            // No deja crear una cuenta con un mail ya utilizado
            // if($this -> exists("email", $email)){
            //     return SubmitStatus::IS_USED_EMAIL;
            // }

        } else {
            // TODO Verificar que el email exista en la BDD.
            // exists("email", $email) funcion que verifica si el email ya esta siendo utilizado por otro paciente.
            // No deja loguear en una cuenta cuyo email no existe.
            // if(!$this -> exists("email", $email)){
            //     return SubmitStatus::NOT_VALID_EMAIL;
            // }
        }

        $this->fields["email"] = $email;
        return $status;

    }

    public function setPassword($password, $passwordConfirmation = false)
    {
        $status = null;
        if (strlen($password) < 8) {
            return SubmitStatus::NOT_VALID_PASSWORD;
        }

        if (!preg_match("#[0-9]+#", $password)) {
            // Verifica que la contraseña tenga al menos un numero
            return SubmitStatus::NOT_VALID_PASSWORD;
        }

        if (!preg_match("#[a-zA-Z]+#", $password)) {
            // Verifica que el password tenga al menos una letra
            return SubmitStatus::NOT_VALID_PASSWORD;
        }

        // El password de confirmacion solo se pasa al momento de registrarse. En el resto de usos del metodo setPassword, no se tiene en cuenta este segundo parametro.
        if ($passwordConfirmation) {
            if ($password !== $passwordConfirmation) {
                return SubmitStatus::PASSWORD_DONT_MATCH;
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $this->fields["password"] = $hashed_password;
        } else {
            $data = $this -> queryBuilder -> selectByColumn($this-> table, "email", $this -> getEmail());
            $hashed_password = $data[0]["password"];
            if($password !== $hashed_password){
                return SubmitStatus::WRONG_PASSWORD;
            }
            $this -> fields["password"] = $hashed_password;
        }
        
        return $status;
    }

    public function setGender($gender)
    {
        $status = null;
        if ($gender !== "M" && $gender !== "F") {
            return SubmitStatus::NOT_VALID_GENDER;
        }

        $this->fields["gender"] = $gender;
        return $status;
    }

    public function setBirthdate($birthdate)
    {
        $status = null;
        if (!(date_create($birthdate))) {
            return SubmitStatus::NOT_VALID_BIRTHDATE;
        }


        list($year, $month, $day) = explode('-', $birthdate);
        if (!checkdate(intval($month), intval(substr($day, 0, 2)), intval($year))) {
            return SubmitStatus::NOT_VALID_BIRTHDATE;
        }

        $currentDate = new DateTime();
        if ($birthdate>= $currentDate->format('Y-m-d')) {
            return SubmitStatus::NOT_VALID_BIRTHDATE;
        }

        $this->fields["birthdate"] = $birthdate;
        return $status;
    }

    public function setPhone($phone)
    {
        $status = null;
        $phone = preg_replace('/\D+/', '', $phone);
        if (!preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $phone)) {
            return SubmitStatus::NOT_VALID_PHONE;
        }

        $this->fields["phone"] = $phone;
        return $status;
    }

    public function getIdPaciente()
    {
        return $this->fields["id_paciente"];
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

    public function getEmail()
    {
        return $this->fields["email"];
    }

    public function getPassword()
    {
        return $this->fields["password"];
    }

    public function getGender()
    {
        return $this->fields["gender"];
    }

    public function getBirthdate()
    {
        return $this->fields["birthdate"];
    }
    public function getPhone()
    {
        return $this->fields["phone"];
    }

    public function set(array $values)
    {

        foreach (array_keys($this->fields) as $field) {
            if (!isset($values[$field])) {
                continue;
            }
            $property = explode("_", $field);
            if(count($property) > 1) {
                $method = "set" . ucfirst($property[0]) . ucfirst($property[1]);

            } else {
                $method = "set" . ucfirst($property[0]);
            }
            $status = $this->$method($values[$field]);
        }
    }

    public function register(array $registerData)
    {
        $status = SubmitStatus::REGISTER_OK;
        $status = $this->setName($registerData["name"]) ?? $status;
        $status = $this->setLastname($registerData["lastname"]) ?? $status;
        $status = $this->setDni($registerData["dni"]) ?? $status;
        $status = $this->setEmail($registerData["email"], $registerData["emailConfirmation"]) ?? $status;
        $status = $this->setPassword($registerData["password"], $registerData["passwordConfirmation"]) ?? $status;

        if($status -> value === "REGISTER_OK") {
            $data = [
                "dni" => $this -> getDni(),
                "name" => $this -> getName(),
                "lastname" => $this -> getLastname(),
                "email" => $this -> getEmail(),
                "password" => $this -> getPassword(),
                "gender" => $this -> getGender(),
                "birthdate" => $this -> getBirthdate(),
                "phone" => $this -> getPhone(),

            ];
            $this->queryBuilder->insert($this->table, $data);
        }
        return ["status" => $status, "message" => $this -> getMessage($status)];
    }

    public function login(array $loginData)
    {
        $status = SubmitStatus::LOGIN_OK;
        $status = $this->setEmail($loginData["email"]) ?? $status;
        $status = $this->setPassword($loginData["password"]) ?? $status;
        return ["status" => $status, "message" => $this -> getMessage($status)];
    }

    public function update(array $updatedData)
    {
        $status = SubmitStatus::UPDATE_OK;
        $status = $this->setName($updatedData["name"]) ?? $status;
        $status = $this->setLastname($updatedData["lastname"]) ?? $status;
        $status = $this->setBirthdate($updatedData["birthdate"]) ?? $status;
        $status = $this->setGender($updatedData["gender"]) ?? $status;
        $status = $this->setPhone($updatedData["phone"]) ?? $status;

        if($status -> value === "UPDATE_OK") {
            $data = [
                "id_paciente" => $this -> getIdPaciente(),
                "dni" => $this -> getDni(),
                "name" => $this -> getName(),
                "lastname" => $this -> getLastname(),
                "email" => $this -> getEmail(),
                "password" => $this -> getPassword(),
                "gender" => $this -> getGender(),
                "birthdate" => $this -> getBirthdate(),
                "phone" => $this -> getPhone(),

            ];
            $this->queryBuilder->update($this->table, $data);
        }
        return ["status" => $status, "message" => $this -> getMessage($status)];
    }

    private function exists($key, $value) {

    }
}


?>