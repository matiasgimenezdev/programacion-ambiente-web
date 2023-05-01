<?php
namespace PAW\App\Models\Paciente;

enum SubmitStatus: string {
    case NOT_VALID_DNI = 'NOT_VALID_DNI'; 
    case NOT_VALID_NAME = 'NOT_VALID_NAME'; 
    case NOT_VALID_EMAIL = 'NOT_VALID_EMAIL'; 
    case IS_USED_EMAIL = 'IS_USED_EMAIL'; 
    case NOT_VALID_PASSWORD = 'NOT_VALID_PASSWORD'; 
    case NOT_CONFIRMED_TERMS = 'NOT_CONFIRMED_TERMS';
    case NOT_VALID_GENDER = 'NOT_VALID_GENDER';
    case NOT_VALID_DATE = 'NOT_VALID_DATE';
    case NOT_VALID_PHONE = 'NOT_VALID_PHONE';
    case REGISTER_OK = 'REGISTER_OK';
    case LOGIN_OK = 'LOGIN_OK';
    case UPDATE_OK = 'UPDATE_OK';
}
?>