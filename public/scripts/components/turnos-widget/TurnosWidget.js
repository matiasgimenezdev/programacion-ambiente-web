export class TurnosWidget {

  constructor() {

    const url = 'scripts/components/turnos-widget/turnos.json';


    this.obtenerProfesionales(url);
  }

  obtenerProfesionales(url){
    fetch(url)
      .then((response) => response.json())
      .then((profesionales) => {
        this.mostrarHorarios(profesionales.especialistas);
        //console.log(profesionales.especialistas);
      })
  }
  
  mostrarHorarios(profesionales) {
    const medicoSeleccionado = document.querySelector('.medico');
    medicoSeleccionado.addEventListener("change", function() {
      const medico = profesionales.find(
        (profesional => 
          profesional.matricula == medicoSeleccionado.value)
      );
      const container = document.querySelector('.medicos');
      const item = document.createElement("p");
      item.innerHTML = '<p>'+  medico.nombre + '</p>';
      container.appendChild(item);
    });
  }

}