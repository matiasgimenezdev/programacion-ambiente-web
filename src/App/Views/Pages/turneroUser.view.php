<!DOCTYPE html>
<html lang="es">
<head>
      <?php require __DIR__ . "/../Fragments/head.view.php" ?>
</head>

<body>
  <h2 class="title"><?= $title ?></h2>
	<main>
    <p class="turno-user">Su turno: D14</p>
    <section class="turnos">
      <article class="actual">
        <h3>Turno Actual</h3>
        <p>D11</p>
      </article>
      <article class="cola">
        <h3>Siguientes</h3>
        <p>D12</p>
        <p>D13</p>
        <p class="su-turno">D14</p>
        <p>D15</p>
        <p>D16</p>
      </article>
    </section>
  </main>
</body>