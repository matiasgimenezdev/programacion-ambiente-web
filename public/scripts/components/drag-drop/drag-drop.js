import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class DragAndDrop {
	constructor() {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/drag-drop/drag-drop.css',
		});
		document.head.appendChild($link);

		const $container = document.querySelector('p.estudio');
		this.addEvents($container, $container);

		const $children = $container.childNodes;
		$children.forEach(($element) => {
			this.addEvents($element, $container);
		});
	}

	addEvents($area, $container) {
		$area.addEventListener('dragenter', (event) => {
			event.preventDefault();
			event.stopPropagation();
			$container.classList.add('drop-area');
		});

		$area.addEventListener('dragover', (event) => {
			event.preventDefault();
			event.stopPropagation();
			$container.classList.add('drop-area');
		});

		$area.addEventListener('dragleave', (event) => {
			event.preventDefault();
			event.stopPropagation();
			$container.classList.remove('drop-area');
		});

		$area.addEventListener('dragcancel', (event) => {
			event.preventDefault();
			event.stopPropagation();
			$container.classList.remove('drop-area > label');
		});

		$area.addEventListener('drop', (event) => {
			const loadFile = (file) => {
				const $input = document.querySelector('input[type=file]');
				const dataTransfer = new DataTransfer();
				dataTransfer.items.add(file);
				$input.files = dataTransfer.files;
				const $label = document.querySelector('label[for="estudio"]');
				$label.textContent = file.name;
			};

			const imagePreview = () => {
				let reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onloadend = () => {
					const img = ElementBuilder.createElement('img', '', {
						src: reader.result,
					});
					document.querySelector('p.estudio').appendChild(img);
				};
			};

			event.preventDefault();
			$container.classList.remove('drop-area');
			const file = event.dataTransfer.files[0];
			loadFile(file);
			imagePreview(file);
		});
	}
}
