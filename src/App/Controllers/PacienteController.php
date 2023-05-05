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

  public function editarPerfil($updatedData = null, $update = null) {
    $request = Request::getInstance();
    $id = $request -> getKey("id");
    $title = "Editar datos";
    $style = "editar-perfil";
    $paciente = $this -> model -> getOne($id);

    require $this -> viewsDirectory . "editar-perfil.view.php";
  }

  public function actualizarPerfil() {
    $request = Request::getInstance();
    $updatedData = $request -> getUpdateData(); 

    $updateStatus = $this -> model -> update($updatedData);

    $this -> editarPerfil($updatedData, $updateStatus);

  }
}

?>