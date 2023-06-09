<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\Core\Request;
    use PAW\Core\Renderer;
    use PAW\App\Models\Especialidad\EspecialidadesCollection;

    class EspecialidadesController extends AbstractController {
        public ?string $modelName = EspecialidadesCollection::class;

        public function especialidades() {
            $searchText = "";
            $especialidades = $this -> model -> getEspecialidades();
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('especialidades.twig');
            session_start();
            $sessionId = $_SESSION['id'] ?? "";
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Especialidades', 
            'style' => 'especialidades', 'especialidades' => $especialidades, 'searchText' => $searchText, 'session' => $sessionId]);
        }

        public function search() {
            $request = Request::getInstance();
            $searchText = $request -> getKey("especialidad");
            $searchText = ucfirst(strtolower(trim($searchText)));
            if(strlen($searchText) > 0){
                $especialidades = $this -> model -> get($searchText);
            } else {
                $especialidades = $this -> model -> getEspecialidades();
            }
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('especialidades.twig');
            session_start();
            $sessionId = $_SESSION['id'] ?? "";
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Especialidades', 
            'style' => 'especialidades', 'especialidades' => $especialidades, 'searchText' => $searchText, 'session' => $sessionId]);
        }

        public function getAll() {
            $especialidades = $this -> model -> getEspecialidades();
            echo json_encode($especialidades);
        }
    }

?>