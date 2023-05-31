<?php 
namespace PAW\App\Controllers;
use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;

class RegisterController extends AbstractController {
    public ?string $modelName = PacienteCollection::class;

    public function register() {
        $request = Request::getInstance();
        $registerData = $request -> getRegisterData();
        $register = $this -> model -> register($registerData);
        if($register["status"]-> value === "REGISTER_OK") {
            $paciente = $this -> model -> getId($dni);
            header('Location: /perfil/editar?id=' . $paciente -> getId());
        } else {
            $title = "Registrarse";
            $style = "registrarse";
            require $this -> viewsDirectory . "registrarse.view.php";
        }
    }   

}


?>