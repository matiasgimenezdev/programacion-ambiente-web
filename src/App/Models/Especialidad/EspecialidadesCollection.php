<?php
    namespace PAW\App\Models\Especialidad;
    use PAW\App\Models\Especialidad\Especialidad;
    use PAW\Core\Model;

    class EspecialidadesCollection extends Model{

        public $table = 'especialidad';

        public function getAll() {

            /*$especialidades = [
                [
                    "id" => 1,
                    "name" => "Odontologia",
                    "description" => "Odontologia description - Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Sapiente assumenda, nisi esse laborum
                    necessitatibus rem libero expedita deleniti? Eaque quod
                    tempore illum voluptates consequuntur laudantium.
                    Corporis nulla nostrum eos doloribus!"
                ],
                [
                    "id" => 2,
                    "name" => "Cardiologia",
                    "description" => "Cardiologia description - Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Sapiente assumenda, nisi esse laborum
                    necessitatibus rem libero expedita deleniti? Eaque quod
                    tempore illum voluptates consequuntur laudantium.
                    Corporis nulla nostrum eos doloribus!"
                ]
            ];*/
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
            $json = json_encode($especialidades);
            header("Content-Type: application/json");
            echo $json;
        }
    }

?>