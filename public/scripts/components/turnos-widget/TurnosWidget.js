export class TurnosWidget {

  constructor() {

    const url = 'scripts/components/turnos-widget/turnos.json';

    this.obtenerProfesionales(url);
  }

  obtenerProfesionales(url){
    fetch(url)
      .then((response) => response.json())
      .then((profesionales) => {
        this.datosProfesional(profesionales.especialistas);
      })
  }
  
  datosProfesional(profesionales) {
    const medicoSeleccionado = document.querySelector('.medico');
    medicoSeleccionado.addEventListener("change", function() {
      const medico = profesionales.find(
        (profesional => 
          profesional.matricula == medicoSeleccionado.value)
      );
    });
    this.setDias();
  }

  setDias() {
    
    const date = document.querySelector("#fecha-turno");
    
    const fechaActual = new Date();
    const fechaLimite = new Date();
    fechaLimite.setDate(fechaActual.getDate() + 7); // Límite de 7 días desde hoy

    date.min = fechaActual.toISOString().slice(0, 10);
    date.max = fechaLimite.toISOString().slice(0, 10);

  }


}