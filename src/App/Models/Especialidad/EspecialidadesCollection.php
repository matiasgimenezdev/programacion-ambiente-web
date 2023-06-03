<?php
    namespace PAW\App\Models\Especialidad;
    use PAW\App\Models\Especialidad\Especialidad;
    use PAW\Core\Model;

    class EspecialidadesCollection extends Model{

        public $table = 'especialidad';

        public function get($searchText) {
            $especialidades = $this->queryBuilder->selectByColumnWithFilter($this->table, "name", $searchText);
            return $especialidades;
        }

        public function getAll() {
            $especialidades = $this->queryBuilder->select($this->table);
            $especialidadesCollection = [];
            foreach ($especialidades as $especialidad) {
                $especialidadInstance = new Especialidad;
                $especialidadInstance->set($especialidad);
                $especialidadesCollection[] = $especialidadInstance;
            }
            return $especialidadesCollection;
        }

        public function getEspecialidades(){
            $especialidades = $this->queryBuilder->select($this->table);
            return $especialidades;
        }
    }

?>