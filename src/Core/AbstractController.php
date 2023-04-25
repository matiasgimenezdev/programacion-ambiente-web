<?php
namespace PAW\Core;

class AbstractController
{
    public $viewsDirectory;
    public $headerMenu;
    public $footerMenu;
    public ?string $modelName = null;

    public function __construct()
    {
        if (!is_null($this->modelName)) {
            $model = new $this->modelName;
            $this->setModel($model);
        }

        $this->viewsDirectory = __DIR__ . "/../App/Views/Pages/";
        $this->headerMenu = [
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

        $this->footerMenu = [
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

    private function setModel($model)
    {
        $this->model = $model;
    }
}

?>