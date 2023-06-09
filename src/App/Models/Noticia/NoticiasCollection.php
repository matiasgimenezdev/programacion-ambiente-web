<?php
namespace PAW\App\Models\Noticia;

use PAW\App\Models\Noticia\Noticia;
use PAW\Core\Model;

class NoticiasCollection extends Model
{
    private array $noticias = [
        [
            "id" => 1,
            "title" => "Consejos útiles para pacientes con enfermedad
                respiratoria en épocas del COVID-19",
            "description" => "El equipo de Neumonología de la clínica Universitaria
                responde las preguntas más frecuentes a su especialidad
                respecto del Covid-19. Además, brindan consejos y
                medidas de prevención para implementar en nuestro día a
                día.",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.",
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
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.",
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
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.",
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
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime
            deleniti ipsam adipisci. Vero possimus distinctio enim deserunt quidem. Iste
            alias natus possimus nisi architecto nulla accusamus, repellendus fugit
            laudantium dolores.",
            "img" => "/assets/images/noticias/obesidad.jpg",
            "imgAlt" => "Médico calculando el perimetro al paciente"
        ]
    ];

    public function getAll()
    {
        $noticiasCollection = [];
        foreach ($this->noticias as $noticia) {
            $noticiaInstance = new Noticia;
            $noticiaInstance->set($noticia);
            $noticiasCollection[] = $noticiaInstance;
        }
        return $noticiasCollection;
    }

    public function getOne($id)
    {
        $noticiaInstance = new Noticia;
        $ids = array_column($this->noticias, 'id');
        $index = array_search($id, $ids);
        $noticiaInstance->set($this->noticias[$index]);
        return $noticiaInstance;
    }

    public function getLatest($amount)
    {
        $latest = [];
        for ($i = count($this->noticias) - 1; $amount > 0; $i--) {
            $noticiaInstance = new Noticia;
            $noticia = $this->noticias[$i];
            $noticiaInstance->set($noticia);
            $latest[] = $noticiaInstance;
            $amount--;
        }
        return $latest;
    }
}


?>