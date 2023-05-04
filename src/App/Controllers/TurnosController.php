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

}

?>