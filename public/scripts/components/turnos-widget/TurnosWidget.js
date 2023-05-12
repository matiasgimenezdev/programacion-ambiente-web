export class TurnosWidget {

  constructor() {

    const $url = 'scripts/components/turnos-widget/turnos.json';

    this.$tabla = document.createElement('table');

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
          this.armarTabla(this.$tabla, this.$medico);
        }
    });

  }

  armarTabla($tabla, $medico) {
    this.setDias($tabla);
    this.setHoras($tabla, $medico);
    const container = document.querySelector(".medicos");
    container.appendChild($tabla);
  }

  setDias($tabla) {
    let fecha = new Date();
    
    let encabezado = $tabla.createTHead();
    let fila = encabezado.insertRow();
    let opciones = { weekday: 'long', day: 'numeric' };
    let i = 0;
    while (i < 7) {
      if (fecha.getDay() !== 6 && fecha.getDay() !== 0) {
        let celda = fila.insertCell();
        celda.innerText = fecha.toLocaleDateString('es-ES', opciones);
        i++;
      }
      fecha.setDate(fecha.getDate() + 1);
    }
  }

  setHoras($tabla, $medico) {
    let horaInicio = $medico.horarioInicio.horas;
    let horaFin = $medico.horarioFinalizacion.horas;
    let hora = horaInicio;
    while (hora <= horaFin) 
    {
      let fila = $tabla.insertRow();
      let i = 0;
      while (i < 7) {
          let celda = fila.insertCell();
          celda.innerText = hora;
          i++;
      }
      hora++;
    }
  }

}