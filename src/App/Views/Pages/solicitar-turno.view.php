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
		<h2 class="title"><?= $title ?></h2>
		<?php echo (isset($register["status"]) && $register["status"]->value !== 'REGISTER_OK') ? '<p class="msg">' . $register["message"]. '</p>' : '' ?>
		<form action="" method="POST" class="form" enctype="multipart/form-data">
			<fieldset class="patient-data">
				<legend>Datos personales</legend>
				<p>
					<label for="dni">DNI</label>
					<input type="number" name="dni" id="dni" required tabindex="1" maxlength="8" autocomplete="off" value="<?= $shiftData["dni"] ?? "" ?>" />
				</p>
				<p>
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" id="nombre" required tabindex="2" maxlength="30" autocomplete="off" value="<?= $shiftData["name"] ?? "" ?>"/>
				</p>
				<p>
					<label for="apellido">Apellido</label>
					<input type="text" name="apellido" id="apellido" required tabindex="3" maxlength="30" autocomplete="off" value="<?= $shiftData["lastname"] ?? "" ?>"/>
				</p>
				<p class="genero">
					<label for="genero">Género</label>
					<input type="radio" name="genero" id="masculino" value="M" 
						<?php if(isset($shiftData["genero"])): ?>
							<?php if($shiftData["genero"] !== "F"): echo "checked"; else: echo ""; ?>
							<?php endif;?>
						<?php else: echo "checked" ?>
						<?php endif; ?>
					/>
					<label for="masculino">Masculino</label>
					<input type="radio" name="genero" id="femenino" value="F" 
						<?php if(isset($shiftData["genero"])): ?>
							<?php if($shiftData["genero"] === "F"): echo "checked"; else: echo ""; ?>
							<?php endif;?>
						<?php endif; ?>
					/>
					<label for="femenino">Femenino</label>
				</p>
				<p class="fecha">
					<label for="nacimiento">Fecha de Nacimiento</label>
					<input type="date" name="nacimiento" id="nacimiento" required tabindex="4" value="<?= $shiftData["nacimiento"] ?? "" ?>"/>
				</p>
				<p class="edad">
					<label for="edad">Edad</label>
					<input type="number" name="edad" id="edad" required tabindex="5" maxlength="3" value="<?= $shiftData["edad"] ?? "" ?>">
				</p>
			</fieldset>
			<fieldset class="contact-data">
				<legend>Datos de contacto</legend>
				<p>
					<label for="email">Correo Electrónico</label>
					<input type="email" name="email" id="email" required tabindex="6" maxlength="50" autocomplete="off" value="<?= $shiftData["email"] ?? "" ?>"/>
				</p>
				<p>
					<label for="telefono">Teléfono Celular</label>
					<input type="tel" name="telefono" id="telefono" required tabindex="7" maxlength="50" autocomplete="off" value="<?= $shiftData["telefono"] ?? "" ?>"/>
				</p>
			</fieldset>
			<fieldset class="turn-data">
				<legend>Datos del turno</legend>
				<p>
					<label for="especialidad">Especialidad</label>
					<!--<input type="text" name="especialidad" id="especialidades" required tabindex="8" maxlength="30" autocomplete="off" value="<?= $shiftData["especialidad"] ?? "" ?>"/>-->
					<select class="especialidad" id="opcion" name="especialidades">
					<?php if (sizeof($especialidades) > 0): ?>
							<?php $i = 1?>
							<?php foreach ($especialidades as $especialidad): ?>
								<option value="<?= $i?>"><?= $especialidad->getName() ?></option>
								<?php $i++ ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</p>
				<p class="medicos">
					<label for="medico">Médico</label>
					<!--<input type="text" name="medico" id="medico" required tabindex="9" maxlength="30" autocomplete="off" value="<?= $shiftData["profesional"] ?? "" ?>"/>-->
					<select class="medico" id="opcion" name="profesionales">
						<option value="0">Seleccione un Médico</option>
						<?php if (sizeof($profesionales) > 0): ?>
							<?php foreach ($profesionales as $profesional): ?>
								<option value="<?= $profesional->getId()?>"><?= $profesional->getName() . " " . $profesional->getLastName()?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</p>
				<p>
					<label for="obra-social">Obra social</label>
					<!--<input type="text" name="obra-social" id="obras-sociales" required tabindex="10" maxlength="30" autocomplete="off" value="<?= $shiftData["obraSocial"] ?? "" ?>"/>-->
					<select id="opcion" name="profesionales">
						<?php if (sizeof($obrasSociales) > 0): ?>
							<?php $i = 1?>
							<?php foreach ($obrasSociales as $obraSocial): ?>
								<option value="<?= $i?>"><?= $obraSocial->getName() ?></option>
								<?php $i++ ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</p>
				<p class="fecha">
					<label for="fecha-turno">Fecha del turno</label>
					<input class="fecha-turno" type="date" name="fecha-turno" id="fecha-turno" required tabindex="11" value="<?= $shiftData["fecha"] ?? "" ?>"/>
				</p>
				<p class="hora">
					<label for="hora-turno">Horario del turno</label>
					<input class="hora-turno" type="time" name="hora-turno" id="hora-turno" required tabindex="12" value="<?= $shiftData["hora"] ?? "" ?>"/>
				</p>
				<p class="estudio">
					<label for="estudio">Estudio clínico</label>
					<input name="estudio" id="estudio" type="file" accept="image/png, image/jpg, image/jpeg, application/pdf"  max="1"/>
				</p>
			</fieldset>
			<section class="button-container">
				<input class="submit" type="submit" value="Solicitar turno" />
				<input class="reset" type="reset" value="Limpiar" />
			</section>
		</form>
	</main>
</body>

</html>