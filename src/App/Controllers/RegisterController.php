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
            // $id = $this -> model -> getId($dni);
            // Obtendría el ID que le fue asignado y lo redirige a la pagina de su perfil por si desea seguir cargando mas datos personales.
            header('Location: /perfil/editar?id=' . "1");

        } else {
            $title = "Registrarse";
            $style = "registrarse";
            require $this -> viewsDirectory . "registrarse.view.php";
        }
    }   

}


?>