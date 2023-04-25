<!DOCTYPE html>
<html lang="es">

<head>
	<?php require __DIR__ . "/../Fragments/head.view.php" ?>
</head>

<body>
	<header>
		<?php require __DIR__ . "/../Fragments/header.view.php" ?>
	</header>
	<main>
		<section class="search-section">
			<h2 class="title">
				<?= $title ?>
			</h2>
			<form action="/profesional-search" method="GET">
				<fieldset>
					<legend>Buscar un profesional</legend>
					<p class="input-container">
						<label class="label" for="profesional">
							Ingrese nombre, apellido o especialidad
						</label>
						<input class="input" type="search" id="profesional" name="profesional" autocomplete="off" maxlength="60" />
					</p>
					<input type="submit" value="Buscar" />
				</fieldset>
			</form>
		</section>
		<section class="result-section">
			<?php if (strlen($searchText) > 0): ?>
				<h3>
					Resultados de busqueda para <span class="search-text">
						<?= $searchText ?>
					</span>
				</h3>
			<?php endif; ?>
			<?php require __DIR__ . "/../Fragments/profesionales-list.php" ?>
		</section>
	</main>
	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>