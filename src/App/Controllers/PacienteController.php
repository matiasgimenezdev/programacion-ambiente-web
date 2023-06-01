<?php
namespace PAW\App\Controllers;
use PAW\App\Models\Paciente\PacienteCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;

class PacienteController extends AbstractController {
  public ?string $modelName = PacienteCollection::class;

  public function perfil() {
    $request = Request::getInstance();
    $id = $request -> getKey("id");
    $paciente = $this -> model -> getOne($id);
    $renderer = Renderer::getInstance();
    $templateLoader = $renderer -> getTemplateLoader();
    $template = $templateLoader->load('perfil.html');
    echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Tu perfil', 
      'style' => 'perfil', 'paciente' => $paciente]);
  }

  public function editarPerfil($updatedData = null, $update = null) {
    $request = Request::getInstance();
    $id = $request -> getKey("id");
    $title = "Editar datos";
    $style = "editar-perfil";
    $paciente = $this -> model -> getOne($id);
    $renderer = Renderer::getInstance();
    $templateLoader = $renderer -> getTemplateLoader();
    $template = $templateLoader->load('editar-perfil.html');
    echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Editar datos', 
      'style' => 'editar-perfil', 'paciente' => $paciente, 'updatedData' => $updatedData, 'update' => $update]);
  }

  public function actualizarPerfil() {
    $request = Request::getInstance();
    $updatedData = $request -> getUpdateData(); 
    $updateStatus = $this -> model -> update($updatedData);
    $this -> editarPerfil($updatedData, $updateStatus);
  }
}

?>