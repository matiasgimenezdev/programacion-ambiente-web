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

  public function search()
  {
    $request = Request::getInstance();
    $searchText = $request->getKey("turno");
    $searchText = ucfirst(strtolower(trim($searchText)));
    $title = "Turnos";
    $style = "turnos";
    if (strlen($searchText) > 0) {
      $turnos = $this->model->getAll();
      // $profesionales = $this -> model -> get($searchText);
    } else {
      $turnos = $this->model->getAll();
    }
    require $this->viewsDirectory . "turnos.view.php";
  }
}

?>