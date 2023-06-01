<?php
namespace PAW\App\Controllers;

use PAW\Core\AbstractController;
use PAW\Core\Request;
use PAW\Core\Renderer;
use PAW\App\Models\Noticia\NoticiasCollection;

class NoticiasController extends AbstractController
{
    public ?string $modelName = NoticiasCollection::class;

    public function noticias()
    {
        $noticias = $this->model->getAll();
        $renderer = Renderer::getInstance();
        $templateLoader =  $renderer->getTemplateLoader();
        $template = $templateLoader->load('noticias.twig');
        echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 
            'title' => "Noticias", 'style' => "noticias", 'noticias' => $noticias]);
    }

    public function noticia()
    {
        $request = Request::getInstance();
        $id = $request->getKey("id");
        $noticia = $this->model->getOne($id);
        $renderer = Renderer::getInstance();
        $templateLoader =  $renderer->getTemplateLoader();
        $template = $templateLoader->load('noticia.twig');
        echo $template->render(['headerMenu' => $this -> headerMenu,'footerMenu' => $this -> footerMenu, 
            'title' => "Noticia", 'style' => "noticia", 'noticia' => $noticia]);
    }

    public function ultimasNoticias($amount)
    {
        return $this -> model -> getLatest($amount);
    }

}


?>