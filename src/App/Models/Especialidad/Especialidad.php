<?php 
    namespace PAW\App\Models\Especialidad;

    use PAW\Core\Model;
    
    class Especialidad extends Model{

        private $table = 'especialidad';

        private $fields = [
            "id_especialidad" => null,
            "name" => null,
            "description" => null,
        ];

        public function getFields(){
            return $this->fields;
        }

        public function setId_especialidad($id) {
            $this -> fields["id_especialidad"] = $id;
        }

        public function getId() {
            return $this -> fields["id_especialidad"];
        }

        public function setName($name) {
            $this -> fields["name"] = $name;
        }

        public function setDescription($description) {
            $this -> fields["description"] = $description;
        }

        public function getName() {
            return $this -> fields["name"];
        }

        public function getDescription() {
            return $this -> fields["description"];
        }

        public function set(array $values) {
            foreach(array_keys($this -> fields) as $field){
                if(!isset($values[$field])){
                    continue;
                }
                $method = "set". ucfirst($field);
                $this -> $method($values[$field]);
            }
        }
    }
?>