<?php 

namespace PAW\App\Controllers;
use PAW\Core\AbstractController;
use PAW\App\Controllers\NoticiasController;

class HomeController extends AbstractController {
    
    public function home() 
    {
        $noticiasController = new NoticiasController;
        $noticias = $noticiasController -> ultimasNoticias(3);
        $title = "Inicio";
        $style = "home";
        require $this -> viewsDirectory . "home.view.php";
    }
}
?>