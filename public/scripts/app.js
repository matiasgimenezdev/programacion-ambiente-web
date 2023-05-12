import { DragAndDrop } from './components/drag-drop/drag-drop.js';
import { ScriptLoader } from './utils/ScriptLoader.js';
import { TurnosWidget } from './components/turnos-widget/TurnosWidget.js'

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
});
