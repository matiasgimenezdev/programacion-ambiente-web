import { ElementBuilder } from '../../utils/ElementBuilder.js';

export class TableFilter {
	constructor() {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/table-filter/table-filter.css',
		});
		document.head.appendChild($link);

		this.$container = document.querySelector('section.result-section');
		const $filter = ElementBuilder.createElement('div', '', {
			class: 'result-filter-container',
		});
		$filter.innerHTML = `
            <fieldset class="result-filter">
                <p class="filter">
                    <input type="radio" id="ascendente" name="order">
                    <label for="ascendente" class="up"></label>
                </p>
            
                <p class="filter">
                    <input type="radio" id="descendente" name="order">
                    <label for="descendente" class="down"></label>
                </p>

                <p class="filter">
                    <input type="range" name="amount" id="amount" min="2" value="6" max="14" step="2">
                    <label for="amount" id="amount"> </label>
                </p>
            </fieldset>
        `;

		this.$container.insertBefore($filter, this.$container.firstChild);
		this.$range = document.querySelector('input[type="range"]');
		document.querySelector('label[id="amount"]').textContent =
			this.$range.value + ' max.';

		this.$range.addEventListener('change', (event) => {
			document.querySelector('label[id="amount"]').textContent =
				event.target.value + ' max.';
		});
	}
}

// Implementar un componente que agregue funcionalidades de filtros a las tablas (o la forma en que hayan implementado sus
// listados de especialidades, turnos, etc.) que permitan ordenar los datos (en forma ascendente y descendente), filtrarlos
// por valores (especialidad, dr. fecha, etc.), seleccionar filas o columnas para resaltarlas y que agregue la capacidad de
// paginar el contenido según la cantidad de elementos que desea ver el usuario.
// En esta primera etapa se cargarán todos los datos sin procesar desde el backend (la cantidad esperada es
// manejable de esta manera),  y las funcionalidades serán 100% implementadas en JS.
