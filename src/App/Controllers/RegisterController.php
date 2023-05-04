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
        $messages = [
            'NOT_VALID_DNI' => 'Ingrese un DNI válido',
            'NOT_VALID_NAME' => 'Ingrese un nombre y apellido válidos',
            'NOT_VALID_EMAIL' => 'Ingrese un e-mail válido',
            'EMAIL_DONT_MATCH' => 'Los e-mails no coinciden',
            'IS_USED_EMAIL' => 'El email ya se encuentra en uso',
            'NOT_VALID_PASSWORD' => 'La contraseña debe contener letras y números',
            'PASSWORD_DONT_MATCH' => 'Las contraseñas no coinciden',
            'NOT_CONFIRMED_TERMS' => '¿Esta de acuerdo con los términos y condicones?',
        ];

        if($status-> value === "REGISTER_OK") {
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