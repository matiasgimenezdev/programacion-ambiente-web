<?php 
    namespace PAW\App\Models\Especialidad;
    
    class Especialidad {
        private $fields = [
            "id" => null,
            "name" => null,
            "description" => null,
        ];

        public function setId($id) {
            $this -> fields["id"] = $id;
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