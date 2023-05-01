<?php
namespace PAW\App\Models\Paciente;
use PAW\App\Models\Paciente\SubmitStatus;

class Paciente {
    private $fields = [
        "id" => null, 
        "dni" => null,
        "name" => null,
        "lastname" => null,
        "email" => null,
        "password" => null,
        "gender" => null,
        "birthdate" => null,
        "phone" => null
    ];

    public function setId($id) {
        $this -> fields["id"] = $id;
    }

    public function setDni($dni) {
        $status = null;
        $dni = trim($dni);
        if(strlen($dni) < 7 || strlen($dni) > 8 || !is_numeric($dni)) {
            return SubmitStatus::NOT_VALID_DNI;
        }
        
        $this -> fields["dni"] = $dni;
        return $status;
        
    }

    public function setName($name) {
        $status = null;
        $name = strtolower(trim($name));
        if(strlen($name) === 0 || strlen($name) > 50) {
            return SubmitStatus::NOT_VALID_NAME;
        }

        $name = array_map('trim', explode(' ', $name));
        $name = array_map(function($word) {
            return ucfirst(strtolower($word));
        }, $name);
        $name = implode(' ', $name);
        $this -> fields["name"] = $name;
        return $status;
    }

    public function setLastname($lastname) {
        $status = null;
        $lastname = strtolower(trim($lastname));
        if(strlen($lastname) === 0 || strlen($lastname) > 50) {
            return SubmitStatus::NOT_VALID_NAME;
        } 

        $lastname = array_map('trim', explode(' ', $lastname));
        $lastname = array_map(function($word) {
            return ucfirst(strtolower($word));
        }, $lastname);
        $lastname = implode(' ', $lastname);
        $this -> fields["lastname"] = $lastname;
        return $status;
    }

    public function setEmail($email, $emailConfirmation = false) {
        $status = null;
        $email = strtolower(trim($email));
        if(strlen($email) === 0 || strlen($email) > 128) {
            return SubmitStatus::NOT_VALID_EMAIL;            
        }
        
        if(!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)){
            return SubmitStatus::NOT_VALID_EMAIL;
        }
        
        // El email de confirmacion solo se pasa al momento de registrarse. En el resto de usos del metodo setEmail, no se tiene en cuenta este segundo parametro.
        if($emailConfirmation) {
            $emailConfirmation = strtolower(trim($emailConfirmation));
            if($email !== $emailConfirmation) {
                return SubmitStatus::NOT_VALID_EMAIL;
            }

            // exists($email) funcion que verifica si el email ya esta siendo utilizado por otro paciente.
            // No deja crear una cuenta con un mail ya utilizado
            // if(exists($email)){
            //     return SubmitStatus::IS_USED_EMAIL;
            // }

        } else {
            // exists($email) funcion que verifica si el email ya esta siendo utilizado por otro paciente.
            // No deja loguear en una cuenta cuyo email no existe.
            // if(!exists($email)){
            //     return SubmitStatus::NOT_VALID_EMAIL;
            // }
        }
        
        $this -> fields["email"] = $email;
        return $status;
        
    }

    public function setPassword($password, $passwordConfirmation = false) {
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
        if($passwordConfirmation) {
            if($password !== $passwordConfirmation){
                return SubmitStatus::NOT_VALID_PASSWORD;
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);      
            $this -> fields["password"] = $hashed_password;
        } else {
            // $hashed_password = obtiene el hash del password asociado al email ingresado
            // if(!password_verify($password, $hashed_password)){
            //     return SubmitStatus::NOT_VALID_PASSWORD;
            // }
            // $this -> fields["password"] = $hashed_password;
        }
        return $status;
    }

    public function setGender($gender) {
        $status = null;
        if($gender !== "M" && $gender !== "F") {
            return SubmitStatus::NOT_VALID_GENDER;
        }

        $this -> fields["gender"] = $gender;
        return $status;
    }

    public function setBirthdate($birthdate) {
        $status = null;
        if (!(date_create($birthdate))) {
            return SubmitStatus::NOT_VALID_DATE;
        }
        
        list($year, $month, $day) = explode('-', $birthdate);
        if (!checkdate($month, $day, $year)) {
            return SubmitStatus::NOT_VALID_DATE;
        } 

        $this -> fields["birthdate"] = $birthdate;
        return $status;
    }

    public function setPhone($phone) {
        $status = null;
        $phone = preg_replace( '/\D+/', '', $phone);
        if(!preg_match('/^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/D', $phone)) {
            echo "<pre>";
            var_dump($phone);
            die;
            return SubmitStatus::NOT_VALID_PHONE;
        }

        $this -> fields["phone"] = $phone;
        return $status;
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

    public function getBirthdate(){
        return $this -> fields["birthdate"];
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
            $status = $this->$method($values[$field]);
        }
    }

    public function register(array $registerData){
        $status = SubmitStatus::REGISTER_OK;
        $status = $this -> setName($registerData["name"]) ?? $status;
        $status = $this -> setLastname($registerData["lastname"]) ?? $status;
        $status = $this -> setDni($registerData["dni"]) ?? $status;
        $status = $this -> setEmail($registerData["email"], $registerData["emailConfirmation"]) ?? $status;
        $status = $this -> setPassword($registerData["password"], $registerData["passwordConfirmation"]) ?? $status;
        return $status;
    }

    public function login(array $loginData){
        $status = SubmitStatus::LOGIN_OK;
        $status = $this -> setEmail($loginData["email"]) ?? $status;
        $status = $this -> setPassword($loginData["password"]) ?? $status;
        return $status;
    }
}


?>