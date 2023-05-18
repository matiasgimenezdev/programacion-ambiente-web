import { ElementBuilder } from './ElementBuilder.js';

export class TableFilter {
	constructor($container) {
		this.$container = $container;
		const $filter = ElementBuilder.createElement('div', '', {
			class: 'result-filter-container',
		});

		$filter.innerHTML = `
            <fieldset class="result-filter">
				<p class="filter text-filter-container">
					<input type="text" name="filter-text" id="filter-text" placeholder="Filtrar...">
				</p>
                
				<p class="filter">
					<label for="ascendente" class="up"></label>
                    <input type="radio" id="ascendente" name="order" value="up">
                </p>
            
                <p class="filter">
					<label for="descendente" class="down"></label>
                    <input type="radio" id="descendente" name="order" value="down">
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

		if (length === 0) {
			return ElementBuilder.createElement(
				'p',
				'No se encontraron coincidencias',
				{
					class: 'msg',
				}
			);
		}

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

	sort(data, order, fieldName) {
		let sortedData = [];
		if (order === 'up') {
			sortedData = data.sort((a, b) =>
				a[fieldName].localeCompare(b[fieldName])
			);
		} else {
			sortedData = data.sort((a, b) =>
				b[fieldName].localeCompare(a[fieldName])
			);
		}
		return sortedData;
	}

	dataFilter(data, filter, fieldName) {
		if (!filter) {
			return data;
		}

		if (fieldName.length === 1)
			return data.filter((item) =>
				item[fieldName[0]].toLowerCase().includes(filter.toLowerCase())
			);
		else {
			return data.filter(
				(item) =>
					item[fieldName[0]]
						.toLowerCase()
						.includes(filter.toLowerCase()) ||
					item[fieldName[1]]
						.toLowerCase()
						.includes(filter.toLowerCase())
			);
		}
	}
}
