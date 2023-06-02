<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\Core\Request;
    use PAW\App\Models\Especialidad\EspecialidadesCollection;

    class EspecialidadesController extends AbstractController {
        public ?string $modelName = EspecialidadesCollection::class;

        public function especialidades() {
            $title = "Especialidades";
            $style = "especialidades";
            $searchText = "";
            $especialidades = $this -> model -> getAll();
            require $this -> viewsDirectory . "especialidades.view.php";
        }

        public function search() {
            $request = Request::getInstance();
            $searchText = $request -> getKey("especialidad");
            $searchText = ucfirst(strtolower(trim($searchText)));
            $title = "Especialidades";
            $style = "especialidades";
            if(strlen($searchText) > 0){
                $especialidades = $this -> model -> getAll();
                // $especialidades = $this -> model -> get($searchText);
            } else {
                $especialidades = $this -> model -> getAll();
            }
            require $this -> viewsDirectory . "especialidades.view.php";
        }

        public function getAll() {
            $especialidades = $this -> model -> getEspecialidades();
            return json_encode($especialidades);
        }


    }

?>