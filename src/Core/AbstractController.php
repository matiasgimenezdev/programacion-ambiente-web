<?php 
    namespace PAW\Core;

    class AbstractController {
        public $viewsDirectory;
        public $menu;

        public function __construct() {
            $this -> viewsDirectory = __DIR__ . "/../App/Views/";
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
    }

?>