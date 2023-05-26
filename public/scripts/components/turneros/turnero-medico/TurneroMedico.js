import { ElementBuilder } from '../../../utils/ElementBuilder.js';
export class TurneroMedico {

  constructor() {

    const $link = ElementBuilder.createElement('link', '', {
      rel: 'stylesheet',
      href: 'scripts/components/turneros/turnero-medico/turneroMedico.css'
    });
    document.head.appendChild($link);
    
    // Solicita turnero.json
    const $url = 'scripts/components/turneros/turnero.json';
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

  // Muestra Siguiente Turno a Medico
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

}