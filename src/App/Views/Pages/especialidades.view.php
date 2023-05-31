<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require __DIR__ . "/../Fragments/head.view.php"?>
	</head>
	<body>
        <header>
            <?php require __DIR__ . "/../Fragments/header.view.php"?>
		</header>
		<main>
			<section class="search-section">
                <h2 class="title"><?= $title ?></h2>
				<form action="/especialidad/search" method="GET">
					<fieldset>
						<legend>Buscar especialidad</legend>
						<p class="input-container">
							<label class="label" for="especialidad">
								¿Que especialidad esta buscando?
							</label>
							<input
								class="input"
								type="search"
								id="especialidad"
								name="especialidad"
								autocomplete="off"
								maxlength="60"
							/>
						</p>
						<input type="submit" value="Buscar" />
					</fieldset>
				</form>
			</section>
			<section class="result-section">
				<?php if(strlen($searchText) > 0): ?>
					<h3>
						Resultados de busqueda para <span class="search-text"><?= $searchText?></span>
					</h3>
				<?php endif; ?>
				<?php require __DIR__ . "/../Fragments/especialidades-list.php"?>
			</section>
		</main>
		<footer>
			<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
		</footer>
	</body>
</html>
