<?php
    namespace PAW\App\Controllers;
    use PAW\Core\AbstractController;
    use PAW\Core\Request;
    use PAW\App\Models\Noticia\NoticiasCollection;

    class NoticiasController extends AbstractController {
        public ?string $modelName = NoticiasCollection::class;

        public function noticias () {
            $title = "Noticias";
            $style = "noticias";
            $noticias = $this-> model-> getAll();
            require $this -> viewsDirectory . "noticias.view.php"; 
        }

        public function noticia() {
            $request = Request::getInstance();
            $id = $request -> getKey("id");
            $noticia = $this -> model -> getOne($id);
            $title = "Noticia";
            $style = "noticia";
            require $this -> viewsDirectory . "noticia.view.php";
        }
        
    }


?>
