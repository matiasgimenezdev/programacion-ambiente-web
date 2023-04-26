<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\App\Models\Profesional\ProfesionalesCollection;

class ProfesionalesController extends AbstractController
{
  public ?string $modelName = ProfesionalesCollection::class;

  public function profesionales()
  {
    $title = "Profesionales";
    $style = "profesionales";
    $searchText = "";
    $profesionales = $this->model->getAll();
    require $this->viewsDirectory . "profesionales.view.php";
  }

  public function search()
  {
    $request = Request::getInstance();
    $searchText = $request->getKey("profesional");
    $searchText = ucfirst(strtolower(trim($searchText)));
    $title = "Profesionales";
    $style = "profesionales";
    if (strlen($searchText) > 0) {
      $profesionales = $this->model->getAll();
      // $profesionales = $this -> model -> get($searchText);
    } else {
      $profesionales = $this->model->getAll();
    }
    require $this->viewsDirectory . "profesionales.view.php";
  }
}

?>