import { ElementBuilder } from '../../../utils/ElementBuilder.js';
export class turneroPaciente {

  constructor() { 

      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turneros/turnero-paciente/turneroPaciente.css'
      });
      document.head.appendChild($link);


      this.$paciente = "Hernán";
      this.$idTurno = "D14";

      const $url = 'scripts/components/turneros/turnero.json';
      fetch($url)
        .then((response) => response.json())
        .then((turnos) => {
          this.$turnosRequest = turnos.turnos;
          this.$turnos = this.$turnosRequest;
          this.setTurnos(this.$turnos, this.$paciente);
          
          fetch('scripts/components/turneros/turnos.json')
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

    const audio = document.querySelector("audio");
    audio.play();

    const link = document.createElement("a");
    link.href = "/";
    link.name = "Inicio";
    link.textContent = "Aceptar";
    aceptar.appendChild(link);

    main.appendChild(notificacion);

  
  }


}