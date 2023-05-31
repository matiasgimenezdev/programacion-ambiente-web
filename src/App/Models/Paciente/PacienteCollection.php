<?php
namespace PAW\App\Models\Paciente;

use PAW\App\Models\Paciente\Paciente;
use PAW\Core\Model;
use PAW\Core\SubmitStatus;
use PAW\Core\Traits\Messenger;

class PacienteCollection extends Model
{
    use Messenger;
<<<<<<< HEAD

    private $table = 'paciente';

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
=======
    public $table = "paciente";
>>>>>>> 363f9da3f0e668ef4599ed2dd8e69f823ea48419

    public function getOne($id)
    {
        $pacienteInstance = new Paciente;
        // Podriamos hacer que la clase QueryBuilder sea Singleton, de forma que nos evitamos tener que pasarla como dependencia.
        $pacienteInstance -> setQueryBuilder($this -> queryBuilder);
        $pacienteInstance->set($this-> queryBuilder -> selectByColumn($this -> table, "id_paciente", $id));
        return $pacienteInstance;
    }

    public function register($registerData)
    {
        if ($registerData["terms-conditions"] === "true") {
            $pacienteInstance = new Paciente;
            // Podriamos hacer que la clase QueryBuilder sea Singleton, de forma que nos evitamos tener que pasarla como dependencia.
            $pacienteInstance -> setQueryBuilder($this -> queryBuilder);
            $registerStatus = $pacienteInstance -> register($registerData);
            $this->queryBuilder->insert($this->table, $registerStatus["fields"], $registerStatus["columns"]);
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

    public function getByDni($dni)
    {
        $pacienteInstance = new Paciente;
        $result = $this->queryBuilder->selectByColumn($this->table, "dni", $dni);
        $pacienteInstance->set($result[0]);
        return $pacienteInstance;
    }



}
?>