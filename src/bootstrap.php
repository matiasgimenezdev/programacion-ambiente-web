<?php
require __DIR__ . "/../vendor/autoload.php";

use Paw\Core\Database\ConnectionBuilder;
use PAW\Core\Request;
use PAW\Core\Router;
use PAW\Core\Config;


$request = Request::getInstance();
$router = Router::getInstance();
$router->setLogger();
$config = Config::getInstance();

$connectionBuilder = new ConnectionBuilder();
$connectionBulilder->setLogger($log);
$connection = $connectionBuilder->make($config);

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$router->get("/", "HomeController", "home");
$router->get("/solicitar-turno", "TurnosController", "solicitarTurno");
$router->post("/solicitar-turno", "TurnosController", "registrarTurno");
$router->get("/cancelar-turno", "TurnosController", "cancelarTurno");
$router->get("/turnos", "TurnosController", "turnos");
$router->get("/turno-search", "TurnosController", "search");
$router->get("/especialidades", "EspecialidadesController", "especialidades");
$router->get("/especialidad-search", "EspecialidadesController", "search");
$router->get("/profesionales", "ProfesionalesController", "profesionales");
$router->get("/profesional-search", "ProfesionalesController", "search");
$router->get("/institucional", "PageController", "institucional");
$router->get("/turneroMedico", "PageController", "turneroMedico");
$router->get("/turneroClinica", "PageController", "turneroClinica");
$router->get("/turneroPaciente", "PageController", "turneroPaciente");
$router->get("/noticias", "NoticiasController", "noticias");
$router->get("/noticia", "NoticiasController", "noticia");
$router->get("/obras-sociales", "ObrasSocialesController", "obrasSociales");
$router->get("/contacto", "PageController", "contacto");
$router->get("/login", "PageController", "login");
$router->post("/login", "LoginController", "login");
$router->get("/register", "PageController", "register");
$router->post("/register", "RegisterController", "register");
$router->get("/terminos", "PageController", "terminos");
$router->get("/perfil", "PacienteController", "perfil");
$router->get("/perfil/editar", "PacienteController", "editarPerfil");
$router->post("/perfil/actualizar", "PacienteController", "actualizarPerfil");
?>