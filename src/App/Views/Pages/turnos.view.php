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
		<h2 class="title">
			<?= $title ?>
		</h2>
		<section class="turnos-section">
			<section class="section-controls">
				<button class="solicitar-turno-button">
					<a href="/solicitar-turno">Solicitar turno nuevo</a>
				</button>
				<h3>
					Listado de turnos del paciente
					<span class="patient-name">Apellido, Nombre</span>
				</h3>
				<form action="" method="GET" class="form">
					<p>
						<label for="filter">Filtrar</label>
						<input type="search" id="filter" name="filter" autocomplete="off" maxlength="60" />
					</p>
				</form>
			</section>

			<section class="detail-section">
				<?php require __DIR__ . "/../Fragments/turnos-list.view.php" ?>
			</section>
		</section>
	</main>

	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>