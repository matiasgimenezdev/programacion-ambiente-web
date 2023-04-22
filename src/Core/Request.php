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
            return $_POST[$key] ?? $_GET[$key] ?? null;

        }
    }


?>