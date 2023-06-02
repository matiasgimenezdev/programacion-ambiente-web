<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;
use PAW\App\Models\Profesional\ProfesionalesCollection;

class ProfesionalesController extends AbstractController
{
  public ?string $modelName = ProfesionalesCollection::class;

  public function profesionales()
  {
    $searchText = "";
    $profesionales = $this-> model ->getProfesionales();
    $renderer = Renderer::getInstance();
    $templateLoader = $renderer -> getTemplateLoader();
    $template = $templateLoader->load('profesionales.twig');
    session_start();
    $sessionId = $_SESSION['id'] ?? "";
    echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Profesionales', 
    'style' => 'profesionales', 'profesionales' => $profesionales, 'searchText' => $searchText, 'session' => $sessionId]);
  }

  public function search()
  {
    $request = Request::getInstance();
    $searchText = $request->getKey("profesional");
    $searchText = ucfirst(strtolower(trim($searchText)));
    if (strlen($searchText) > 0) {
      $profesionales = $this->model->getAll();
      //TODO Implementar busqueda de profesionales
      // $profesionales = $this -> model -> get($searchText);
    } else {
      $profesionales = $this->model->getAll();
    }
    $renderer = Renderer::getInstance();
    $templateLoader = $renderer -> getTemplateLoader();
    $template = $templateLoader->load('profesionales.twig');
    session_start();
    $sessionId = $_SESSION['id'] ?? "";
    echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Profesionales', 
    'style' => 'profesionales', 'profesionales' => $profesionales, 'searchText' => $searchText, 'session' => $sessionId]);
  }

  public function getAll() {
    $profesionales = $this -> model -> getProfesionales();
    echo json_encode($profesionales);
  }

}

?>