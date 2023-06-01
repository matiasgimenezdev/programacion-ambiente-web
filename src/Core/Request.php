<?php 
    namespace PAW\Core;

    class Request {
        private static $instance;

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
    
            return self::$instance;
        }
        
        public function path () {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
        public function httpMethod () {
            return parse_url($_SERVER['REQUEST_METHOD'], PHP_URL_PATH);
        }

        public function route() {
            return [$this -> path(), $this -> httpMethod()];
        }
        
        public function getKey(string $key) {
            return $_POST[$key] ?? $_GET[$key] ?? $_SERVER[$key] ?? $_FILES[$key] ?? null;

        }

        public function getUpdateData() {
            return [
                "id" => $this -> getKey("id"),
                "dni" => $this -> getKey("dni"),
                "name" => $this -> getKey("nombre"),
                "lastname" => $this -> getKey("apellido"),
                "birthdate" => $this -> getKey("nacimiento"),
                "gender" => $this -> getKey("genero"),
                "email" => $this -> getKey("email"),
                "phone" => $this -> getKey("telefono"),
            ];
        }

        public function getRegisterData() {
            return [
                "dni" => $this -> getKey("dni"),
                "name" => $this -> getKey("nombre"),
                "lastname" => $this -> getKey("apellido"),
                "email" => $this -> getKey("email"),
                "emailConfirmation" => $this -> getKey("email2"),
                "password" => $this -> getKey("password"),
                "passwordConfirmation" => $this -> getKey("password2"),
                "terms-conditions" => $this -> getKey("terminos-condiciones"),
            ];
        }

        public function getLoginData(){
            return [
                "email" => $this->getKey("email"),
                "password" => $this->getKey("password"),
            ];
        }

        public function getTurnData(){
            return [
                "dni" => $this->getKey("dni"),
                "name" => $this->getKey("nombre"),
                "lastname" => $this->getKey("apellido"),
                "genero" => $this->getKey("genero"),
                "nacimiento" => $this->getKey("nacimiento"),
                "edad" => $this->getKey("edad"),
                "email" => $this->getKey("email"),
                "telefono" => $this->getKey("telefono"),
                "especialidad" => $this->getKey("especialidad"),
                "profesional" => $this->getKey("medico"),
                "obraSocial" => $this->getKey("obra-social"),
                "fecha" => $this->getKey("fecha-turno"),
                "hora" => $this->getKey("hora-turno"),
                "estudio" => $this -> getKey("estudio")
            ];
        }

    }


?>