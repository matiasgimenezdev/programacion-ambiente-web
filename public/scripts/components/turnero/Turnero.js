import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class Turnero {

  constructor($user) {

    if($user == "medico"){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroMedico.css',
      });
      document.head.appendChild($link);
      this.setViewMedico();

      // Solicita turnero.json
      const $url = 'scripts/components/turnero/turnero.json';
      fetch($url)
        .then((response) => response.json())
        .then((turnos) => {
          this.$turnos = turnos.turnos;
        }
      );
      
      const botonSiguiente = document.querySelector(".boton-siguiente");
      // Evento botón siguiente
      botonSiguiente.addEventListener('click', () => {
        this.siguienteTurno(this.$turnos[0]);
        this.$turnos.shift();
      });

    }

    if($user == "paciente"){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroPaciente.css',
      });
      document.head.appendChild($link);
      this.setViewPaciente();
    }

    if($user == ""){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroClinica.css',
      });
      document.head.appendChild($link);
      this.setViewClinica();
    }

  }


  // Métodos Médico View

  //Setea Elementos de Médico view
  setViewMedico(){
    const container = document.querySelector("main");
    
    // Add paciente section
    const infoPaciente = document.createElement("section");
    
    // Header -> Nombre del Paciente
    const headerSection = document.createElement("header");
    const nombrePaciente = document.createElement("h3");
    nombrePaciente.classList.add("nombre-paciente");

    headerSection.appendChild(nombrePaciente);
    infoPaciente.appendChild(headerSection);

    // Más datos del paciente
    const datosPaciente = document.createElement("dl");
    
    // DNI
    const dniData = document.createElement("div");
    dniData.classList.add("dni-data");
    const dni = document.createElement("dt");
    dni.textContent = 'DNI:';
    const dniValue = document.createElement("dd");
    dniValue.classList.add("dni-value");

    dniData.appendChild(dni);
    dniData.appendChild(dniValue);
    datosPaciente.appendChild(dniData);

    // Edad
    const edadData = document.createElement("div");
    edadData.classList.add("edad-data");
    const edad = document.createElement("dt");
    edad.textContent = 'Edad:';
    const edadValue = document.createElement("dd");
    edadValue.classList.add("edad-value");

    edadData.appendChild(edad);
    edadData.appendChild(edadValue);
    datosPaciente.appendChild(edadData);

    // Nacimiento
    const nacimientoData = document.createElement("div");
    nacimientoData.classList.add("nacimiento-data");
    const nacimiento = document.createElement("dt");
    nacimiento.textContent = 'Nacimiento:';
    const nacimientoValue = document.createElement("dd");
    nacimientoValue.classList.add("nacimiento-value");

    nacimientoData.appendChild(nacimiento);
    nacimientoData.appendChild(nacimientoValue);
    datosPaciente.appendChild(nacimientoData);

    // Genero
    const generoData = document.createElement("div");
    generoData.classList.add("genero-data");
    const genero = document.createElement("dt");
    genero.textContent = 'Genero:';
    const generoValue = document.createElement("dd");
    generoValue.classList.add("genero-value");

    generoData.appendChild(genero);
    generoData.appendChild(generoValue);
    datosPaciente.appendChild(generoData);

    infoPaciente.appendChild(datosPaciente);
    container.appendChild(infoPaciente);


    // Botón Siguiente
    const botonSiguiente = document.createElement("button");
    botonSiguiente.classList.add("boton-siguiente");
    botonSiguiente.textContent = "Siguiente";
    container.appendChild(botonSiguiente);
  }

  // Muestra Siguiente Turno
  siguienteTurno($turno){
    const nombrePaciente = document.querySelector(".nombre-paciente");
    nombrePaciente.textContent = $turno.nombre + " " + $turno.apellido;

    // Set dni value
    const dniValue = document.querySelector(".dni-value");
    dniValue.textContent = $turno.dni;

    // Set edad value
    const edadValue = document.querySelector(".edad-value");
    edadValue.textContent = $turno.edad;

    // Set nacimiento value
    const nacimientoValue = document.querySelector(".nacimiento-value");
    nacimientoValue.textContent = $turno.nacimiento;

    // Set genero value
    const generoValue = document.querySelector(".genero-value");
    generoValue.textContent = $turno.genero;
  }

  setViewPaciente(){
    const container = document.querySelector("main");
    const turnoUser = document.createElement("p");
    turnoUser.classList.add("turno-user");
    turnoUser.textContent = "Su turno: ";
    container.appendChild(turnoUser);

    this.setTurnos();
  }

  setViewClinica(){
    this.setTurnos();
  }

  setTurnos(){
    const container = document.querySelector("main");
    const turnos = document.createElement("section");
    turnos.classList.add("turnos");
    container.appendChild(turnos);

    const turnoActual = document.createElement("article");
    turnoActual.classList.add("actual");
    turnos.appendChild(turnoActual);

    const turnoActualH3 = document.createElement("h3");
    turnoActualH3.textContent = "Turno Actual";
    turnoActual.appendChild(turnoActualH3);

    const colaTurnos = document.createElement("article");
    colaTurnos.classList.add("cola");
    turnos.appendChild(colaTurnos);

    const colaTurnosH3 = document.createElement("h3");
    colaTurnosH3.textContent = "Siguientes";
    colaTurnos.appendChild(colaTurnosH3);
  }

}