import { ElementBuilder } from './ElementBuilder.js';

export class TableFilter {
	constructor($container) {
		this.$container = $container;
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
                    <input type="range" name="amount" id="amount" min="2" value="6" max="12" step="2">
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

	setPages(data, max) {
		let pagesCount = Math.ceil(data.length / max);
		const maxItems = parseInt(max);
		let pages = [];
		for (let i = 0; i < pagesCount; i++) {
			let page;
			if (i + 1 === pagesCount) {
				page = data.slice(i * maxItems, data.length + 1);
			} else {
				page = data.slice(i * maxItems, i * maxItems + maxItems);
			}
			pages.push(page);
		}
		return pages;
	}

	createIndex(length, pages, loadPage) {
		this.pages = pages;
		const $index = ElementBuilder.createElement('div', '', {
			class: 'index',
		});

		for (let i = 0; i < length; i++) {
			let className = 'index-number';
			if (i === 0) className += ' current-index';
			const $indexNumber = ElementBuilder.createElement(
				'button',
				`${i + 1}`,
				{
					class: className,
					id: i,
				}
			);

			$indexNumber.addEventListener('click', (event) => {
				const id = event.target.getAttribute('id');
				console.log(id);
				console.log(pages);
				const currentIndex = document.querySelector(
					'button.current-index'
				);
				currentIndex.classList.remove('current-index');
				event.target.classList.add('current-index');
				loadPage(this.pages, id, $index);
			});
			$index.appendChild($indexNumber);
		}
		return $index;
	}

	sort(data, upDown = false) {}
}

// Implementar un componente que agregue funcionalidades de filtros a las tablas (o la forma en que hayan implementado sus
// listados de especialidades, turnos, etc.) que permitan ordenar los datos (en forma ascendente y descendente), filtrarlos
// por valores (especialidad, dr. fecha, etc.), seleccionar filas o columnas para resaltarlas y que agregue la capacidad de
// paginar el contenido según la cantidad de elementos que desea ver el usuario.
// En esta primera etapa se cargarán todos los datos sin procesar desde el backend (la cantidad esperada es
// manejable de esta manera),  y las funcionalidades serán 100% implementadas en JS.
