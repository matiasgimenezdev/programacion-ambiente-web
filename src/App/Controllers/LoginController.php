<?php
namespace PAW\App\Controllers;

use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;

class LoginController extends AbstractController
{
    public ?string $modelName = PacienteCollection::class;

    public function login()
    {
        $request = Request::getInstance();
        $loginData = $request -> getLoginData();
        $login = $this->model->login($loginData);

        if ($login["status"]->value === "LOGIN_OK") {
            session_start();
            $_SESSION["id"] = session_create_id();
            // Guarda el email para poder recuperar informacion del paciente logueado
            $_SESSION["email"] = $loginData["email"];
            header('Location: /');
        } else {
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('iniciar-sesion.twig');
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Iniciar sesión', 'style' => 'iniciar-sesion']);
        }
    }

}


?>