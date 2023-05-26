import { ElementBuilder } from '../../../utils/ElementBuilder.js';
export class TurneroClinica {

  constructor() {

    const $link = ElementBuilder.createElement('link', '', {
      rel: 'stylesheet',
      href: 'scripts/components/turneros/turnero-clinica/turneroClinica.css'
    });
    document.head.appendChild($link);

    const $url = 'scripts/components/turneros/turnero.json';
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

}