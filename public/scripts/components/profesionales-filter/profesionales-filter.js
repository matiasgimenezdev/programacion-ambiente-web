import { TableFilter } from '../../utils/TableFilter.js';
import { ElementBuilder } from '../../utils/ElementBuilder.js';

export class ProfesionalesFilter {
	constructor() {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/profesionales-filter/profesionales-filter.css',
		});
		document.head.appendChild($link);
		this.$container = document.querySelector('section.result-section');
		this.$container.innerHTML = '';
		this.filter = new TableFilter(this.$container);

		this.url =
			'scripts/components/profesionales-filter/assets/profesionales.json';

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
			this.textFilter = event.target.value;
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
		data = this.filter.dataFilter(data, this.textFilter, ['name', 'area']);
		if (this.sort) {
			data = this.filter.sort(data, this.sort, 'area');
		}

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
		const $filter = document.querySelector('.result-filter-container');
		$container.innerHTML = '';
		$container.appendChild($filter);
		if (pages.length > 0) {
			for (let profesional of pages[indexNumber]) {
				const $article = ElementBuilder.createElement('article', '', {
					class: 'search-result',
				});
				$article.innerHTML = `
		        	<h4 class="profesional-name"> ${profesional.name} </h4>
					<p class="profesional-area">
						${profesional.area}
					</p>
					<p class="profesional-description">
						${profesional.description}
					</p>
					<button>Solicitar un turno</button>
		    	`;
				$container.appendChild($article);
			}

			const $buttons = document.querySelectorAll(
				'article.search-result button'
			);

			for (const $button of $buttons) {
				$button.addEventListener('click', () => {
					window.location.href = '/solicitar-turno';
				});
			}
		}
		$container.appendChild(index);
	}
}
