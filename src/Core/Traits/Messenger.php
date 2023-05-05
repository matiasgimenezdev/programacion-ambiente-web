<?php 
    namespace PAW\Core\Traits;

    trait Messenger {
        public $messages = [
            'NOT_VALID_DNI' => 'Ingrese un DNI válido',
            'NOT_VALID_NAME' => 'Ingrese un nombre y apellido válidos',
            'NOT_VALID_EMAIL' => 'Ingrese un e-mail válido',
            'EMAIL_DONT_MATCH' => 'Los e-mails no coinciden',
            'IS_USED_EMAIL' => 'El email ya se encuentra en uso',
            'NOT_VALID_PASSWORD' => 'La contraseña debe contener letras y números',
            'WRONG_PASSWORD' => 'La contraseña o el email son incorrectos',
            'PASSWORD_DONT_MATCH' => 'Las contraseñas no coinciden',
            'NOT_CONFIRMED_TERMS' => '¿Esta de acuerdo con los términos y condicones?',
            'NOT_VALID_GENDER' => 'Seleccione un genero válido.',
            'NOT_VALID_DATE' => 'Seleccione una fecha de nacimiento válida.',
            'NOT_VALID_PHONE' => 'Ingrese teléfono válido.',   
            'UPDATE_OK' => 'Los cambios han sido realizados con éxito.',
        ];

        public function getMessage ($status): string {
            return $this -> messages[$status -> value] ?? "";
        }
    }
?>