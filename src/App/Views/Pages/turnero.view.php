<!DOCTYPE html>
<html lang="es">
<head>
      <?php require __DIR__ . "/../Fragments/head.view.php" ?>
</head>

<body>
  <header>
		<?php require __DIR__ . "/../Fragments/header.view.php" ?>
	</header>
	<input type="radio" id="paciente" name="group">
	<label for="paciente">Paciente</label>

	<input type="radio" id="medico" name="group">
	<label for="medico">Medico</label>

	<input type="radio" id="clinica" name="group">
	<label for="clinica">Clinica</label>
	<main>
    <h2 class="title">
			<?= $title ?>
		</h2>
  </main>
</body>