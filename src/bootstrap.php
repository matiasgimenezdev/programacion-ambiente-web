<?php 
    require __DIR__."/../vendor/autoload.php";

    use PAW\Core\Request;
    use PAW\Core\Router;

    $request = Request::getInstance();
    $router = Router::getInstance();

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    $router -> get("/", "PageController", "home");
    $router -> get("/turnos", "PageController", "turnos");
?>

