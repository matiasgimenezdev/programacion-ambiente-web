<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;

    class ErrorController extends AbstractController {

        public function notFound() {
            $style = "error";
            $title = "Not Found";
            require $this -> viewsDirectory  . "Error/not-found.view.php";
        }

        public function internalError() {
            $style = "error";
            $title = "Internal Server Error";
            require $this -> viewsDirectory  . "Error/internal-error.view.php";
        }

    }
?>