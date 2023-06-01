<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\App\Models\Turno\TurnosCollection;

class TurnosController extends AbstractController
{
  public ?string $modelName = TurnosCollection::class;

  public function turnos()
  {
    $title = "Turnos";
    $style = "turnos";
    $searchText = "";
    $turnos = $this->model->getAll();
    require $this->viewsDirectory . "turnos.view.php";
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
      // $id = $this -> model -> getId($dni);
      // Obtendría el ID que le fue asignado y lo redirige a la pagina de su perfil por si desea seguir cargando mas datos personales.
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