import { Carousel } from './components/carousel/carousel.js';
import { DragAndDrop } from './components/drag-drop/drag-drop.js';
import { ScriptLoader } from './utils/ScriptLoader.js';
import { TurnosWidget } from './components/turnos-widget/TurnosWidget.js';
import { EspecialidadesFilter } from './components/especialidades-filter/especialidades-filter.js';
import { ProfesionalesFilter } from './components/profesionales-filter/profesionales-filter.js';
import { TurnosFilter } from './components/turnos-filter/turnos-filter.js';
import { TurneroMedico } from './components/turneros/turnero-medico/TurneroMedico.js';
import { TurneroClinica } from './components/turneros/turnero-clinica/TurneroClinica.js';
import { turneroPaciente } from './components/turneros/turnero-paciente/TurneroPaciente.js';

const routes = {
	'/solicitar-turno': [
		{
			scriptName: 'drag-drop',
			scriptPath: 'scripts/components/drag-drop/drag-drop.js',
			initFunction: () => new DragAndDrop(),
		},
		{
			scriptName: 'TurnosWidget',
			scriptPath: 'scripts/components/turnos-widget/TurnosWidget.js',
			initFunction: () => new TurnosWidget(),
		},
	],
	'/': [
		{
			scriptName: 'carousel',
			scriptPath: 'scripts/components/carousel/carousel.js',
			initFunction: () => {
				const $container = document.querySelector('.carousel-list');
				new Carousel($container);
			},
		},
	],
	'/especialidades': [
		{
			scriptName: 'especialidades-filter',
			scriptPath:
				'scripts/components/especialidades-filter/especialidades-filter.js',
			initFunction: () => new EspecialidadesFilter(),
		},
	],
	'/especialidad-search': [
		{
			scriptName: 'especialidades-filter',
			scriptPath:
				'scripts/components/especialidades-filter/especialidades-filter.js',
			initFunction: () => new EspecialidadesFilter(),
		},
	],
	'/turneroMedico': [
		{
			scriptName: 'TurneroMedico',
			scriptPath: 'scripts/components/turneros/turnero-medico/TurneroMedico.js',
			initFunction: () => new TurneroMedico(),
		},
	],
	'/turneroClinica': [
		{
			scriptName: 'TurneroClinica',
			scriptPath: 'scripts/components/turneros/turnero-clinica/TurneroClinica.js',
			initFunction: () => new TurneroClinica(),
		},
	],
	'/turneroPaciente': [
		{
			scriptName: 'TurneroPaciente',
			scriptPath: 'scripts/components/turneros/turnero-paciente/TurneroPaciente.js',
			initFunction: () => new turneroPaciente(),
		},
	],

	'/profesionales': [
		{
			scriptName: 'profesionales-filter',
			scriptPath:
				'scripts/components/profesionales-filter/profesionales-filter.js',
			initFunction: () => new ProfesionalesFilter(),
		},
	],
	'/profesionales-search': [
		{
			scriptName: 'profesionales-filter',
			scriptPath:
				'scripts/components/profesionales-filter/profesionales-filter.js',
			initFunction: () => new ProfesionalesFilter(),
		},
	],
	'/turnos': [
		{
			scriptName: 'turnos-filter',
			scriptPath: 'scripts/components/turnos-filter/turnos-filter.js',
			initFunction: () => new TurnosFilter(),
		},
	],
};

document.addEventListener('DOMContentLoaded', () => {
	const currentPath = window.location.pathname;
	for (const route in routes) {
		const scripts = routes[route];
		for (const script of scripts) {
			if (
				route === currentPath ||
				(route !== '/' && currentPath.includes(route))
			) {
				const { scriptName, scriptPath, initFunction } = script;

				ScriptLoader.loadScript(scriptName, scriptPath, initFunction);
			}
		}
	}
});

// document.addEventListener('DOMContentLoaded', () => {
// 	if (window.location.pathname === '/solicitar-turno') {
// 		ScriptLoader.loadScript(
// 			'drag-drop',
// 			'scripts/components/drag-drop/drag-drop.js',
// 			() => {
// 				new DragAndDrop();
// 			}
// 		);
// 		ScriptLoader.loadScript(
// 			'TurnosWidget',
// 			'scripts/components/turnos-widget/TurnosWidget.js',
// 			() => {
// 				new TurnosWidget();
// 			}
// 		);
// 	}

// 	if (window.location.pathname === '/') {
// 		ScriptLoader.loadScript(
// 			'carousel',
// 			'scripts/components/carousel/carousel.js',
// 			() => {
// 				const $container = document.querySelector('.carousel-list');
// 				new Carousel($container);
// 			}
// 		);
// 	}

// 	if (
// 		window.location.pathname === '/especialidades' ||
// 		window.location.pathname.includes('especialidad-search')
// 	) {
// 		ScriptLoader.loadScript(
// 			'especialidades-filter',
// 			'scripts/components/especialidades-filter/especialidades-filter.js',
// 			() => {
// 				new EspecialidadesFilter();
// 			}
// 		);
// 	}

// 	if (window.location.pathname === '/turnero') {
// 		ScriptLoader.loadScript(
// 			'Turnero',
// 			'scripts/components/turnero/Turnero.js',
// 			() => {
// 				new Turnero('');
// 			}
// 		);
// 	}

// 	if (
// 		window.location.pathname === '/profesionales' ||
// 		window.location.pathname.includes('profesional-search')
// 	) {
// 		ScriptLoader.loadScript(
// 			'profesionales-filter',
// 			'scripts/components/profesionales-filter/profesionales-filter.js',
// 			() => {
// 				new ProfesionalesFilter();
// 			}
// 		);
// 	}

// 	if (window.location.pathname === '/turnos') {
// 		ScriptLoader.loadScript(
// 			'turnos-filter',
// 			'scripts/components/turnos-filter/turnos-filter.js',
// 			() => {
// 				new TurnosFilter();
// 			}
// 		);
// 	}
// });
