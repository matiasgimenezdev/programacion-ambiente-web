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

#### Instrucciones de ejecución

-   Parado en el directorio raiz del proyecto, ejecutar:

```
$ composer install

$ cp .env.example .env

$ php -S localhost:8080 -t public
```
