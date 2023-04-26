<?php
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\App\Models\Noticia\NoticiasCollection;

    class NoticiasController extends AbstractController {
        public ?string $modelName = NoticiasCollection::class;

        public function noticias () {
            $title = "Noticias";
            $style = "noticias";
            $noticias = $this-> model-> getAll();
            require $this -> viewsDirectory . "noticias.view.php"; 
        }
    }


?>
