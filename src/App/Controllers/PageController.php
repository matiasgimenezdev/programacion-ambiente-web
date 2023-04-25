<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;

class PageController extends AbstractController
{

    public function home()
    {
        $this->requireView("Inicio", "home", "home");
    }

    public function turnos()
    {
        $this->requireView("Turnos", "turnos", "turnos");
    }

    public function institucional()
    {
        $this->requireView("Institucional", "institucional", "institucional");
    }

    public function noticias()
    {
        $this->requireView("Noticias", "noticias", "noticias");
    }

    public function obrasSociales()
    {
        $this->requireView("Obras Sociales", "obras-sociales", "obras-sociales");
    }

    private function requireView($title, $view, $style)
    {
        require $this->viewsDirectory . "{$view}.view.php";
    }
}

?>