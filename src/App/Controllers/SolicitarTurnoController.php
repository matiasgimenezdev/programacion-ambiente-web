<?php
namespace PAW\App\Controllers;

use PAW\App\Models\Turno\TurnosCollection;
use PAW\Core\AbstractController;
use PAW\Core\Request;

class SolicitarTurnoController extends AbstractController
{
  public ?string $modelName = TurnosCollection::class;

  public function solicitarTurno()
  {
    $request = Request::getInstance();
    $registerData = [
      "dni" => $request->getKey("dni"),
      "name" => $request->getKey("nombre"),
      "lastname" => $request->getKey("apellido"),
      "genero" => $request->getKey("sexo"),
      "fecha-nacimiento" => $request->getKey("nacimiento"),
      "edad" => $request->getKey("edad"),
      "email" => $request->getKey("email"),
      "telefono" => $request->getKey("telefono"),
      "especialidad" => $request->getKey("especialidad"),
      "profesional" => $request->getKey("medico"),
      "obra-social" => $request->getKey("obra-social"),
      "fecha-turno" => $request->getKey("fecha-turno"),
      "hora-turno" => $request->getKey("hora-turno"),
    ];

    $status = $this->model->solicitarTurno($registerData);
    $messages = [
      'NOT_VALID_DNI' => 'Ingrese un DNI válido',
      'NOT_VALID_NAME' => 'Ingrese un nombre y apellido válidos',
      'NOT_VALID_EMAIL' => 'Ingrese un e-mail válido',
      'NOT_VALID_GENDER' => 'Ingrese un género válido',
      'NOT_VALID_BIRTHDATE' => 'Ingrese una fecha de nacimiento válida',
      'NOT_VALID_AGE' => 'Ingrese una edad válida',
      'NOT_VALID_PHONE' => 'Ingrese un teléfono válido',
      'NOT_VALID_SPECIALTY' => 'Ingrese una especialidad válida',
      'NOT_VALID_PROFESIONAL' => 'Ingrese un profecional válido',
      'NOT_VALID_SHIFTDATE' => 'Ingrese una fecha de turno válida',
      'NOT_VALID_SHIFTTIME' => 'Ingrese una hora válida para el turno',
      'NOT_VALID_SOCIALWORK' => 'Ingrese una obra social váida',
    ];

    if ($status->value === "REGISTER_OK") {
      // $id = $this -> model -> getId($dni);
      // Obtendría el ID que le fue asignado y lo redirige a la pagina de su perfil por si desea seguir cargando mas datos personales.
      header('Location: /turnos?id=' . "1");

    } else {
      $title = "Solicitar Turno";
      $style = "solicitar-turno";
      require $this->viewsDirectory . "solicitar-turno.view.php";
    }
  }

}


?>