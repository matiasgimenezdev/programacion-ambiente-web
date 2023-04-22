<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;

    class PageController extends AbstractController{

        public function home() {
            $style = "home";
            $title = "Inicio";
            require $this -> viewsDirectory."home.view.php";
        }
    }

?>