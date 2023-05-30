<?php
    namespace PAW\App\Models\Noticia;

    use PAW\Core\Model;
    
    class Noticia extends Model{
        private $fields = [
            "id" => null,
            "title" => null,
            "description" => null,
            "body" => null,
            "img" => null,
            "imgAlt" => null
        ];

        public function setId($id) {
            $this -> fields["id"] = $id;
        }

        public function setTitle($title) {
            $this -> fields["title"] = $title;
        }

        public function setDescription($description) {
            $this -> fields["description"] = $description;
        }

        public function setBody($body) {
            $this -> fields["body"] = $body;
        }

        public function setImg($img) {
            $this -> fields["img"] = $img;
        }

        public function setImgAlt($alt) {
            $this -> fields["imgAlt"] = $alt;
        }

        public function getId() {
            return $this -> fields["id"];
        }

        public function getTitle() {
            return $this -> fields["title"];
        }

        public function getDescription() {
            return $this -> fields["description"];
        }

        public function getBody() {
            return $this -> fields["body"];

        }

        public function getImg() {
            return $this -> fields["img"];
        }

        public function getImgAlt() {
            return $this -> fields["imgAlt"];
        }

        public function set(array $values)
        {
          foreach (array_keys($this->fields) as $field) {
            if (!isset($values[$field])) {
              continue;
            }
            $method = "set" . ucfirst($field);
            $this->$method($values[$field]);
          }
        }
    }

?>