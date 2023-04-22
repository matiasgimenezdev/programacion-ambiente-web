<?php 
    namespace PAW\App\Controllers;

    class PageController {

        public function home() {
            require __DIR__."/../Views/home.view.php";
        }
    }

?>