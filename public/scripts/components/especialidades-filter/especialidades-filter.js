import { TableFilter } from '../../utils/TableFilter.js';
import { ElementBuilder } from '../../utils/ElementBuilder.js';

export class EspecialidadesFilter {
	constructor() {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/especialidades-filter/especialidades-filter.css',
		});
		document.head.appendChild($link);
		this.$container = document.querySelector('section.result-section');
		this.$container.innerHTML = '';
		this.filter = new TableFilter(this.$container);

		this.url =
			'scripts/components/especialidades-filter/assets/especialidades.json';

		this.createPages();
		this.addEvents();
		this.sort = false;
		this.textFilter = '';
	}

	addEvents() {
		document.addEventListener('change', (event) => {
			if (event.target === this.filter.$range) {
				this.createPages();
			}
		});

		document.addEventListener('change', (event) => {
			if (event.target.name === 'order') {
				if (event.target.value === 'up') {
					this.createPages();
					this.sort = 'up';
				} else {
					this.createPages();
					this.sort = 'down';
				}
			}
		});

		const $filterInput = document.getElementById('filter-text');
		$filterInput.addEventListener('input', (event) => {
			this.textFilter = event.target.value.toLowerCase();
			this.createPages();
		});
	}

	async getData() {
		const response = await fetch(this.url);
		const data = await response.json();
		return data;
	}

	async createPages() {
		let data = await this.getData();
		data = this.filter.dataFilter(data, this.textFilter, 'name');

		if (this.sort) {
			data = this.filter.sort(data, this.sort, 'name');
		}
		console.log(data);
		this.pages = this.filter.setPages(data, this.filter.$range.value);
		const $index = this.filter.createIndex(
			this.pages.length,
			this.pages,
			this.loadPage
		);
		this.$container.appendChild($index);
		this.loadPage(this.pages, 0, $index);
		document.getElementById('filter-text').focus();
	}

	loadPage(pages, indexNumber, index) {
		const $container = document.querySelector('section.result-section');
		console.log('Page ' + `${parseInt(indexNumber) + 1}` + ' loaded.');
		const $filter = document.querySelector('.result-filter-container');
		$container.innerHTML = '';
		$container.appendChild($filter);
		if (pages.length > 0) {
			for (let especialidad of pages[indexNumber]) {
				const $article = ElementBuilder.createElement('article', '', {
					class: 'search-result',
				});

				$article.innerHTML = `
		        <h4 class="specialty-name"> ${especialidad.name} </h4>
		        <p class="specialty-description">
		            ${especialidad.description}
		        </p>
		        <a href="/profesional-search?profesional=${especialidad.name}"><button>Ver profesionales</button></a>
		    `;
				$container.appendChild($article);
			}
		}

		$container.appendChild(index);
	}
}
