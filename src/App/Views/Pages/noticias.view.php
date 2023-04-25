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
			<article class="new head">
				<img src="assets/images/inicio/noticias/covid.jpg" alt="Medica con barbijo levantando la mano" width="300"
					height="200" />
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
			<article class="new">
				<img src="assets/images/inicio/noticias/medicacion.jpg" alt="Persona con medicamentos en su mano" width="300"
					height="200" />
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
				<img src="assets/images/inicio/noticias/lactancia.jpg" alt="Madre amamantando a su bebe" width="300"
					height="200" />
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
				<img src="assets/images/noticias/obesidad.jpg" alt="Obesidad" width="300" height="200" />
				<h3>
					La obesidad dificulta el diagnóstico de las enfermedades
					cardiovasculares
				</h3>
				<p>
					El cardiólogo Francisco lópez-jeménez señaló que el
					enceso de masa corporal no sólo es un factor de riesgo
					para la salud, sino que, además, toma más compleja la
					detección de otras patologías a través de los exámenes
					médicos habituales
				</p>
			</article>
			<article class="new">
				<img src="assets/images/noticias/epilepsia.jpg" alt="Obesidad" width="300" height="200" />
				<h3>
					Epilepsia refractaria: por qué la dieta cetogénica puede
					ser un tratamiento eficaz
				</h3>
				<p>
					En Argentina, se estima que la epilepsia afecta a una de
					cada 10 personas, de las cuales entre un 20 y 30% no
					responden a los fármacos. ¿De qué se trata este tipo de
					alimentación y cómo se aplica?
				</p>
			</article>
		</section>
		<a href="/solicitar-turno.html" title="Solicitar turno" class="turn"></a>
	</main>

	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>