<?php
namespace PAW\App\Models\Profesional;
use PAW\App\Models\Profesional\Profesional;

  class ProfesionalesCollection {

    public function getAll() {
      $profesionales = [
        [
          "id" => 1,
          "name" => "Matías Montecarlo",
          "especialidad" => "Odontología",
          "description" => "Matías Montecarlo description - Lorem, ipsum dolor sit amet consectetur adipisicing
          elit. Sapiente assumenda, nisi esse laborum
          necessitatibus rem libero expedita deleniti? Eaque quod
          tempore illum voluptates consequuntur laudantium.
          Corporis nulla nostrum eos doloribus!",
        ],
        [
          "id" => 2,
          "name" => "Javier Gutierrez",
          "especialidad" => "Cardiología",
          "description" => "Javier Gutierrez description - Lorem, ipsum dolor sit amet consectetur adipisicing
          elit. Sapiente assumenda, nisi esse laborum
          necessitatibus rem libero expedita deleniti? Eaque quod
          tempore illum voluptates consequuntur laudantium.
          Corporis nulla nostrum eos doloribus!",
        ]
      ];
      $profesionalesCollection = [];
      foreach ($profesionales as $profesional) {
        $profesionalInstance = new Profesional;
        $profesionalInstance->set($profesional);
        $profesionalesCollection[] = $profesionalInstance;
      }
      return $profesionalesCollection;
    }
  }

?>