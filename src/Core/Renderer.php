<?php 
    namespace PAW\Core;
    use Twig\Loader\FilesystemLoader;
    use Twig\Environment;

    class Renderer {
        private static $instance;
        private Environment $templateLoader;

        private function __construct() {
            $loader = new FilesystemLoader(__DIR__."/../App/Views/Templates");
            $this -> templateLoader = new Environment($loader, [
                'cache' => __DIR__."/../../cache/twig",
            ]);
        }

        public static function getInstance()
        {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function getTemplateLoader() {
            return $this -> templateLoader;
        }
    }
?>