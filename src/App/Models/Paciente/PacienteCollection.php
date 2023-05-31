<?php
namespace PAW\App\Models\Paciente;

use PAW\App\Models\Paciente\Paciente;
use PAW\Core\SubmitStatus;
use PAW\Core\Traits\Messenger;
use PAW\Core\Model;

class PacienteCollection extends Model
{
    use Messenger;
    private $pacientes = [
        [
            "id" => 1,
            "dni" => "12345678",
            "name" => "José",
            "lastname" => "Ramírez",
            "email" => "joseh87@gmail.com",
            "gender" => "M",
            "birthdate" => "1978-08-16",
            "phone" => "02324-15457825"
        ],
        [
            "id" => 2,
            "dni" => "87654321",
            "name" => "Armando",
            "lastname" => "Paredes",
            "email" => "armandop@gmail.com",
            "gender" => "M",
            "birthdate" => "1978-08-16",
            "phone" => "02323-353591"
        ]
    ];

    public function getOne($id)
    {
        $pacienteInstance = new Paciente;
        $ids = array_column($this->pacientes, 'id');
        $index = array_search($id, $ids);
        $pacienteInstance->set($this->pacientes[$index]);
        return $pacienteInstance;
    }

    public function register($registerData)
    {
        if ($registerData["terms-conditions"] === "true") {
            $pacienteInstance = new Paciente;
            $registerStatus = $pacienteInstance -> register($registerData);
            return $registerStatus;
        } else {
            $status = SubmitStatus::NOT_CONFIRMED_TERMS;
            return ["status" => $status, "message" => $this -> getMessage($status)];
        }
    }

    public function login($loginData)
    {
        $pacienteInstance = new Paciente;
        $loginStatus = $pacienteInstance->login($loginData);
        return $loginStatus;
    }

    public function update($updatedData)
    {
        // Obtiene el paciente de la BDD
        $pacienteInstance = $this->getByDni($updatedData["dni"]);
        $updateStatus = $pacienteInstance->update($updatedData);
        return $updateStatus;
    }

    private function getByDni($dni)
    {
        $pacienteInstance = new Paciente;
        $pacienteInstance->set($this->pacientes[0]);
        return $pacienteInstance;
    }



}
?>