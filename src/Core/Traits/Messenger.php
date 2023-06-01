<?php 
    namespace PAW\Core\Traits;

    trait Messenger {
        public $messages = [
            'NOT_VALID_DNI' => 'Ingrese un DNI válido',
            'NOT_VALID_NAME' => 'Ingrese un nombre y apellido válidos',
            'NOT_VALID_EMAIL' => 'Ingrese un e-mail válido',
            'EMAIL_DONT_MATCH' => 'Los e-mails no coinciden',
            'IS_USED_EMAIL' => 'Ya existe un paciente registrado con ese e-mail',
            'IS_USED_DNI' => 'Ya existe un paciente registrado con ese DNI',
            'NOT_VALID_PASSWORD' => 'La contraseña debe contener letras y números',
            'WRONG_PASSWORD' => 'La contraseña o el email son incorrectos',
            'PASSWORD_DONT_MATCH' => 'Las contraseñas no coinciden',
            'NOT_CONFIRMED_TERMS' => '¿Esta de acuerdo con los términos y condicones?',
            'NOT_VALID_GENDER' => 'Seleccione un genero válido.',
            'NOT_VALID_PHONE' => 'Ingrese teléfono válido.',   
            'UPDATE_OK' => 'Los cambios han sido realizados con éxito.',
            'CANCEL_OK' => 'El turno fue cancelado con exito',
            'NOT_VALID_BIRTHDATE' => 'Seleccione una fecha de nacimiento válida',
            'NOT_VALID_AGE' => 'Ingrese una edad válida',
            'NOT_VALID_AGE_OR_BIRTHDATE' => 'La fecha de nacimiento y edad ingresados no coinciden',
            'NOT_VALID_SPECIALTY' => 'Ingrese una especialidad válida',
            'NOT_VALID_PROFESIONAL' => 'Ingrese un profesional válido',
            'NOT_VALID_SHIFTDATE' => 'Ingrese una fecha de turno válida',
            'NOT_VALID_SHIFTTIME' => 'Ingrese una hora válida para el turno',
            'NOT_VALID_SOCIALWORK' => 'Ingrese una obra social váida',
            'EXCEEDED_FILE_SIZE' => 'El tamaño maximo de archivo es de 20MB',
            'NOT_ALLOWED_FILE_TYPE' => 'Tipo de archivo incorrecto (Solo validos archivos JPG, PDF, JPEG O PNG)',
        ];


        public function getMessage ($status): string {
            return $this -> messages[$status -> value] ?? "";
        }
    }
?>