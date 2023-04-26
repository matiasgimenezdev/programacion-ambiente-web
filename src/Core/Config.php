<?php 
    namespace PAW\Core;
    use Dotenv\Dotenv;

    class Config {
        private static $instance;
        private array $configs;

        private function __construct() {
            $this -> loadConfig();
            $this -> configs["LOG_LEVEL"] = getenv("LOG_LEVEL", "INFO");
            $path = getenv("LOG_PATH", "/logs/app.log");
            $this -> configs["LOG_PATH"] = $this -> joinPaths("..", $path) ;
        }

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function joinPaths() {
            $paths = array();
            foreach(func_get_args() as $arg){
                if($arg !== '') {
                    $paths[] = $arg;
                }
            }

            return preg_replace('#/+#', '/', join('/', $paths));
        }


        public function getConfig($name) {
            return $this -> configs[$name] ?? null;
        }

        private function loadConfig() {
            $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . "/../../");
            $dotenv -> load();
        }
    }
?>