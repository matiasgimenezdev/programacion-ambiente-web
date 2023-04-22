<?php 
    namespace PAW\App\Controllers;

    class PageController {
        public $viewsDirectory;

        public function __construct() {
            $this -> viewsDirectory = __DIR__ . "/../Views/";
            $this -> menu = [
                [
                    "href" => "/",
                    "name" => "Inicio",
                ],
                [
                    "href" => "/turnos",
                    "name" => "Turnos",
                ],
                [
                    "href" => "/profesionales",
                    "name" => "Profesionales",
                ],
                [
                    "href" => "/especialidades",
                    "name" => "Especialidades",
                ],
                [
                    "href" => "/noticias",
                    "name" => "Noticias",
                ],
                [
                    "href" => "/institucional",
                    "name" => "Institucional",
                ],
                [
                    "href" => "/obras-sociales",
                    "name" => "Obras sociales",
                ],
                [
                    "href" => "/contacto",
                    "name" => "Contacto",
                ],

            ]; 
        }

        public function home() {
            $style = "home";
            $title = "Inicio";
            require $this -> viewsDirectory."home.view.php";
        }
    }

?>