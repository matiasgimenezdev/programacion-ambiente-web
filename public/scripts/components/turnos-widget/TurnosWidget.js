import { ElementBuilder } from '../../utils/ElementBuilder.js';

export class TurnosWidget {

  constructor() {

    const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/turnos-widget/TurnosWidget.css',
		});
		document.head.appendChild($link);

    const $url = 'scripts/components/turnos-widget/turnos.json';

    this.$tabla = document.createElement('table');
    this.$tabla.classList.add('turnero');

    this.$diasHabiles = this.getDiasHabiles();
    
    this.$botones = [];

    fetch($url)
      .then((response) => response.json())
      .then((profesionales) => {
        this.$profesionales = profesionales.especialistas;
      })

    this.$medicoSelect = document.querySelector(".medico");
    this.$container = document.querySelector(".medicos");
    this.$container.appendChild(this.$tabla);
    this.$tabla.style.display = "none";

    this.$medicoSelect.addEventListener("click", () => {
        this.$medico = this.$profesionales.find(
          (profesional => 
            profesional.matricula == this.$medicoSelect.value)
          );
        
        this.$tabla.innerHTML = '';

        if(this.$medicoSelect.value != 0){

          this.setDias(this.$tabla, this.$diasHabiles);

          this.$fechaContainer = document.querySelector('.fecha-turno');
          this.$horaContainer = document.querySelector('.hora-turno');

          this.setHoras(this.$tabla, this.$medico, this.$diasHabiles,
            this.$fechaContainer, this.$horaContainer);
          
          if(this.$tabla.style.display == "none")
            this.$tabla.style.display = "table";
        }
    });

  }

  getDiasHabiles() {
    let fecha = new Date();
    let $diasHabiles = [];
    let opciones = { weekday: 'long', day: 'numeric' };
    let i = 0;
    while (i < 7) {
      let dia = fecha.toLocaleDateString('es-ES', opciones);
      $diasHabiles.push(dia.charAt(0).toUpperCase() + dia.slice(1));
      i++;
      fecha.setDate(fecha.getDate() + 1);
    }
    return $diasHabiles;
  }


  setDias($tabla, $diasHabiles) {
    let fila = document.createElement('tr');
    let i = 0;
    while (i < 7) {
      let diaActual = $diasHabiles[i];
      let partes = diaActual.split(" ");
      let dia = partes[0];
      let numDia = partes[1];
      let celda = document.createElement('th');
      celda.innerText = dia[0] + dia[1] + dia[2] + " " + numDia;
      fila.appendChild(celda);
      i++;
    }
    $tabla.appendChild(fila);
  }

  setHoras($tabla, $medico, $diasHabiles, $fechaContainer, $horaContainer) {
    let horaInicio = $medico.horarioInicio.horas;
    let minutoInicio = $medico.horarioInicio.minutos;
    let horaFin = $medico.horarioFinalizacion.horas;
    let minutoFin = $medico.horarioFinalizacion.minutos;
    let duracionTurno = $medico.duracionTurno;
    let turnosTomados = $medico.turnosTomados;
    let diasQueAtiende = $medico.diasQueAtiende;
    
    let timeIni = new Date();
    timeIni.setHours(horaInicio, minutoInicio);

    let timeEnd = new Date();
    timeEnd.setHours(horaFin, minutoFin);

    while (timeIni <= timeEnd) 
    {
      let fila = $tabla.insertRow();
      let i = 0;
      while (i < 7) {
          let celda = fila.insertCell();
          let diaActual = $diasHabiles[i];
          let partes = diaActual.split(" ");
          let dia = partes[0];
          let numDia = partes[1];

          let atiende = false;
          for(let d of diasQueAtiende){
            if(dia == d){
              atiende = true;
              break;
            }
          }

          let turnoTomado = false;
          if(atiende){
            for(let turno of turnosTomados){
              if(turno.dia == dia && turno.horas == timeIni.getHours() && turno.minutos == timeIni.getMinutes()){
                turnoTomado = true;
                break;
              }
            }
          }

          let botonHora = document.createElement('button');
          const fechaFormateada = timeIni.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
          botonHora.innerText = fechaFormateada;

          if(atiende && !turnoTomado) {
            botonHora.classList.add("presionable");
          } else {
            botonHora.classList.add("no-presionable");
          }
          
          this.addEvent(botonHora, numDia, fechaFormateada, $tabla, $fechaContainer, $horaContainer, atiende && !turnoTomado);

          celda.appendChild(botonHora);
          i++;
      }
      timeIni.setMinutes(timeIni.getMinutes() + duracionTurno);
    }
  }

  addEvent(boton, dia, hora, $tabla, $fechaContainer, $horaContainer, presionable) {
    boton.addEventListener("click", function(event) {
      event.preventDefault();
      if(presionable){
        let fecha = new Date();
        fecha.setDate(dia);
        const fechaISO = fecha.toISOString();
        const fechaFormateada = fechaISO.substring(0, 10);
        $fechaContainer.value = fechaFormateada;
        console.log(hora);
        $horaContainer.value = hora;

        $tabla.style.display = "none";
      }
    });
  }

}