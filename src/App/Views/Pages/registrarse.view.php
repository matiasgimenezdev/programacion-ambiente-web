<!DOCTYPE html>
<html lang="es">

<head>
  <?php require __DIR__ . "/../Fragments/head.view.php" ?>
</head>

<body>
  <h1 class="title">
    <?= $title ?>
  </h1>
  <form action="" method="POST">
    <fieldset>
      <legend>Registrarse</legend>
      <p class="input-container">
        <label class="label" for="dni">DNI</label>
        <input autocomplete="off" class="input" type="number" name="dni" id="dni" required tabindex="1" maxlength="8"
          minlenght="7" autofocus value="<?= $registerData["dni"] ?? "" ?>"/>
      </p>
      <p class="input-container">
        <label class="label" for="nombre">Nombre</label>
        <input autocomplete="off" class="input" type="text" name="nombre" id="nombre" required tabindex="2"
          maxlength="50" value="<?= $registerData["name"] ?? "" ?>"/>
      </p>
      <p class="input-container">
        <label class="label" for="apellido">Apellido</label>
        <input autocomplete="off" class="input" type="text" name="apellido" id="apellido" required tabindex="3"
          maxlength="50" value="<?= $registerData["lastname"] ?? ""?>"/>
      </p>
      <p class="input-container">
        <label class="label" for="email">Correo electrónico</label>
        <input autocomplete="off" class="input" type="email" name="email" id="email" required tabindex="4"
          maxlength="128" value="<?= $registerData["email"] ?? ""?>"/>
      </p>
      <p class="input-container">
        <label class="label" for="email2">Reingrese correo electrónico</label>
        <input autocomplete="off" class="input" type="email" name="email2" id="email2" required tabindex="5"
          maxlength="128" value="<?= $registerData["emailConfirmation"] ?? ""?>"/>
      </p>
      <p class="input-container">
        <label class="label" for="password">Contraseña</label>
        <input class="input pass" type="password" name="password" id="password" required tabindex="6" minlength="8"
          maxlength="30" value="<?= $registerData["password"] ?? ""?>"/>
        <span>👁‍🗨</span>
      </p>
      <p class="input-container">
        <label class="label" for="password2">Reingrese la Contraseña</label>
        <input class="input pass" type="password" name="password2" id="password" required tabindex="7" minlength="8"
          maxlength="30" value="<?= $registerData["passwordConfirmation"] ?? ""?>"/>
        <span>👁‍🗨</span>
      </p>
      <p class="p-terms">
        <input type="checkbox" name="terminos-condiciones" id="terminos-condiciones" value="true" />
        <label for="terminos-condiciones" class="terms-conditions">
          He leído y acepto los
          <a href="terminos.html" target="_blank">
            términos y condiciones de uso
          </a>
        </label>
      </p>
      
      <input type="submit" id="boton-submit" value="Registrarme" />
    </fieldset>
  </form>
  <p class="login">
    ¿Ya tiene una Cuenta?
    <a href="/login">Iniciar sesión.</a>
  </p>
</body>

</html>