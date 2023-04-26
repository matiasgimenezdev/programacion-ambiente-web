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
			<section class="basic-information">
				<h2>Informacion básica</h2>
				<dl>
					<div>
						<dt>DNI</dt>
						<dd><?= $paciente -> getDni()?></dd>
					</div>

					<div>
						<dt>Nombre</dt>
						<dd><?= $paciente -> getName()?></dd>
					</div>

					<div>
						<dt>Apellido</dt>
						<dd><?= $paciente -> getLastname()?></dd>
					</div>

					<div>
						<dt>Fecha de nacimiento</dt>
						<dd><?= $paciente -> getDateOfBirth()?></dd>
					</div>

					<div>
						<dt>Género</dt>
						<dd><?= ($paciente -> getGender() === "M") ? "Masculino" : "Femenino" ?></dd>
					</div>
				</dl>
			</section>
			<section class="contact-information">
				<h2>Informacion de contacto</h2>
				<dl>
					<div>
						<dt>Correo electrónico</dt>
						<dd><?= $paciente -> getEmail()?></dd>
					</div>

					<div>
						<dt>Teléfono</dt>
						<dd><?= $paciente -> getPhone()?></dd>
					</div>
				</dl>
			</section>
			<a
				href="/solicitar-turno.html"
				title="Solicitar turno"
				class="turn"
			></a>
		</main>
		<footer>
            <?php require __DIR__ . "/../Fragments/footer.view.php" ?>
		</footer>
	</body>
</html>
