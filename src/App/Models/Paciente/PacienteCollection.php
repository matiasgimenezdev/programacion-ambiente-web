<?php
namespace PAW\App\Models\Paciente;

use PAW\App\Models\Paciente\Paciente;
use PAW\Core\Model;
use PAW\Core\SubmitStatus;
use PAW\Core\Traits\Messenger;

class PacienteCollection extends Model
{
    use Messenger;

    public $table = "paciente";

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