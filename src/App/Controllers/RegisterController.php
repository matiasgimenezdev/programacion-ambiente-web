<?php 
namespace PAW\App\Controllers;
use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;

class RegisterController extends AbstractController {
    public ?string $modelName = PacienteCollection::class;

    public function register() {
        $request = Request::getInstance();
        $registerData = $request -> getRegisterData();
        $register = $this -> model -> register($registerData);
        if($register["status"]-> value === "REGISTER_OK") {
            $paciente = $this -> model -> getByDni($registerData["dni"]);
            header('Location: /perfil/editar?id=' . $paciente -> getIdPaciente());
        } else {
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('registrarse.html');
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Registrarse', 'style' => 'registrarse', 
                'registerData' => $registerData, 'register' => $register]);
        }
    }   

}


?>