<?php
require __DIR__ . "/../vendor/autoload.php";

use PAW\Core\Request;
use PAW\Core\Router;
use PAW\Core\Config;


$request = Request::getInstance();
$router = Router::getInstance();
$router -> setLogger();
$config = Config::getInstance();

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



$router->get("/", "PageController", "home");
$router->get("/turnos", "PageController", "turnos");
$router->get("/especialidades", "EspecialidadesController", "especialidades");
$router->get("/especialidad-search", "EspecialidadesController", "search");
$router->get("/profesionales", "ProfesionalesController", "profesionales");
$router->get("/profesional-search", "ProfesionalesController", "search");
$router->get("/institucional", "PageController", "institucional");
$router->get("/noticias", "NoticiasController", "noticias");
$router->get("/noticia", "NoticiasController", "noticia");
$router->get("/obras-sociales", "PageController", "obrasSociales");
$router->get("/contacto", "PageController", "contacto");
$router->get("/login", "PageController", "iniciarSesion");
$router->get("/register", "PageController", "registrarse");
?>