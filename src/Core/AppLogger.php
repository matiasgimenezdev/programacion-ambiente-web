<?php 
    namespace PAW\Core;

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    class AppLogger {
        private static $instance;
        private Logger $logger;

        private function __construct() {
            $config = Config::getInstance();
            $this -> logger = new Logger("web-app");
            $logHandler = new StreamHandler($config -> getConfig("LOG_PATH"));
            $logHandler -> setLevel($config -> getConfig("LOG_LEVEL"));
            $this -> logger -> pushHandler($logHandler);
        }

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function getLogger()
        {
            return $this -> logger;
        }
    }
?>