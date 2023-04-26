<?php 
    namespace PAW\Core\Traits;
    use PAW\Core\AppLogger;

    trait Loggable {
        public $logger;

        public function setLogger() {
            $this -> logger = AppLogger::getInstance();
        }
    }
?>