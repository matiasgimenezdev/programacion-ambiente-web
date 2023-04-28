<?php 
namespace PAW\App\Controllers;
use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;

class RegisterController extends AbstractController {
    public ?string $modelName = PacienteCollection::class;

    public function register() {
        $request = Request::getInstance();
        $registerData = [
            "dni" => $request -> getKey("dni"),
            "name" => $request -> getKey("nombre"),
            "lastname" => $request -> getKey("apellido"),
            "email" => $request -> getKey("email"),
            "emailConfirmation" => $request -> getKey("email2"),
            "password" => $request -> getKey("password"),
            "passwordConfirmation" => $request -> getKey("password2"),
            "terms-conditions" => $request -> getKey("terminos-condiciones"),
        ];

        $status = $this -> model -> register($registerData);

        if($status-> value === "REGISTER_OK") {
            // $id = $this -> model -> getId($email);
            // Obtendría el ID a partir del email y lo redirige a la pagina de su perfil por si desea seguir cargando mas datos personales.
            header('Location: /perfil?id=' . "1");

        } else {
            $title = "Registrarse";
            $style = "registrarse";
            require $this -> viewsDirectory . "registrarse.view.php";
        }
    }   

}


?>