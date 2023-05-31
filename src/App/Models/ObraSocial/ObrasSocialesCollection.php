<?php
namespace PAW\App\Models\ObraSocial;

use PAW\App\Models\ObraSocial\ObraSocial;
use PAW\Core\Model;

class ObrasSocialesCollection extends Model
{

  public function getAll()
  {
    $obrasSociales = [
      [
        "id" => 1,
        "name" => "Swiss Medical",
        "img" => "assets/images/obras-sociales/SwissMedical.svg",
      ],
      [
        "id" => 2,
        "name" => "Jerarquicos Salud",
        "img" => "assets/images/obras-sociales/JerarquicosSalud.png",
      ],
      [
        "id" => 3,
        "name" => "IOMA - Instituto Obra Médico Asistencial",
        "img" => "assets/images/obras-sociales/IOMA.png",
      ],
      [
        "id" => 4,
        "name" => "OSDE - Organización de Servicios Directos Empresarios",
        "img" => "assets/images/obras-sociales/OSDE.png",
      ],
      [
        "id" => 5,
        "name" => "PAMI - Programa de Atención Médica Integral",
        "img" => "assets/images/obras-sociales/PAMI.svg",
      ],
      [
        "id" => 6,
        "name" => "Medife",
        "img" => "assets/images/obras-sociales/Medife.jpg",
      ]
    ];
    $obrasSocialesCollection = [];
    foreach ($obrasSociales as $obraSocial) {
      $obrasSocialesInstance = new ObraSocial;
      $obrasSocialesInstance->set($obraSocial);
      $obrasSocialesCollection[] = $obrasSocialesInstance;
    }
    return $obrasSocialesCollection;
  }
}

?>