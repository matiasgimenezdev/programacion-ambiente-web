<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;
use PAW\App\Models\Turno\TurnosCollection;

class TurnosController extends AbstractController
{
  public ?string $modelName = TurnosCollection::class;

  public function turnos()
  {
    $searchText = "";
    $turnos = $this->model->getAll();
    $renderer = Renderer::getInstance();
    $templateLoader = $renderer -> getTemplateLoader();
    $template = $templateLoader->load('turnos.twig');
    echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Turnos', 
    'style' => 'turnos', 'turnos' => $turnos, 'searchText' => $searchText]);
  }

  public function getTurnos()
  {
    $turnos = $this -> model -> getTurnos();
    return json_encode($turnos);
  }

  public function solicitarTurno()
  {
    $title = "Solicitar Turno";
    $style = "solicitar-turno";
    $shiftData = [];
    $p = new ProfesionalesController;
    $profesionales = $p->model->getAll();
    $e = new EspecialidadesController;
    $especialidades = $e->model->getAll();
    $os = new ObrasSocialesController;
    $obrasSociales = $os->model->getAll();
    require $this->viewsDirectory . "solicitar-turno.view.php";
  }

  public function registrarTurno() {
    $request = Request::getInstance();

    $shiftData = $request -> getTurnData();
    $register = $this->model->solicitarTurno($shiftData);

    if ($register["status"]->value === "REGISTER_OK") {
      header('Location: /turnos');
    } else {
      // $shiftData = $shiftData;
      $title = "Solicitar Turno";
      $style = "solicitar-turno";
      $p = new ProfesionalesController;
      $profesionales = $p->model->getAll();
      $e = new EspecialidadesController;
      $especialidades = $e->model->getAll();
      $os = new ObrasSocialesController;
      $obrasSociales = $os->model->getAll();
      require $this->viewsDirectory . "solicitar-turno.view.php";
    }
  }

  public function cancelarTurno() {
    $request = Request::getInstance();
    $id = $request -> getKey($id);
    $cancel = $this->model->cancelarTurno($id);
    header('Location: /turnos');
  }

}

?>