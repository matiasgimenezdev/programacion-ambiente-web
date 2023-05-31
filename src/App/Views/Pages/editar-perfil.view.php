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
		<?php echo (isset($update["status"])) ? '<p class="msg' . (($update["status"]->value !== "UPDATE_OK") ? ' error' : ' success') . '">' . $update["message"] . '</p>' : '' ?>
		<form method="POST" action="/perfil/actualizar">
			<fieldset>
				<h2>Informacion básica</h2>
				<input name="id" type="hidden" value="<?= $paciente->getIdPaciente() ?>">
				<p>
					<label for="dni">DNI</label>
					<input name="dni" required type="text" disabled value="<?= $paciente->getDni() ?>" />
				</p>
				<p>
					<label for="nombre">Nombre</label>
					<input name="nombre" required type="text"
						value="<?= isset($updatedData) ? $updatedData["name"] : $paciente->getName() ?>" autocomplete=off />
				</p>

				<p>
					<label for="apellido">Apellido</label>
					<input name="apellido" required type="text"
						value="<?= isset($updatedData) ? $updatedData["lastname"] : $paciente->getLastname() ?>" autocomplete=off />

				</p>

				<p>
					<label for="nacimiento">Fecha de nacimiento</label>
					<input name="nacimiento" required type="date"
						value="<?= isset($updatedData) ? $updatedData["birthdate"] : $paciente->getBirthdate() ?>" />
				</p>

				<p>
					<label for="genero">Género</label>
					<input type="radio" name="genero" id="masculino" value="M" 
						<?php if($paciente -> getGender()): ?>
							<?php if($paciente -> getGender() !== "F"): echo "checked"; else: echo ""; ?>
							<?php endif;?>
						<?php else: echo "checked" ?>
						<?php endif; ?>
					/>
					<label for="masculino">Masculino</label>
					<input type="radio" name="genero" id="femenino" value="F" 
						<?php if($paciente -> getGender()): ?>
							<?php if($paciente -> getGender() === "F"): echo "checked"; else: echo ""; ?>
							<?php endif;?>
						<?php endif; ?>
					/>
					<label for="femenino">Femenino</label>
				</p>
			</fieldset>
			<fieldset>
				<h2>Informacion de contacto</h2>
				<p>
					<label for="email">Correo electrónico</label>
					<input name="email" type="email" disabled value="<?= $paciente->getEmail() ?>" />
				</p>

				<p>
					<label for="telefono">Teléfono</label>
					<input name="telefono" required type="tel"
						value="<?= isset($updatedData) ? $updatedData["phone"] : $paciente->getPhone() ?>" autocomplete=off />

				</p>
			</fieldset>
			<p class="submit-reset">
				<input type="submit" value="Confirmar cambios">
				<input type="reset" value="Cancelar">
			</p>
		</form>
		<a href="/solicitar-turno.html" title="Solicitar turno" class="turn"></a>
	</main>
	<footer>
		<?php require __DIR__ . "/../Fragments/footer.view.php" ?>
	</footer>
</body>

</html>