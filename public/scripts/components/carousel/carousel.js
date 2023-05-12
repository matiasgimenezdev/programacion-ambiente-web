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
		this.$images = document.querySelectorAll('.images-container li img');

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

	activeImage() {
		let position = -1;
		this.$imagesItems.forEach(($item, index) => {
			if ($item.classList.contains('active')) {
				position = index;
			}
		});
		return position;
	}

	animateCarousel() {
		const addButtons = ($leftButton, $rightButton) => {
			this.$imagesContainer.appendChild($rightButton);
			this.$imagesContainer.appendChild($leftButton);

			if (this.currentImage === 0) {
				$leftButton.style.display = 'none';
			}

			if (this.currentImage === this.$images.length - 1) {
				$rightButton.style.display = 'none';
			}
			$leftButton.addEventListener('click', () => previousImageChange());
			$rightButton.addEventListener('click', () => nextImageChange());
		};

		const nextImageChange = (count = 1) => {
			if (this.currentImage < this.$images.length - 1) {
				this.$imagesItems[this.currentImage].classList.remove('active');
				document
					.getElementById(this.currentImage)
					.classList.remove('active-thumb');
				this.currentImage = this.currentImage + count;

				this.$imagesItems[this.currentImage].classList.add('active');
				document
					.getElementById(this.currentImage)
					.classList.add('active-thumb');
				$leftButton.style.display = 'block';

				if (this.currentImage === this.$images.length - 1) {
					$rightButton.style.display = 'none';
				} else {
					$rightButton.style.display = 'block';
				}
			}
		};

		const previousImageChange = (count = 1) => {
			if (this.currentImage > 0) {
				this.$imagesItems[this.currentImage].classList.remove('active');
				document
					.getElementById(this.currentImage)
					.classList.remove('active-thumb');
				this.currentImage = this.currentImage - count;
				this.$imagesItems[this.currentImage].classList.add('active');
				document
					.getElementById(this.currentImage)
					.classList.add('active-thumb');
				$rightButton.style.display = 'block';
				if (this.currentImage === 0) {
					$leftButton.style.display = 'none';
				} else {
					$leftButton.style.display = 'block';
				}
			}
		};

		const addThumbs = () => {
			const $thumbsContainer = ElementBuilder.createElement('div', '', {
				class: 'thumbs-container',
			});

			this.$images.forEach(($image, index) => {
				const $thumb = ElementBuilder.createElement('button', '', {
					class: 'thumb',
					id: index,
				});

				$thumb.addEventListener('click', (event) => {
					const id = event.target.getAttribute('id');
					if (this.currentImage <= id) {
						nextImageChange(id - this.currentImage);
					} else if (this.currentImage > id) {
						previousImageChange(this.currentImage - id);
					}
				});

				$thumbsContainer.appendChild($thumb);
			});

			this.$imagesContainer.appendChild($thumbsContainer);
			document
				.getElementById(this.currentImage)
				.classList.add('active-thumb');
		};

		const $leftButton = ElementBuilder.createElement('button', '', {
			class: 'left carousel-button',
		});
		const $rightButton = ElementBuilder.createElement('button', '', {
			class: 'right carousel-button',
		});

		this.currentImage = this.activeImage();
		addThumbs();
		addButtons($leftButton, $rightButton);

		document.addEventListener('keydown', (event) => {
			if (event.code === 'ArrowLeft') {
				previousImageChange();
			}

			if (event.code === 'ArrowRight') {
				nextImageChange();
			}
		});
	}
}
