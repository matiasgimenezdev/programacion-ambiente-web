<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\Core\Renderer;


    class ErrorController extends AbstractController {

        public function notFound() {
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('Error/error.twig');
            session_start();
            $sessionId = $_SESSION['id'] ?? "";
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Not Found', 'style' => 'error', 'session' => $sessionId]);
            
        }

        public function internalError() {
            $renderer = Renderer::getInstance();
            $templateLoader = $renderer -> getTemplateLoader();
            $template = $templateLoader->load('Error/error.twig');
            session_start();
            $sessionId = $_SESSION['id'] ?? "";
            echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 'title' => 'Internal Server Error', 'style' => 'error']);
        }

    }
?>