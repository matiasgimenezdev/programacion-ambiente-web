<?php
namespace PAW\App\Models\Paciente;
use PAW\App\Models\Paciente\RegisterStatus;

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
        $dni = trim($dni);
        if(strlen($dni) >= 7 && strlen($dni) <= 8 && is_numeric($dni)) {
            $this -> fields["dni"] = $dni;
            return null;
        } else {
            return RegisterStatus::NOT_VALID_DNI;
        }
    }

    public function setName($name) {
        $name = strtolower(trim($name));
        if(strlen($name) > 0 && strlen($name) <= 50) {
            $name = array_map('trim', explode(' ', $name));
            $name = array_map(function($word) {
                return ucfirst(strtolower($word));
            }, $name);
            $name = implode(' ', $name);
            $this -> fields["name"] = $name;
            return null;
        } else {
            return RegisterStatus::NOT_VALID_NAME;
        }
    }

    public function setLastname($lastname) {
        $lastname = strtolower(trim($lastname));
        if(strlen($lastname) > 0 && strlen($lastname) <= 50) {
            $lastname = array_map('trim', explode(' ', $lastname));
            $lastname = array_map(function($word) {
                return ucfirst(strtolower($word));
            }, $lastname);
            $lastname = implode(' ', $lastname);
            $this -> fields["lastname"] = $lastname;
            return null;
        } else {
            return RegisterStatus::NOT_VALID_NAME;
        }
    }

    public function setEmail($email, $emailConfirmation = false) {
        // El email de confirmacion solo se pasa al momento de registrarse. Por lo tanto, en el resto de usos del metodo setEmail, no se tiene en cuenta este segundo parametro
        if($emailConfirmation) {
            $email = strtolower(trim($email));
            $emailConfirmation = strtolower(trim($emailConfirmation));
            if(strlen($email) === 0 || strlen($email) > 128) {
                return RegisterStatus::NOT_VALID_EMAIL;
                
            }
    
            if($email !== $emailConfirmation) {
                return RegisterStatus::NOT_VALID_EMAIL;
            }
    
            if(!preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $email)){
                return RegisterStatus::NOT_VALID_EMAIL;
            }
    
            $this -> fields["email"] = $email;
            return null;
        } else {
            $this -> fields["email"] = $email;
        }
    }

    public function setPassword($password, $passwordConfirmation) {
        if (strlen($password) < 8) {
            return RegisterStatus::NOT_VALID_PASSWORD;
        }
        
        if (!preg_match("#[0-9]+#", $password)) {
            // Verifica que la contraseña tenga al menos un numero
            return RegisterStatus::NOT_VALID_PASSWORD;
        } 
        
        if (!preg_match("#[a-zA-Z]+#", $password)) {
            // Verifica que el password tenga al menos una letra
            return RegisterStatus::NOT_VALID_PASSWORD;
        }

        if($password !== $passwordConfirmation){
            return RegisterStatus::NOT_VALID_PASSWORD;
        }

        // Calcula un hash del password. El hash se puede comparar con la contraseña que el usuario 
        // ingrese en el formulario de inicio de sesion con password_verify($password, $hashed_password))
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);      
        $this -> fields["password"] = $hashed_password;
        return null;

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
            $status = $this->$method($values[$field]);
        }
    }

    public function register(array $registerData){
        $status = RegisterStatus::REGISTER_OK;
        $status = $this -> setName($registerData["name"]) ?? $status;
        $status = $this -> setLastname($registerData["lastname"]) ?? $status;
        $status = $this -> setDni($registerData["dni"]) ?? $status;
        $status = $this -> setEmail($registerData["email"], $registerData["emailConfirmation"]) ?? $status;
        $status = $this -> setPassword($registerData["password"], $registerData["passwordConfirmation"]) ?? $status;
        return $status;
    }
}


?>