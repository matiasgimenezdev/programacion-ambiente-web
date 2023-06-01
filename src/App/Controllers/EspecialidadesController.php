<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\Core\Request;
    use PAW\Core\Renderer;
    use PAW\App\Models\Especialidad\EspecialidadesCollection;

    class EspecialidadesController extends AbstractController {
        public ?string $modelName = EspecialidadesCollection::class;

        public function especialidades() {
            $title = "Especialidades";
            $style = "especialidades";
            $searchText = "";
            $especialidades = $this -> model -> getAll();
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('especialidades.twig');
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Especialidades', 
            'style' => 'especialidades', 'especialidades' => $especialidades, 'searchText' => $searchText]);
        }

        public function search() {
            $request = Request::getInstance();
            $searchText = $request -> getKey("especialidad");
            $searchText = ucfirst(strtolower(trim($searchText)));
            if(strlen($searchText) > 0){
                $especialidades = $this -> model -> getAll();
                //TODO Implementar busqueda de especialidades
                // $especialidades = $this -> model -> get($searchText);
            } else {
                $especialidades = $this -> model -> getAll();
            }

            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('especialidades.twig');
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Especialidades', 
            'style' => 'especialidades', 'especialidades' => $especialidades, 'searchText' => $searchText]);
        }

        public function getAll() {
            $especialidades = $this -> model -> getEspecialidades();
            return json_encode($especialidades);
        }

    }

?>