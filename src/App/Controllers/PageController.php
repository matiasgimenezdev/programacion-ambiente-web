<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Renderer;

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

    public function turneroMedico(){
        $this->requireView("Turnos", "turneroMedico", "turnero");
    }

    public function turneroClinica(){
        $this->requireView("Turnos", "turneroClinica", "turnero");
    }

    public function turneroPaciente(){
        $this->requireView("Turnos", "turneroPaciente", "turnero");
    }


    private function requireView($title, $view, $style)
    {
        // $renderer = Renderer::getInstance();
        // $template = $twig->load($view.'.html');
        // echo $template->render(['title' => $title, 'style' => $style]);
        require $this->viewsDirectory . "{$view}.view.php";
    }
}

?>