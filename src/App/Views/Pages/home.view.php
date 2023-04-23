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
				<article class="new">
					<img
						src="/assets/images/inicio/noticias/medicacion.jpg"
						alt="Persona con medicamentos en su mano"
						width="300"
						height="200"
					/>
					<h3>Los riesgos de la automedicación</h3>
					<p>
						Múltiples factores confluyen en este hábito peligroso y
						que puede tener consecuencias negativas. Cada vez son
						más las personas que recurren, por sus propios medios, a
						la toma de un medicamento con el objetivo de tratar un
						dolor o contrarrestar una molestia.
					</p>
				</article>
				<article class="new">
					<img
						src="/assets/images/inicio/noticias/lactancia.jpg"
						alt="Madre amamantando a su bebe"
						width="300"
						height="200"
					/>
					<h3>Lactancia y vínculo afectivo</h3>
					<p>
						La leche materna proporciona los nutrientes necesarios
						para el bebé, pero cuando decimos “Fundamento de vida”
						nos referimos a que ayuda a desarrollar la inteligencia
						y las capacidades de lenguaje, de conocimiento, además
						de protegerlo de enfermedades infecciosas y crónicas.
					</p>
				</article>
				<article class="new">
					<img
						src="/assets/images/inicio/noticias/covid.jpg"
						alt="Medica con barbijo levantando la mano"
						width="300"
						height="200"
					/>
					<h3>
						Consejos útiles para pacientes con enfermedad
						respiratoria en épocas del COVID-19
					</h3>
					<p>
						El equipo de Neumonología de la clínica Universitaria
						responde las preguntas más frecuentes a su especialidad
						respecto del Covid-19. Además, brindan consejos y
						medidas de prevención para implementar en nuestro día a
						día.
					</p>
				</article>
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
