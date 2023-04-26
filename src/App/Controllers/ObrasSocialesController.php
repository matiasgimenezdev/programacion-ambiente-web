<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\App\Models\ObraSocial\ObrasSocialesCollection;

class ObrasSocialesController extends AbstractController
{
  public ?string $modelName = ObrasSocialesCollection::class;

  public function obrasSociales()
  {
    $title = "Obras Sociales";
    $style = "obras-sociales";
    $searchText = "";
    $obrasSociales = $this->model->getAll();
    require $this->viewsDirectory . "obras-sociales.view.php";
  }

  public function search()
  {
    $request = Request::getInstance();
    $searchText = $request->getKey("obra-social");
    $searchText = ucfirst(strtolower(trim($searchText)));
    $title = "Obras Sociales";
    $style = "obras-sociales";
    if (strlen($searchText) > 0) {
      $obrasSociales = $this->model->getAll();
      // $profesionales = $this -> model -> get($searchText);
    } else {
      $obrasSociales = $this->model->getAll();
    }
    require $this->viewsDirectory . "obras-sociales.view.php";
  }
}

?>