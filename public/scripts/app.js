import { Carousel } from './components/carousel/carousel.js';
import { DragAndDrop } from './components/drag-drop/drag-drop.js';
import { ScriptLoader } from './utils/ScriptLoader.js';
import { TurnosWidget } from './components/turnos-widget/TurnosWidget.js';
import { EspecialidadesFilter } from './components/especialidades-filter/especialidades-filter.js';
import { ProfesionalesFilter } from './components/profesionales-filter/profesionales-filter.js';

document.addEventListener('DOMContentLoaded', () => {
	if (window.location.pathname === '/solicitar-turno') {
		ScriptLoader.loadScript(
			'drag-drop',
			'scripts/components/drag-drop/drag-drop.js',
			() => {
				new DragAndDrop();
			}
		);
		ScriptLoader.loadScript(
			'TurnosWidget',
			'scripts/components/turnos-widget/TurnosWidget.js',
			() => {
				new TurnosWidget();
			}
		);
	}

	if (window.location.pathname === '/') {
		ScriptLoader.loadScript(
			'carousel',
			'scripts/components/carousel/carousel.js',
			() => {
				const $container = document.querySelector('.carousel-list');
				new Carousel($container);
			}
		);
	}

	if (
		window.location.pathname === '/especialidades' ||
		window.location.pathname.includes('especialidad-search')
	) {
		ScriptLoader.loadScript(
			'especialidades-filter',
			'scripts/components/especialidades-filter/especialidades-filter.js',
			() => {
				new EspecialidadesFilter();
			}
		);
	}

	if (
		window.location.pathname === '/profesionales' ||
		window.location.pathname.includes('profesional-search')
	) {
		ScriptLoader.loadScript(
			'profesionales-filter',
			'scripts/components/profesionales-filter/profesionales-filter.js',
			() => {
				new ProfesionalesFilter();
			}
		);
	}
});
