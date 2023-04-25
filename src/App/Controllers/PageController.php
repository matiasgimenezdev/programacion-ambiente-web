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

    public function profesionales()
    {
        $results = null;
        $this->requireView("Profesionales", "profesionales", "profesionales");
    }

    public function institucional()
    {
        $this->requireView("Institucional", "institucional", "institucional");
    }

    private function requireView($title, $view, $style)
    {
        require $this->viewsDirectory . "{$view}.view.php";
    }
}

?>