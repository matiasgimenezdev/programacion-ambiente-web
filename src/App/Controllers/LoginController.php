<?php
namespace PAW\App\Controllers;

use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;

class LoginController extends AbstractController
{
    public ?string $modelName = PacienteCollection::class;

    public function logout()
    {
        session_start();
        session_destroy();
        $_SESSION = array();
        header('Location: /');

    }

    public function login()
    {
        $request = Request::getInstance();
        $renderer = Renderer::getInstance();
        $templateLoader = $renderer -> getTemplateLoader();

        if($request -> httpMethod() === 'GET') {
            session_start();
            if(isset($_SESSION["id"])) {
                $paciente = $this -> model -> getByEmail($_SESSION["email"]);
                header('Location: /perfil/editar?id=' . $paciente->getIdPaciente());
            } else {
                $template = $templateLoader->load('iniciar-sesion.twig');
                echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Iniciar sesión', 'style' => 'iniciar-sesion']);
            }
        }

        $loginData = $request -> getLoginData();
        $login = $this->model->login($loginData);
        if($request -> httpMethod() === 'POST') {
            if ($login["status"]->value === "LOGIN_OK") {
                session_start();
                $_SESSION["id"] = session_create_id();
                // Guarda el email para poder recuperar informacion del paciente logueado
                $_SESSION["email"] = $loginData["email"];
                header('Location: /');
            } else {
                $template = $templateLoader->load('iniciar-sesion.twig');
                echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Iniciar sesión', 'style' => 'iniciar-sesion', "login" => $login]);
            }
        }
    }

}


?>