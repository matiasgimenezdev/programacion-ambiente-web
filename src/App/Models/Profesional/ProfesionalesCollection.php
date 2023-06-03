<?php
namespace PAW\App\Models\Profesional;
use PAW\App\Models\Profesional\Profesional;
use PAW\Core\Model;

  class ProfesionalesCollection extends Model{

    public $table = 'profesional';

    public function get($searchText) {
      //TODO Implementar consulta a la BDD filtrando por el texto de busqueda ingresado por el usuario
    }

    public function getAll() {
      $profesionalesCollection = [];
      $profesionales = $this->queryBuilder->select();
      foreach ($profesionales as $profesional) {
        $profesionalInstance = new Profesional;
        $profesionalInstance->set($profesional);
        $profesionalesCollection[] = $profesionalInstance;
      }
      return $profesionalesCollection;
    }

    public function getProfesionales(){
      $profesionales = $this->queryBuilder->join([$this->table, 'especialidad'], ['id_especialidad', 'id_especialidad'], 'especialidad.name as area, profesional.name as name,profesional.lastname as lastname,  profesional.description as description');
      return $profesionales;
  }
  }

?>