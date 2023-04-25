<?php if (sizeof($profesionales) > 0): ?>
	<?php foreach ($profesionales as $profesional): ?>
		<article class="search-result">
			<h4 class="profesional-name">
				<?= $profesional->getName() ?>
			</h4>
			<p class="profesional-area">
				<?= $profesional->getEspecialidad() ?>
			</p>
			<p class="profesional-description">
				<?= $profesional->getDescription() ?>
			</p>
			<button>Solicitar un turno</button>
		</article>
	<?php endforeach; ?>
<?php else: ?>
	<h4 class="profesional-name"> No se encontraron profecionales que coincidan con la busqueda</h4>
<?php endif; ?>