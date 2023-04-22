<?php 
    namespace PAW\Core;
    use PAW\Core\Exceptions\RouteNotFoundException;

    class Router{
        private static $instance;

        public $routes = [
            "GET" => [
                "/" => ["PageController", "home"]
            ],
            "POST" => []
        ];

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
    
            return self::$instance;
        }

        public function direct($request) {
            list($path, $httpMethod) = $request -> route();
            if (!$this -> exists($path, $httpMethod)) {
                throw new RouteNotFoundException("There is no route for that path");
            }

            list($controller, $method) = $this -> routes[$httpMethod][$path];

            $controllerName = "PAW\\App\\Controllers\\{$controller}";
            $controllerInstance = new $controllerName;
            $controllerInstance -> $method();

        }

        public function post($path, $controller, $method) {
            // loadRoute($path, $controller, $method, "POST");
        }

        public function get($path, $controller, $method) {
            // loadRoute($path, $controller, $method, "GET");
        }

        private function exists($path, $httpMethod) {
            return array_key_exists($path, $this -> routes[$httpMethod]);
        }

        private function loadRoute($path, $controller, $method, $httpMethod){
            // $this -> routes[$httpMethod][$path] = [$controller, $method];
        }

    }

?>