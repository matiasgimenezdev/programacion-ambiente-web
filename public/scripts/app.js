import { DragAndDrop } from './components/drag-drop/drag-drop.js';
import { ScriptLoader } from './utils/ScriptLoader.js';

document.addEventListener('DOMContentLoaded', () => {
	if (window.location.pathname === '/solicitar-turno') {
		ScriptLoader.loadScript(
			'drag-drop',
			'scripts/components/drag-drop/drag-drop.js',
			() => {
				new DragAndDrop();
			}
		);
	}
});
