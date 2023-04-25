<!DOCTYPE html>
<html lang="en">

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
		<h3>Para comunicarse con la clínica</h3>
		<section class="contact-section">
			<h4>Personalmente o por correo postal</h4>
			<address>
				<p>Ruta 5 y Avenida Constitución, Luján, Buenos Aires</p>
			</address>
		</section>
		<section class="contact-section">
			<h4>Por teléfono (atención telefonica las 24 horas)</h4>
			<address>
				<p>
					Para llamadas desde el interior de Argentina: <br />
					<span class="tel">2323-221133</span>
				</p>
				<p>
					Para llamadas internacionales: <br />
					<span class="tel">+54 2323-221133</span>
				</p>
			</address>
		</section>
		<iframe width="100%" height="200" name="ubicacion" scrolling="no"
			src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Ruta%205%20y,%20Av.%20Constituci%C3%B3n%20+(Universidad%20Nacional%20de%20Lujan)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
		<a href="/solicitar-turno.html" title="Solicitar turno" class="turn"></a>
	</main>
	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>