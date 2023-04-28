<?php
namespace PAW\App\Models\Paciente;
use PAW\App\Models\Paciente\Paciente;
use PAW\App\Models\Paciente\SubmitStatus;

  class PacienteCollection {

      public function getOne($id) {
          $pacientes = [ 
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

        $pacienteInstance = new Paciente;
        $ids = array_column($pacientes, 'id');
        $index = array_search($id, $ids);
        $pacienteInstance->set($pacientes[$index]);
        return $pacienteInstance;
    }

	public function register($registerData) {
        if($registerData["terms-conditions"] === "true") {
			$pacienteInstance = new Paciente;
			$status = $pacienteInstance -> register($registerData);
            return $status;
		} else {
			return SubmitStatus::NOT_CONFIRMED_TERMS;
		}
	}

    public function login($loginData){
        $pacienteInstance = new Paciente;
        $status = $pacienteInstance -> login($loginData);
        return $status;
    }


  }
?>
