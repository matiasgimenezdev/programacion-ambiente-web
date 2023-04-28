<?php
namespace PAW\App\Models\Paciente;

enum RegisterStatus: string {
    case NOT_VALID_DNI = 'NOT_VALID_DNI'; 
    case NOT_VALID_NAME = 'NOT_VALID_NAME'; 
    case NOT_VALID_EMAIL = 'NOT_VALID_EMAIL'; 
    case NOT_VALID_PASSWORD = 'NOT_VALID_PASSWORD'; 
    case NOT_CONFIRMED_TERMS = 'NOT_CONFIRMED_TERMS';
    case REGISTER_OK = 'REGISTER_OK';
}
?>