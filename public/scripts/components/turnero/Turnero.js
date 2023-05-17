import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class Turnero {

  constructor($user) {

    if($user == "medico"){
      const $link = ElementBuilder.createElement('link', '', {
        rel: 'stylesheet',
        href: 'scripts/components/turnero/turneroMedico.css',
      });
      this.setViewMedico();
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

  setViewMedico(){
    const container = document.querySelector("main");
    const botonSiguiente = document.createElement("button");
    botonSiguiente.classList.add("boton-siguiente");
    botonSiguiente.textContent = "Siguiente";
    container.appendChild(botonSiguiente);
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