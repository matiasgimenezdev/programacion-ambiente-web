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
		<h2 class="title"><?= $title ?></h2>
			<section class="turnos-section">
				<section class="section-controls">
					<button class="solicitar-turno-button">
						<a href="solicitar-turno.html">Solicitar turno nuevo</a>
					</button>
					<h3>
						Listado de turnos del paciente
						<span class="patient-name">Apellido, Nombre</span>
					</h3>
					<form action="" method="GET" class="form">
						<p>
							<label for="filter">Filtrar</label>
							<input
								type="text"
								id="filter"
								name="filter"
								autocomplete="off"
								maxlength="60"
							/>
						</p>
					</form>
				</section>

				<section class="detail-section">
					<details>
						<summary>Turno 1</summary>
						<h4>Información del turno</h4>
						<ul>
							<li>Médico: Marcos Gutierrez</li>
							<li>Especialidad: Odontólogo</li>
							<li>Fecha: 22/03/2023</li>
							<li>Hora: 19:00</li>
						</ul>
						<button class="cancelar-turno">Cancelar turno</button>
					</details>
					<details>
						<summary>Turno 2</summary>
						<h4>Información del turno</h4>
						<ul>
							<li>Fecha: 25/03/2023</li>
							<li>Hora: 15:00</li>
							<li>Médico: Alfredo Montes</li>
							<li>Especialidad: Oculista</li>
						</ul>
						<button class="cancelar-turno">Cancelar turno</button>
					</details>
				</section>
			</section>
		</main>

		<footer>
			<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
		</footer>
	</body>
</html>
