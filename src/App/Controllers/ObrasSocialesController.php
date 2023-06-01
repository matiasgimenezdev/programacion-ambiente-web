<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\App\Models\ObraSocial\ObrasSocialesCollection;
use PAW\Core\Renderer;


class ObrasSocialesController extends AbstractController
{
  public ?string $modelName = ObrasSocialesCollection::class;

  public function obrasSociales()
  {  
    $obrasSociales = $this-> model-> getAll();
    $renderer = Renderer::getInstance();
    $templateLoader = $renderer -> getTemplateLoader();
    $template = $templateLoader->load('obras-sociales.twig');
    echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Obras Sociales', 
      'style' => 'obras-sociales', 'obrasSociales' => $obrasSociales]);
  }
}

?>