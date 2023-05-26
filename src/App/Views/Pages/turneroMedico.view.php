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
  </main>
  <section class="turnero">
    <section class="lista-turnos"></section>
    <section class="turno-actual">
      <header class="turno-actual-header">
        <h3 class="nombre-paciente"></h3>
      </header>
      <dl class="datos-paciente">
        <div class="dni-data">
          <dt>DNI:</dt>
          <dd class="dni-value"></dd>
        </div>
        <div class="edad-data">
          <dt>Edad:</dt>
          <dd class="edad-value"></dd>
        </div>
        <div class="nacimiento-data">
          <dt>Nacimiento:</dt>
          <dd class="nacimiento-value"></dd>
        </div>
        <div class="genero-data">
          <dt>Genero:</dt>
          <dd class="genero-value"></dd>
        </div>
      </dl>
    </section>
    <button class="boton-siguiente">Siguiente</button>
  </section>
</body>
