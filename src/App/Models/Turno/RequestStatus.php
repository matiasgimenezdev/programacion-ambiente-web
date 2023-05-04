<?php
namespace PAW\App\Models\Turno;

enum RequestStatus: string {
    case NOT_VALID_DNI = 'NOT_VALID_DNI'; 
    case NOT_VALID_NAME = 'NOT_VALID_NAME'; 
    case NOT_VALID_EMAIL = 'NOT_VALID_EMAIL'; 
    case NOT_VALID_GENDER = 'NOT_VALID_GENDER';
    case NOT_VALID_BIRTHDATE = 'NOT_VALID_BRTHDATE';
    case NOT_VALID_AGE = 'NOT_VALID_AGE';
    case NOT_VALID_PHONE = 'NOT_VALID_PHONE';
    case NOT_VALID_SPECIALTY = 'NOT_VALID_SPECIALTY';
    case NOT_VALID_PROFESIONAL = 'NOT_VALID_PROFESIONAL';
    case NOT_VALID_SHIFTDATE = 'NOT_VALID_SHIFTDATE';
    case NOT_VALID_SHIFTTIME = 'NOT_VALID_SHIFTTIME';
    case NOT_VALID_SOCIALWORK = 'NOT_VALID_SOCIALWORK';
    case REGISTER_OK = 'REGISTER_OK';
}
?>