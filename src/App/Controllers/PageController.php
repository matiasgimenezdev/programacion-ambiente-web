<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;

class PageController extends AbstractController
{
    public function turnos()
    {
        $this->requireView("Turnos", "turnos", "turnos");
    }

    public function institucional()
    {
        $this->requireView("Institucional", "institucional", "institucional");
    }

    public function obrasSociales()
    {
        $this->requireView("Obras Sociales", "obras-sociales", "obras-sociales");
    }

    public function contacto()
    {
        $this->requireView("Contacto", "contacto", "contacto");
    }

    public function login()
    {
        $this->requireView("Iniciar sesión", "iniciar-sesion", "iniciar-sesion");
    }

    public function register()
    {
        $this->requireView("Registrarse", "registrarse", "registrarse");
    }

    public function terminos()
    {
        $this->requireView("Términos y condiciones", "terminos", "terminos");
    }

    private function requireView($title, $view, $style)
    {
        require $this->viewsDirectory . "{$view}.view.php";
    }
}

?>