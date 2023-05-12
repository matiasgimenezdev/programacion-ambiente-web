import { ElementBuilder } from '../../utils/ElementBuilder.js';
export class Carousel {
	constructor($imagesContainer) {
		const $link = ElementBuilder.createElement('link', '', {
			rel: 'stylesheet',
			href: 'scripts/components/carousel/carousel.css',
		});
		document.head.appendChild($link);

		this.$imagesContainer = $imagesContainer;
		this.$imagesContainer.classList.add('images-container');
		this.$images = document.querySelectorAll('.images-container img');

		const $loader = this.addLoader();

		for (const $image of this.$images) {
			$image.addEventListener('load', () => {
				const loadCount = this.checkAllImagesLoaded();
				$loader.style.width = `${
					(100 / this.$images.length) * loadCount
				}%;`;
			});
		}
	}

	addLoader() {
		const $loaderContainer = ElementBuilder.createElement('span', '', {
			class: 'loader-container',
		});
		const $loader = ElementBuilder.createElement('span', '', {
			class: 'loader',
		});
		$loaderContainer.appendChild($loader);
		this.$imagesContainer.appendChild($loaderContainer);
		return $loader;
	}

	removeLoader() {
		const $loaderContainer = document.querySelector('.loader-container');
		this.$imagesContainer.removeChild($loaderContainer);
	}

	checkAllImagesLoaded() {
		let allImagesLoaded = true;
		let loadedCount = 0;

		for (let i = 0; i < this.$images.length; i++) {
			if (!this.$images[i].complete) {
				allImagesLoaded = false;
				break;
			} else {
				loadedCount++;
			}
		}

		if (allImagesLoaded) {
			this.removeLoader();
			this.animateCarousel();
			this.$images[0].classList.add('active');
		}
		return loadedCount;
	}

	animateCarousel() {
		// Aqui agregar la posibilidad de interactuar con el Carousel.
		// Este metodo solo se ejecuta cuando todas las imagenes estan cargadas.
	}
}
