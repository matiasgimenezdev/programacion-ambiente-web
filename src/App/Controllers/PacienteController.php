<?php
namespace PAW\App\Controllers;
use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;

class PacienteController extends AbstractController {
  public ?string $modelName = PacienteCollection::class;

  public function perfil() {
    $request = Request::getInstance();
    $id = $request -> getKey("id");
    $title = "Tu perfil";
    $style = "perfil";
    $paciente = $this -> model -> getOne($id);
    require $this -> viewsDirectory . "perfil.view.php";
  }

  public function editarPerfil($updatedData = null, $status = null) {
    $request = Request::getInstance();
    $id = $request -> getKey("id");
    $title = "Editar datos";
    $style = "editar-perfil";
    $paciente = $this -> model -> getOne($id);
    $messages = [
      'UPDATE_OK' => 'Los cambios han sido realizados con éxito.',
      'NOT_VALID_GENDER' => 'Seleccione un genero válido.',
      'NOT_VALID_DATE' => 'Seleccione una fecha de nacimiento válida.',
      'NOT_VALID_NAME' => 'Ingrese nombre y apellido válidos.',
      'NOT_VALID_PHONE' => 'Ingrese teléfono válido.',   
    ];
    require $this -> viewsDirectory . "editar-perfil.view.php";
  }

  public function actualizarPerfil() {
    $request = Request::getInstance();
    $updatedData = [
      "id" => $request -> getKey("id"),
      "dni" => $request -> getKey("dni"),
      "name" => $request -> getKey("nombre"),
      "lastname" => $request -> getKey("apellido"),
      "birthdate" => $request -> getKey("nacimiento"),
      "gender" => $request -> getKey("genero"),
      "email" => $request -> getKey("email"),
      "phone" => $request -> getKey("telefono"),
    ];

    $status = $this -> model -> update($updatedData);


    $this -> editarPerfil($updatedData, $status);

  }
}

?>