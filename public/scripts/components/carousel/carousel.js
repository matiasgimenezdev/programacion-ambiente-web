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
		this.$imagesItems = document.querySelectorAll('.images-container li');
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
		const $loaderContainer = ElementBuilder.createElement('div', '', {
			class: 'loader-container',
		});
		const $loader = ElementBuilder.createElement('div', '', {
			class: 'loader',
		});
		$loaderContainer.appendChild($loader);
		this.$imagesContainer.appendChild($loaderContainer);
		return $loader;
	}

	removeLoader() {
		const $loaderContainer = document.querySelector('.loader-container');
		$loaderContainer.style.display = 'none';
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
			this.$imagesItems[0].classList.add('active');
			this.removeLoader();
			this.animateCarousel();
		}
		return loadedCount;
	}

	animateCarousel() {
		const activeImage = () => {
			let position = -1;
			this.$imagesItems.forEach(($item, index) => {
				if ($item.classList.contains('active')) {
					position = index;
				}
			});
			return position;
		};

		const $leftButton = ElementBuilder.createElement('button', '', {
			class: 'left carousel-button',
		});
		const $rightButton = ElementBuilder.createElement('button', '', {
			class: 'right carousel-button',
		});
		this.$imagesContainer.appendChild($rightButton);
		this.$imagesContainer.appendChild($leftButton);

		this.currentImage = activeImage();
		if (this.currentImage === 0) {
			$leftButton.style.display = 'none';
		}

		if (this.currentImage === this.$images.length - 1) {
			$rightButton.style.display = 'none';
		}

		$leftButton.addEventListener('click', () => {
			if (this.currentImage > 0) {
				this.$imagesItems[this.currentImage].classList.remove('active');
				this.currentImage--;
				this.$imagesItems[this.currentImage].classList.add('active');
				if (this.currentImage === 0) {
					$leftButton.style.display = 'none';
				} else {
					$rightButton.style.display = 'block';
				}
			}
		});

		$rightButton.addEventListener('click', () => {
			if (this.currentImage < this.$images.length - 1) {
				this.$imagesItems[this.currentImage].classList.remove('active');
				this.currentImage++;
				this.$imagesItems[this.currentImage].classList.add('active');
				if (this.currentImage === this.$images.length - 1) {
					$rightButton.style.display = 'none';
				} else {
					$leftButton.style.display = 'block';
				}
			}
		});
	}
}
