<?php 
    namespace PAW\Core;

    class AbstractController {
        public $viewsDirectory;
        public $headerMenu;
        public $footerMenu;

        public function __construct() {
            $this -> viewsDirectory = __DIR__ . "/../App/Views/";
            $this -> headerMenu = [
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

            $this -> footerMenu = [
                [
                    "href" => "/",
                    "content" => "Volver al inicio",
                ],
                [
                    "href" => "/contacto",
                    "content" => "Más información de contacto",
                ],
                [
                    "href" => "/terminos",
                    "content" => "Términos y condiciones",
                ],
            ];
        }
    }

?>