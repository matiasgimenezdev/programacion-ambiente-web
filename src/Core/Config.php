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
            $this -> configs["LOG_PATH"] = $this -> joinPaths("..", $path);

            $this->configs['DB_ADAPTER'] = getenv('DB_ADAPTER') ?? 'mysql';
            $this->configs['DB_HOST'] = getenv('DB_HOST') ?? 'localhost';
            $this->configs['DB_NAME'] = getenv('DB_NAME') ?? 'ul_hospital_db';
            $this->configs['DB_USER'] = getenv('DB_USER') ?? 'paw_developer';
            $this->configs['DB_PASS'] = getenv('DB_PASS') ?? 'web_develop';
            $this->configs['DB_PORT'] = getenv('DB_PORT') ?? '3306';
            $this->configs['DB_CHARSET'] = getenv('DB_CHARSET') ?? 'utf8';
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