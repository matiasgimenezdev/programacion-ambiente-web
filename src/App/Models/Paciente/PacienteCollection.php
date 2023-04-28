<?php
namespace PAW\App\Models\Paciente;
use PAW\App\Models\Paciente\Paciente;
use PAW\App\Models\Paciente\RegisterStatus;

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
                  "dateOfBirth" => "16/02/1987",
                  "phone" => "02324-457825"
              ],
              [
                  "id" => 2, 
                  "dni" => "87654321",
                  "name" => "Armando",
                  "lastname" => "Paredes",
                  "email" => "armandop@gmail.com",
                  "gender" => "M",
                  "dateOfBirth" => "16/08/1978",
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
			return RegisterStatus::NOT_CONFIRMED_TERMS;
		}
	}


  }
?>
