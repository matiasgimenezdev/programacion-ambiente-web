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

		<form action="" method="POST" class="form">
			<fieldset class="patient-data">
				<legend>Datos personales</legend>
				<p>
					<label for="dni">DNI</label>
					<input type="number" name="dni" id="dni" required tabindex="1" maxlength="8" />
				</p>
				<p>
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" id="nombre" required tabindex="2" maxlength="30" />
				</p>
				<p>
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" id="apellido" required tabindex="3" maxlength="30" />
				</p>
				<p class="genero">
					<label for="sexo">Género</label>
					<input type="radio" name="sexo" id="femenino" value="F" checked />
					<label for="femenino">Femenino</label>
					<input type="radio" name="sexo" id="masculino" value="M" />
					<label for="masculino">Masculino</label>
				</p>
				<p class="fecha">
					<label for="nacimiento">Fecha de Nacimiento</label>
					<input type="date" name="nacimiento" id="nacimiento" required tabindex="4" />
				</p>
				<p class="edad">
					<label for="edad">Edad</label>
					<input type="number" name="edad" id="edad" required tabindex="5" maxlength="3" />
				</p>
			</fieldset>
			<fieldset class="contact-data">
				<legend>Datos de contacto</legend>
				<p>
					<label for="email">Correo Electrónico</label>
					<input type="email" name="email" id="email" required tabindex="6" maxlength="50" autocomplete="off" />
				</p>
				<p>
					<label for="telefono">Teléfono Celular</label>
					<input type="tel" name="telefono" id="telefono" required tabindex="7" maxlength="50" autocomplete="off" />
				</p>
			</fieldset>
			<fieldset class="turn-data">
				<legend>Datos del turno</legend>
				<p>
					<label for="especialidad">Especialidad</label>
					<input type="text" name="especialidad" id="especialidades" required tabindex="8" maxlength="30" />
				</p>
				<p>
					<label for="medico">Médico</label>
					<input type="text" name="medico" id="medico" required tabindex="9" maxlength="30" />
				</p>
				<p>
					<label for="obra-social">Obra social</label>
					<input type="text" name="obra-social" id="obras-sociales" required tabindex="10" maxlength="30" />
				</p>
				<p class="fecha">
					<label for="fecha-turno">Fecha del turno</label>
					<input type="date" name="fecha-turno" id="fecha-turno" required tabindex="11" />
				</p>
				<p class="hora">
					<label for="hora-turno">Horario del turno</label>
					<input type="time" name="hora-turno" id="hora-turno" required tabindex="12" />
				</p>
			</fieldset>
			<?php echo (isset($status) && $status->value !== 'REGISTER_OK') ? '<p class="msg">' . $messages[$status->value] . '</p>' : '' ?>
			<section class="button-container">
				<input class="submit" type="submit" value="Solicitar turno" />
				<input class="reset" type="reset" value="Limpiar" />
			</section>
		</form>
	</main>
</body>

</html>