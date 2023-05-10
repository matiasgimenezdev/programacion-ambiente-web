import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class DragAndDrop {
	constructor() {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/drag-drop/drag-drop.css',
		});
		document.head.appendChild($link);

		const $container = document.querySelector('p.estudio');
		const $children = $container.childNodes;
		this.addEvents($container, $container);

		// const $dropAreas = document.querySelectorAll('.estudio');
		$children.forEach(($element) => {
			this.addEvents($element, $container);
		});
	}

	addEvents($area, $container) {
		$area.addEventListener('dragenter', (event) => {
			event.stopPropagation();
			$container.classList.add('drop-area');
		});

		$area.addEventListener('dragover', (event) => {
			event.stopPropagation();
			$container.classList.add('drop-area');
		});

		$area.addEventListener('dragleave', (event) => {
			event.stopPropagation();
			$container.classList.remove('drop-area');
		});

		$area.addEventListener('dragcancel', () => {
			$container.classList.remove('drop-area');
		});

		$area.addEventListener('drop', () => {
			$container.classList.remove('drop-area');
		});
	}
}
