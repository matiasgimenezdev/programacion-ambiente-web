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
				<form method="POST" action="/perfil/actualizar">
					<fieldset>
						<h2>Informacion básica</h2>
						<p>
							<label for="dni">DNI</label>
							<input name="dni" required type="text" disabled value="<?= $paciente -> getDni()?>"/>
						</p>

						<p>
							<label for="nombre">Nombre</label>
							<input name="nombre" required type="text" value="<?= $paciente -> getName()?>"/>
						</p>

						<p>
							<label for="apellido">Apellido</label>
							<input name="apellido" required type="text" value="<?= $paciente -> getLastname()?>"/>

						</p>

						<p>
							<label for="nacimiento">Fecha de nacimiento</label>
							<input name="nacimiento" required type="date" value="<?= $paciente -> getBirthdate()?>"/>
						</p>

						<p>
							<label for="genero">Género</label>
							<input
								type="radio"
								name="genero"
								id="masculino"
								value="M"
								<?php echo ($paciente -> getGender() === "M") ? "checked" : ""?>
							/>
							<label for="masculino">Masculino</label>
							<input
								type="radio"
								name="genero"
								id="femenino"
								value="F"
								<?php echo ($paciente -> getGender() === "F") ? "checked" : ""?>
							/>
							<label for="femenino">Femenino</label>
						</p>
					</fieldset>
				<fieldset>
					<h2>Informacion de contacto</h2>
					<p>
						<label for="email">Correo electrónico</label>
						<input name="email" type="email" disabled value="<?= $paciente -> getEmail()?>"/>
					</p>

					<p>
						<label for="telefono">Teléfono</label>
						<input name="telefono" required type="tel" value="<?= $paciente -> getPhone()?>"/>

					</p>
				</fieldset>
				<input type="submit" value="Confirmar cambios">
				<input type="reset" value="Cancelar">
			</form>
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
