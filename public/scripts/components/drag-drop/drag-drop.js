import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class DragAndDrop {
	constructor() {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/drag-drop/drag-drop.css',
		});
		document.head.appendChild($link);

		this.$container = document.querySelector('p.estudio');
		this.$input = document.querySelector('input[type=file]');
		this.$label = document.querySelector('label[for="estudio"]');
		this.$label.innerHTML = `
			<span>Estudio clínico</span> <br>
			Suelte su archivo aqui o haga click para buscarlo
			`;
		const $reset = document.querySelector('.reset');

		$reset.addEventListener('click', () => {
			this.removePreview();
			this.$label.innerHTML = `
				<span>Estudio clínico</span> <br>
				Suelte su archivo aqui o haga click para buscarlo
			`;

			this.$input.value = '';
		});

		this.$input.addEventListener('change', (event) => {
			if (this.$input.value) {
				const file = event.target.files[0];
				this.loadPreview(file);
				this.loadFile(file);
			} else {
				this.removePreview();
			}
		});

		this.addDragAndDropEvents(this.$container, this.$container);

		const $children = this.$container.childNodes;
		$children.forEach(($element) => {
			this.addDragAndDropEvents($element, this.$container);
		});
	}

	addDragAndDropEvents($area, $container) {
		$area.addEventListener('click', (event) => {
			event.stopPropagation();
			this.$input.click();
		});
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
			event.preventDefault();
			event.stopPropagation();
			$container.classList.remove('drop-area');
			const file = event.dataTransfer.files[0];
			this.loadFile(file);
			this.loadPreview(file);
		});
	}

	removePreview() {
		const $oldPreviewImage = document.querySelector('p.estudio img');
		if ($oldPreviewImage) {
			this.$container.removeChild($oldPreviewImage);
		} else {
			const $oldPreviewMessage = document.querySelector('p.estudio p');
			if ($oldPreviewMessage) {
				this.$container.removeChild($oldPreviewMessage);
			}
		}
	}

	loadPreview(file) {
		const previewError = () => {
			const $message = ElementBuilder.createElement(
				'p',
				'No se puede mostrar una vista previa del archivo',
				{ class: 'no-preview' }
			);
			this.$container.appendChild($message);
		};

		this.removePreview();
		if (file.type.match('image.*')) {
			let reader = new FileReader();
			reader.readAsDataURL(file);
			reader.onloadend = () => {
				const $img = ElementBuilder.createElement('img', '', {
					src: reader.result,
					class: 'preview',
				});

				$img.onload = () => {
					this.$container.appendChild($img);
				};

				$img.onerror = () => {
					previewError();
				};
			};
		} else {
			previewError();
		}
	}

	loadFile(file) {
		const dataTransfer = new DataTransfer();
		dataTransfer.items.add(file);
		this.$input.files = dataTransfer.files;
		this.$label.innerHTML = `<span>${file.name}</span>`;
	}
}
