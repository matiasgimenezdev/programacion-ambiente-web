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
    session_start();
    $searchText = "";
    // Debe utilizar $_SESSION["email"] para poder recuperar los turnos del paciente logueado y poder mostrarlo en la vista de turnos.
    $turnos -> $this -> getTurnos($_SESSION["email"]);
    if(isset($_SESSION["id"])) {
      $renderer = Renderer::getInstance();
      $templateLoader = $renderer -> getTemplateLoader();
      $template = $templateLoader->load('turnos.twig');
      echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Turnos', 
        'style' => 'turnos', 'turnos' => $turnos, 'searchText' => $searchText]);
    } else {
      header('Location: /login');
    }
  }

  public function getTurnos($email)
  {
    // Recupera los turnos del paciente.
    $turnos = $this -> model -> getTurnosPaciente('especialidad', 'profesional', 'paciente', $email);
    return json_encode($turnos);
  }

  public function getJoinTurnos()
  {
    /*$e = new Especialidad;
    $tableEspecialidad = $e->getFields();*/
    $turnos = $this -> model -> getJoinTurnos('especialidad', 'profesional');
    return json_encode($turnos);
  }

  public function solicitarTurno()
  {
    session_start();
    if(isset($_SESSION["id"])) {
      $title = "Solicitar Turno";
      $style = "solicitar-turno";
      $shiftData = [];
      $p = new ProfesionalesController;
      $profesionales = $p->model->getAll();
      $e = new EspecialidadesController;
      $especialidades = $e->model->getAll();
      $os = new ObrasSocialesController;
      $obrasSociales = $os->model->getAll();

      $renderer = Renderer::getInstance();
      $templateLoader = $renderer -> getTemplateLoader();
      $template = $templateLoader->load('solicitar-turno.twig');
      session_start();
      $sessionId = $_SESSION['id'] ?? "";
      echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Solicitar Turno', 
      'style' => 'solicitar-turno', 'profesionales' => $profesionales, 'especialidades' => $especialidades, 'obrasSociales' => $obrasSociales, 'session' => $sessionId]);
      // require $this->viewsDirectory . "solicitar-turno.view.php";
    } else {
      header('Location: /login');
    }
  }

  public function registrarTurno() {
    $request = Request::getInstance();

    $shiftData = $request -> getTurnData();
    $register = $this->model->solicitarTurno($shiftData);

    if ($register["status"]->value === "REGISTER_OK") {
      header('Location: /turnos');
    } else {
      $title = "Solicitar Turno";
      $style = "solicitar-turno";
      $p = new ProfesionalesController;
      $profesionales = $p->model->getAll();
      $e = new EspecialidadesController;
      $especialidades = $e->model->getAll();
      $os = new ObrasSocialesController;
      $obrasSociales = $os->model->getAll();
      $renderer = Renderer::getInstance();
      $templateLoader = $renderer -> getTemplateLoader();
      $template = $templateLoader->load('solicitar-turno.twig');
      session_start();
      $sessionId = $_SESSION['id'] ?? "";
      echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Solicitar Turno', 
      'style' => 'solicitar-turno', 'profesionales' => $profesionales, 'especialidades' => $especialidades, 'obrasSociales' => $obrasSociales, 'session' => $sessionId]);
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