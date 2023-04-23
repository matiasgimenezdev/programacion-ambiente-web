<?php 
    namespace PAW\Core;
    use PAW\Core\Exceptions\RouteNotFoundException;

    class Router {
        private static $instance;

        private $routes = [
            "GET" => [],
            "POST" => []
        ];

        private $notFound = "/not-found";
        private $internalError = "/internal-error";

        private function __construct () {
            $this -> get($this -> notFound, "ErrorController","notFound");
            $this -> get($this -> internalError, "ErrorController","internalError");
        }

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
    
            return self::$instance;
        }

        public function direct($request) {
            try{
                list($path, $httpMethod) = $request -> route();
                list($controller, $method) = $this -> getController($path, $httpMethod);
            } catch(RouteNotFoundException $exception){
                list($controller, $method) = $this -> getController($this -> notFound, "GET");
            } catch(Exception $exception) {
                list($controller, $method) = $this -> getController($this -> internalError, "GET");
            } finally {
                $this -> invokeController($controller, $method);
            }

        }

        private function getController($path, $httpMethod) {
            if (!$this -> exists($path, $httpMethod)) {
                throw new RouteNotFoundException("There is no route for that path");
            }
            list($controller, $method) = $this -> routes[$httpMethod][$path];
            return [$controller, $method];
        }

        private function invokeController($controller, $method){
            $controllerName = "PAW\\App\\Controllers\\{$controller}";
            $controllerInstance = new $controllerName;
            $controllerInstance -> $method();
        }


        public function post($path, $controller, $method) {
            $this -> loadRoute($path, $controller, $method, "POST");
        }

        public function get($path, $controller, $method) {
            $this -> loadRoute($path, $controller, $method, "GET");
        }

        private function exists($path, $httpMethod) {
            return array_key_exists($path, $this -> routes[$httpMethod]);
        }

        private function loadRoute($path, $controller, $method, $httpMethod){
            $this -> routes[$httpMethod][$path] = [$controller, $method];
        }

    }

?>