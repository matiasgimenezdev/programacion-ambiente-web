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

      
      const container = document.querySelector("main");
      fetch('scripts/components/turnero/paciente-view.html')
        .then((response) => response.text())
        .then((view) => {
          this.$view = view;
          const tempElement = document.createElement('div');
          tempElement.innerHTML = this.$view;
          container.appendChild(tempElement.firstChild);
        }
      );

      this.$paciente = "Hernán";
      this.$idTurno = "D14";

      const $url = 'scripts/components/turnero/turnero.json';
      fetch($url)
        .then((response) => response.json())
        .then((turnos) => {
          this.$turnosRequest = turnos.turnos;
          this.$turnos = this.$turnosRequest;
          this.setTurnos(this.$turnos, this.$paciente);
          
          fetch('scripts/components/turnero/turnos.json')
            .then((response) => response.json())
            .then((data) => {
              this.$profesionales = data.especialistas;
              this.calcularTiempoDeEspera(this.$profesionales, this.$turnos, this.$idTurno);
            }
          );

        }
      );

      this.$suTurno = false;

      setInterval(() => {
        if(!this.$suTurno)
          this.$turnos.shift();
      }, 5000);

        setInterval(() => {
            
            if(this.$turnos[0].id != this.$turnoActual) { 

              this.$turnoActual = this.$turnos[0].id;
              this.setTurnos(this.$turnos, this.$paciente);
              this.calcularTiempoDeEspera(this.$profesionales, this.$turnos, this.$idTurno);
            
              if(this.$turnos[0].id == this.$idTurno){
                this.$suTurno = true;
                this.notificarTurno();
              }
            
          }
        }, 500);
    }

    // Si es clinica...
    if($user == ""){

      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroClinica.css',
      });
      document.head.appendChild($link);
      
      const container = document.querySelector("main");
      fetch('scripts/components/turnero/clinica-view.html')
        .then((response) => response.text())
        .then((view) => {
          this.$view = view;
          const tempElement = document.createElement('div');
          tempElement.innerHTML = this.$view;
          container.appendChild(tempElement.firstChild);
        }
      );

      const $url = 'scripts/components/turnero/turnero.json';
      fetch($url)
        .then((response) => response.json())
        .then((turnos) => {
          this.$turnosRequest = turnos.turnos;
          this.$turnos = this.$turnosRequest;
          this.setTurnos(this.$turnos);
        }
      );

      setInterval(() => {
        this.$turnos.shift();
      }, 2000);

      setInterval(() => {
        if(this.$turnos.length > 0) {
          if(this.$turnos[0].id != this.$turnoActual) { 
            this.$turnoActual = this.$turnos[0].id;
            this.setTurnos(this.$turnos);
          }
        }
      }, 500);
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

  setTurnos($turnos){

    const turnoActual = document.querySelector(".actual");

    turnoActual.textContent = $turnos[0].id;

    const colaContainer = document.querySelector(".cola");
    colaContainer.innerHTML = '';

    let limit = 5;
    if($turnos.length < 5){
      limit = $turnos.length;
    }

    for(let i = 1; i <= limit; i++){
      const turno = document.createElement("p");
      turno.textContent = $turnos[i].id;
      colaContainer.appendChild(turno);
    }

  }

  setTurnos($turnos, $paciente){

    const turnoActual = document.querySelector(".actual");

    turnoActual.textContent = $turnos[0].id;
    if($turnos[0].nombre == $paciente){
      turnoActual.classList.add("su-turno");
    } else {
      turnoActual.classList.remove("su-turno");
    }

    const colaContainer = document.querySelector(".cola");
    colaContainer.innerHTML = '';

    let limit = 5;
    if($turnos.length < 5){
      limit = $turnos.length;
    }

    for(let i = 1; i <= limit - 1; i++){
      if($turnos[i].nombre == $paciente){
        const turno = document.createElement("details");
        turno.classList.add("su-turno");
        const summary = document.createElement("summary");
        summary.textContent = $turnos[i].id;
        turno.appendChild(summary);

        const turnoPaciente = document.querySelector(".turno-user");
        turnoPaciente.textContent = "Su turno: " + $turnos[i].id;
        colaContainer.appendChild(turno);
      } else {
        const turno = document.createElement("p");
        turno.textContent = $turnos[i].id;
        colaContainer.appendChild(turno);
      }
    }
  }


  calcularTiempoDeEspera($profesionales, $turnos, $idTurno){

    let tiempoEstimado = 0;

    for(let i = 0; i <= $turnos.length; i++){
      
      if($turnos[i].id == $idTurno){
        const profesional = $turnos[i].profesional;
        let partes = profesional.split(" ");
        let nombre = partes[0];
        let apellido = partes[1];
        for(let j = 0; j <= $profesionales.length; j++){
          if($profesionales[j].nombre == nombre && $profesionales[j].apellido == apellido){
            let tiempoPorTurno = $profesionales[j].duracionTurno;
            tiempoEstimado = tiempoPorTurno * i;
            break;
          }
        }
        break;
      }
    }

    const tiempoDeEsperaEstimado = document.querySelector(".su-turno");
    const tiempo = document.createElement("p");
    tiempo.textContent = "Tiempo de espera estimado: " + tiempoEstimado + " minutos";
    tiempoDeEsperaEstimado.appendChild(tiempo);
  }

  notificarTurno() {
    console.log("es tu turno");

    const main = document.querySelector("main");
    const notificacion = document.createElement("section");
    notificacion.classList.add("notificacion");

    const msj = document.createElement("h1");
    msj.classList.add("msj");
    msj.textContent = "Es tu turno";

    const aceptar = document.createElement("button");
    aceptar.classList.add("aceptar");

    notificacion.appendChild(msj);
    notificacion.appendChild(aceptar);

    const link = document.createElement("a");
    link.href = "/";
    link.name = "Inicio";
    link.textContent = "Aceptar";
    aceptar.appendChild(link);

    main.appendChild(notificacion);

  
  }


}