export class TurnosWidget {

  constructor() {

    const url = 'scripts/components/turnos-widget/profesionales.json';

    this.obtenerProfesionales(url);
  }

  obtenerProfesionales(url){
    fetch(url)
      .then((response) => response.json())
      .then((profesionales) => {
        this.mostrarHorarios(profesionales);
      })
  }
  
  mostrarHorarios(profesionales) {
    const medicoSeleccionado = document.querySelector('.medico').value;
    console.log(medicoSeleccionado);
    const medico = profesionales.find(
      (profesional => 
        profesional.matricula == medicoSeleccionado)
    );
    console.log(medico);

    /*const nombre = medico.nombre;
    const item = document.createElement("p");
    item.innerHTML = '<p>${nombre}</p>';
    document.appendChild(item);*/
  }

}