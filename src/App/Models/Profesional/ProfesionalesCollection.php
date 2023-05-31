<?php
namespace PAW\App\Models\Profesional;
use PAW\App\Models\Profesional\Profesional;
use PAW\Core\Model;

  class ProfesionalesCollection extends Model{

    public function getAll() {
      $profesionales = [
        [
          "id" => 3737,
          "name" => "Tekito",
          "lastname" => "Lakarie",
          "especialidad" => "Odontología",
          "description" => "Matías Montecarlo description - Lorem, ipsum dolor sit amet consectetur adipisicing
          elit. Sapiente assumenda, nisi esse laborum
          necessitatibus rem libero expedita deleniti? Eaque quod
          tempore illum voluptates consequuntur laudantium.
          Corporis nulla nostrum eos doloribus!",
        ],
        [
          "id" => 2222,
          "name" => "Tarayado",
          "lastname" => "Tukoko",
          "especialidad" => "Cardiología",
          "description" => "Javier Gutierrez description - Lorem, ipsum dolor sit amet consectetur adipisicing
          elit. Sapiente assumenda, nisi esse laborum
          necessitatibus rem libero expedita deleniti? Eaque quod
          tempore illum voluptates consequuntur laudantium.
          Corporis nulla nostrum eos doloribus!",
        ],
        [
          "id" => 20202,
          "name" => "Tekuro",
          "lastname" => "Lakria",
          "especialidad" => "Cardiología",
          "description" => "Javier Gutierrez description - Lorem, ipsum dolor sit amet consectetur adipisicing
          elit. Sapiente assumenda, nisi esse laborum
          necessitatibus rem libero expedita deleniti? Eaque quod
          tempore illum voluptates consequuntur laudantium.
          Corporis nulla nostrum eos doloribus!",
        ],
        [
          "id" => 9595,
          "name" => "Isee",
          "lastname" => "Deadpeople",
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