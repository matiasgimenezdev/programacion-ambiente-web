export class TurnosWidget {

  constructor() {

    const $url = 'scripts/components/turnos-widget/turnos.json';

    this.$tabla = document.createElement('table');

    this.$diasHabiles = this.getDiasHabiles();
    console.log(this.$diasHabiles);

    fetch($url)
      .then((response) => response.json())
      .then((profesionales) => {
        this.$profesionales = profesionales.especialistas;
      })
    
    this.$medicoSelect = document.querySelector(".medico");

    this.$medicoSelect.addEventListener("change", () => {
        this.$medico = this.$profesionales.find(
          (profesional => 
            profesional.matricula == this.$medicoSelect.value)
          );
        this.$tabla.innerHTML = '';
        if(this.$medicoSelect.value != 0){
          this.armarTabla(this.$tabla, this.$medico, this.$diasHabiles);
        }
    });

  }

  getDiasHabiles() {
    let fecha = new Date();
    let $diasHabiles = [];
    let opciones = { weekday: 'long', day: 'numeric' };
    let i = 0;
    while (i < 7) {
      if (fecha.getDay() !== 6 && fecha.getDay() !== 0) {
        let dia = fecha.toLocaleDateString('es-ES', opciones);
        $diasHabiles.push(dia.charAt(0).toUpperCase() + dia.slice(1));
        i++;
      }
      fecha.setDate(fecha.getDate() + 1);
    }
    return $diasHabiles;
  }

  armarTabla($tabla, $medico, $diasHabiles) {
    this.setDias($tabla, $diasHabiles);
    this.setHoras($tabla, $medico, $diasHabiles);
    const container = document.querySelector(".medicos");
    container.appendChild($tabla);
  }

  setDias($tabla, $diasHabiles) {
    let encabezado = $tabla.createTHead();
    let fila = encabezado.insertRow();
    let i = 0;
    while (i < 7) {
      let celda = fila.insertCell();
      celda.innerText = $diasHabiles[i];
      i++;
    }
  }

  setHoras($tabla, $medico, $diasHabiles) {
    let horaInicio = $medico.horarioInicio.horas;
    let minutoInicio = $medico.horarioInicio.minutos;
    let horaFin = $medico.horarioFinalizacion.horas;
    let minutoFin = $medico.horarioFinalizacion.minutos;
    let duracionTurno = $medico.duracionTurno;
    let turnosTomados = $medico.turnosTomados;
    
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

          let turnoTomado = false;

          for(let turno of turnosTomados){
            if(turno.dia == dia && turno.horas == timeIni.getHours() && turno.minutos == timeIni.getMinutes()){
              turnoTomado = true;
              break;
            }
          }

          let botonHora = document.createElement('button');
          botonHora.innerText = timeIni.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });;
          celda.appendChild(botonHora);

          if(turnoTomado) {
            botonHora.classList.add("turno-tomado");
          }
          i++;
      }
      timeIni.setMinutes(timeIni.getMinutes() + duracionTurno);
    }
  }

}