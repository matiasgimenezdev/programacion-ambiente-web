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
        $this->requireView("Turnos", "turnero-medico", "turnero");
    }

    public function turneroClinica(){
        $this->requireView("Turnos", "turnero-clinica", "turnero");
    }

    public function turneroPaciente(){
        $this->requireView("Turnos", "turnero-paciente", "turnero");
    }


    private function requireView($title, $view, $style)
    {
        $renderer = Renderer::getInstance();
        $templateLoader = $renderer -> getTemplateLoader();
        $template = $templateLoader->load($view.'.twig');
        echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => $title, 'style' => $style]);
    }
}

?>