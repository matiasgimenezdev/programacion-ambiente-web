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
		<section class="latest-news">

		<?php require __DIR__ . "/../Fragments/noticias-list.view.php" ?>

		</section>
		<a href="/solicitar-turno.html" title="Solicitar turno" class="turn"></a>
	</main>

	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>