<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\Core\Renderer;


    class ErrorController extends AbstractController {

        public function notFound() {
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('Error/error.twig');
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Not Found', 'style' => 'error']);
            
        }

        public function internalError() {
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('Error/error.twig');
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Internal Server Error', 'style' => 'error']);
        }

    }
?>