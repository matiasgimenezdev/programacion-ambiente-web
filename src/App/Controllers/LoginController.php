<?php
namespace PAW\App\Controllers;

use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;

class LoginController extends AbstractController
{
    public ?string $modelName = PacienteCollection::class;

    public function login()
    {
        $request = Request::getInstance();
        $loginData = $request -> getLoginData();
        $login = $this->model->login($loginData);

        if ($login["status"]->value === "LOGIN_OK") {
            header('Location: /');
        } else {
            $title = "Iniciar sesión";
            $style = "iniciar-sesion";
            require $this->viewsDirectory . "iniciar-sesion.view.php";
        }
    }

}


?>