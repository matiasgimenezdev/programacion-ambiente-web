<?php 
    namespace PAW\App\Models\Noticia;
    use PAW\App\Models\Noticia\Noticia;

    class NoticiasCollection {

        public function getAll () {
            $noticias = [
                [
                    "id" => 1,
                    "title" => "Consejos útiles para pacientes con enfermedad
					respiratoria en épocas del COVID-19",
                    "description" => "El equipo de Neumonología de la clínica Universitaria
					responde las preguntas más frecuentes a su especialidad
					respecto del Covid-19. Además, brindan consejos y
					medidas de prevención para implementar en nuestro día a
					día.",
                    "body" => "Body de la noticia",
                    "img" => "/assets/images/inicio/noticias/covid.jpg",
                    "imgAlt" => "Medica con barbijo levantando la mano"
                ],
                [
                    "id" => 2,
                    "title" => "Los riesgos de la automedicación",
                    "description" => "Múltiples factores confluyen en este hábito peligroso y
					que puede tener consecuencias negativas. Cada vez son
					más las personas que recurren, por sus propios medios, a
					la toma de un medicamento con el objetivo de tratar un
					dolor o contrarrestar una molestia.",
                    "body" => "Body de la noticia",
                    "img" => "/assets/images/inicio/noticias/medicacion.jpg",
                    "imgAlt" => "Persona con medicamentos en su mano"
                ],
                [
                    "id" => 3,
                    "title" => "Lactancia y vínculo afectivo",
                    "description" => "La leche materna proporciona los nutrientes necesarios
					para el bebé, pero cuando decimos “Fundamento de vida”
					nos referimos a que ayuda a desarrollar la inteligencia
					y las capacidades de lenguaje, de conocimiento, además
					de protegerlo de enfermedades infecciosas y crónicas.",
                    "body" => "Body de la noticia",
                    "img" => "/assets/images/inicio/noticias/lactancia.jpg",
                    "imgAlt" => "Madre amamantando a su bebe"
                ],
                [
                    "id" => 4,
                    "title" => "La obesidad dificulta el diagnóstico de las enfermedades
					cardiovasculares",
                    "description" => "El cardiólogo Francisco lópez-jeménez señaló que el
					enceso de masa corporal no sólo es un factor de riesgo
					para la salud, sino que, además, toma más compleja la
					detección de otras patologías a través de los exámenes
					médicos habituales",
                    "body" => "Body de la noticia",
                    "img" => "/assets/images/noticias/obesidad.jpg",
                    "imgAlt" => "Imagen de plato con comida"
                ]
            ];
            $noticiasCollection = [];
            foreach ($noticias as $noticia) {
              $noticiaInstance = new Noticia;
              $noticiaInstance->set($noticia);
              $noticiasCollection[] = $noticiaInstance;
            }
            return $noticiasCollection;
        }

        public function getOne($id) {
            $noticias = [
                [
                    "id" => 1,
                    "title" => "Consejos útiles para pacientes con enfermedad
					respiratoria en épocas del COVID-19",
                    "description" => "El equipo de Neumonología de la clínica Universitaria
					responde las preguntas más frecuentes a su especialidad
					respecto del Covid-19. Además, brindan consejos y
					medidas de prevención para implementar en nuestro día a
					día.",
                    "body" => "Body de la noticia 1",
                    "img" => "/assets/images/inicio/noticias/covid.jpg",
                    "imgAlt" => "Medica con barbijo levantando la mano"
                ],
                [
                    "id" => 2,
                    "title" => "Los riesgos de la automedicación",
                    "description" => "Múltiples factores confluyen en este hábito peligroso y
					que puede tener consecuencias negativas. Cada vez son
					más las personas que recurren, por sus propios medios, a
					la toma de un medicamento con el objetivo de tratar un
					dolor o contrarrestar una molestia.",
                    "body" => "Body de la noticia 2",
                    "img" => "/assets/images/inicio/noticias/medicacion.jpg",
                    "imgAlt" => "Persona con medicamentos en su mano"
                ],
                [
                    "id" => 3,
                    "title" => "Lactancia y vínculo afectivo",
                    "description" => "La leche materna proporciona los nutrientes necesarios
					para el bebé, pero cuando decimos “Fundamento de vida”
					nos referimos a que ayuda a desarrollar la inteligencia
					y las capacidades de lenguaje, de conocimiento, además
					de protegerlo de enfermedades infecciosas y crónicas.",
                    "body" => "Body de la noticia 3",
                    "img" => "/assets/images/inicio/noticias/lactancia.jpg",
                    "imgAlt" => "Madre amamantando a su bebe"
                ],
                [
                    "id" => 4,
                    "title" => "La obesidad dificulta el diagnóstico de las enfermedades
					cardiovasculares",
                    "description" => "El cardiólogo Francisco lópez-jeménez señaló que el
					enceso de masa corporal no sólo es un factor de riesgo
					para la salud, sino que, además, toma más compleja la
					detección de otras patologías a través de los exámenes
					médicos habituales",
                    "body" => "Body de la noticia 4",
                    "img" => "/assets/images/noticias/obesidad.jpg",
                    "imgAlt" => "Imagen de plato con comida"
                ]
            ];

            $noticiaInstance = new Noticia;
            $noticiaInstance->set($noticias[$id]);
            return $noticiaInstance;
        }

        // public function getLatest() {}
    }


?>