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
    <section class="turnos">
      <p class="turno-user"></p>
      <section class="turnos">
        <article class="turno-actual">
          <h3>Turno Actual</h3>
          <p class="actual"></p>
        </article>
        <article class="cola-turnos">
          <h3>Siguiente</h3>
          <div class="cola"></div>
        </article>
      </section>
      <audio
        src="scripts/components/turneros/turnero-paciente/NOTIFICACIÓN DE ANDROID SATURADO.mp3"
      ></audio>
    </section>
  </main>
</body>