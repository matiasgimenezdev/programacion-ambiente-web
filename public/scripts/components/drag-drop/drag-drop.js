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
			event.preventDefault();
			$container.classList.add('drop-area');
		});

		$area.addEventListener('dragover', (event) => {
			event.preventDefault();
			$container.classList.add('drop-area');
		});

		$area.addEventListener('dragleave', (event) => {
			event.preventDefault();
			$container.classList.remove('drop-area');
		});

		$area.addEventListener('dragcancel', (event) => {
			event.preventDefault();
			$container.classList.remove('drop-area');
		});

		$area.addEventListener('drop', (event) => {
			event.preventDefault();
			$container.classList.remove('drop-area');
			const file = event.dataTransfer.files[0];
			const $input = document.querySelector('input[type=file]');
			const fileList = $input.files;
			console.log($input.files);
			// fileList.append(file);
			// $input.files = fileList;
		});
	}
}
