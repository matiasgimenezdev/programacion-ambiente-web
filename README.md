# Programacion en ambiente web (PAW 2023) - Grupo 1

Este repositorio contiene los trabajos practicos que se iran entregando a lo largo de la cursada de la materia 📚.

## Integrantes del grupo <br>

Simón Di Leo <br>
Giménez Matías <br>

### Trabajo Práctico Nº 1: Maquetado Web

Realice la maquetación de todos los wireframes. Refleje en cada sección los tags HTML que mejor consideren que se adapta al contenido de la página a mostrar. En el caso del formulario, utilice los tags HTML y atributos que considere que mejor se adapten al tipo de dato del campo, para facilitar la validación.

### Trabajo Práctico Nº 2: Diseño Web

Tomando de base las maquetaciones presentadas, el ejercicio consiste en agregar el contenido CSS necesario para lograr que el maquetado se vea tal como se diseñaron los Wireframes. En caso de ser necesario, ajustar las características de los mismos para que se adapten al manual de identidad corporativa.
Tener en cuenta, asimismo, generar el código necesario para que las pantallas se adapten a las versiones mobile, desktop y de impresión.

### Trabajo Práctico Nº 3: Programación Backend (1)

El proyecto a partir de este TP debe ser MVC: Vista genera el código de salida al cliente, Controlador procesa peticiones, llama a modelos e invoca la Vista que corresponda, Modelo impacta en el medio de persistencia elegido. No es necesario en este TP que el proyecto haga persistencia real (eso será parte de un TP posterior). Esto no impide que el modelo sea construido, solo que no se generen las sentencias ni se conecte ningún motor.

### Trabajo Práctico Nº 4: Programación Frontend

En este punto de las prácticas, disponemos de un sitio que tiene un ciclo de vida petición / respuesta completa, pero que carece de comportamiento del lado del cliente. La programación en Frontend nos permite mejorar la experiencia de usuario, implementar flujos de trabajos que se ajusten a lo que el usuario demanda de aplicaciones modernas y otorgar comportamiento sofisticado a nuestra solución.
En este TP se abordará la creación de componentes (reutilizables) del sitio con comportamiento (carrusel, filtros, drag&drop), como también interactuar con contenido del servidor para que nuestros formularios dependan de estados que pueden cambiar en el tiempo (comportamiento que nos permitirá integrarnos vía AJAX con el backend más adelante).

### Trabajo Práctico Nº 5: Programación Backend (2)

Al llegar a este punto, lo que resta es integrar al proyecto una capa de persistencia. Se les solicitará que lo hagan vía algún motor de bases de datos relacional (pe MySQL o Postgresql). 
Además se incorporan nociones de plantillas y se les solicitará la migración a una librería que se pueda integrar al proyecto ya existente. Esta migración implica refactorizar ciertas partes del código base ya existente. Esta refactorización es parte de lo que se espera ver como evolución de los conceptos, así que es esperable que sea realizada dentro de los tiempos de entrega del TP.


#### Instrucciones de ejecución

-   Parado en el directorio raiz del proyecto, ejecutar:

```
$ composer install

$ cp .env.example .env # editar el .env con los valores deseados

$ phinx migrate -e development # ejecuta migrations

$ php -S localhost:8080 -t public
```


