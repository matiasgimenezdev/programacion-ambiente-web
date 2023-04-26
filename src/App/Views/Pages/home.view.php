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
			<article class="carousel">
				<ul class="carousel-list">
					<li class="carousel-item active">
						<img
							src="/assets/images/inicio/carousel/clinica.webp"
							alt="Vista del frente de la clínica"
						/>
					</li>
					<li class="carousel-item">
						<img
							src="/assets/images/inicio/carousel/medicos.webp"
							alt="Medicos trabajando"
						/>
					</li>
					<li class="carousel-item">
						<img
							src="/assets/images/inicio/carousel/quirofano.webp"
							alt="Quirófano de la clínica"
						/>
					</li>
					<li class="carousel-item">
						<img
							src="/assets/images/inicio/carousel/madre&hijo.webp"
							alt="Una madre con su hijo recien nacido"
						/>
					</li>
				</ul>
			</article>
			<section class="latest-news">
				<?php require __DIR__ . "/../Fragments/noticias-list.view.php" ?>
				<a
					href="/solicitar-turno"
					title="Solicitar turno"
					class="turn"
				></a>
				<a class="more-news" href="/noticias">Ver más noticias</a>
			</section>
		</main>

		<footer>
			<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
		</footer>
	</body>
</html>
