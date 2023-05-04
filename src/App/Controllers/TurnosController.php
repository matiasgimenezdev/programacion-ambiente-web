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
    $request = Request::getInstance();
    $id = $request->getKey("id");
    $title = "Turnos";
    $style = "turnos";
    $searchText = "";
    $turnos = $this->model->getOne($id);
    require $this->viewsDirectory . "turnos.view.php";
  }

}

?>