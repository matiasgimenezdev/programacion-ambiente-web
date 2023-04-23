<?php 
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;

    class PageController extends AbstractController{

        public function home() {
            $style = "home";
            $title = "Inicio";
            require $this -> viewsDirectory."home.view.php";
        }

        public function turnos() {
            $style = "turnos";
            $title = "Turnos";
            require $this -> viewsDirectory."turnos.view.php";

        }
    }

?>