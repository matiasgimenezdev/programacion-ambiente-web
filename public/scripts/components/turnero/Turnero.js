import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class Turnero {

  constructor($user) {

    // Si es medico...
    if($user == "medico"){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroMedico.css',
      });
      document.head.appendChild($link);

      
      const container = document.querySelector("main");
      fetch('scripts/components/turnero/medico-view.html')
        .then((response) => response.text())
        .then((view) => {
          this.$view = view;
          const tempElement = document.createElement('div');
          tempElement.innerHTML = this.$view;
          container.appendChild(tempElement.firstChild);
        }
      );
      
      // Solicita turnero.json
      const $url = 'scripts/components/turnero/turnero.json';
      fetch($url)
        .then((response) => response.json())
        .then((turnos) => {
          this.$turnos = turnos.turnos;
          this.addListaTurnos(this.$turnos);
        

          const botonSiguiente = document.querySelector(".boton-siguiente");
          // Evento botón siguiente
          botonSiguiente.addEventListener('click', () => {
            this.siguienteTurno(this.$turnos[0]);
            this.$turnos.shift();
          });
        }
      );
    }

    // Si es paciente...
    if($user == "paciente"){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroPaciente.css',
      });
      document.head.appendChild($link);
      this.setViewPaciente();
    }

    // Si es clinica...
    if($user == ""){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroClinica.css',
      });
      document.head.appendChild($link);
      this.setViewClinica();

      // Consulta cada 10 segundos turno actual
      setInterval(() => {
        fetch('ruta_al_archivo.json')
          .then(response => response.json())
          .then(data => {
            const valor = data.variable;
            console.log(valor); 
          })
          .catch(error => {
            console.log('Error al obtener el JSON:', error);
          });
      }, 10000);
    }

  }


  // Lista de turnos para Médico
  addListaTurnos($turnos) {
    const container = document.querySelector(".lista-turnos")

    for(let turno of $turnos){
      const detail = document.createElement("details");
      
      const summary = document.createElement("summary");
      summary.textContent = turno.nombre + ' ' + turno.apellido;
      const pacienteData = document.createElement("dl");

      const dniDiv = document.createElement("div");
      const dni = document.createElement("dt");
      dni.textContent = 'DNI:';
      const dniValue = document.createElement("dd");
      dniValue.textContent = turno.dni;

      dniDiv.appendChild(dni);
      dniDiv.appendChild(dniValue);
      pacienteData.appendChild(dniDiv);

      const edadDiv = document.createElement("div");
      const edad = document.createElement("dt");
      edad.textContent = 'Edad:';
      const edadValue = document.createElement("dd");
      edadValue.textContent = turno.edad;

      edadDiv.appendChild(edad);
      edadDiv.appendChild(edadValue);
      pacienteData.appendChild(edadDiv);

      const nacimientoDiv = document.createElement("div");
      const nacimiento = document.createElement("dt");
      nacimiento.textContent = 'Nacimiento:';
      const nacimientoValue = document.createElement("dd");
      nacimientoValue.textContent = turno.nacimiento;

      nacimientoDiv.appendChild(nacimiento);
      nacimientoDiv.appendChild(nacimientoValue);
      pacienteData.appendChild(nacimientoDiv);

      const generoDiv = document.createElement("div");
      const genero = document.createElement("dt");
      genero.textContent = 'Genero:';
      const generoValue = document.createElement("dd");
      generoValue.textContent = turno.genero;

      generoDiv.appendChild(genero);
      generoDiv.appendChild(generoValue);
      pacienteData.appendChild(generoDiv);

      detail.appendChild(summary);
      detail.appendChild(pacienteData);
      
      container.appendChild(detail);
    }
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


  // Métodos Paciente View

  // Set Elementos de Paciente view
  setViewPaciente(){
    const container = document.querySelector("main");
    const turnoUser = document.createElement("p");
    turnoUser.classList.add("turno-user");
    turnoUser.textContent = "Su turno: ";
    container.appendChild(turnoUser);

    this.setTurnos();
  }

  // Métodos Clínica View

  // Set Elementos de Clínica view
  setViewClinica(){
    this.setTurnos();
  }

  // Set elementos Clínica y Paciente
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