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
    <h2>Bienvenido!</h2>
    <fieldset>
      <legend>Iniciar sesión</legend>
      <p>
        <label class="label" for="email">Correo electronico</label>
        <input class="input" autocomplete="off" type="email" name="email" id="email" required tabindex="1"
          maxlength="50" value="<?= $loginData["email"] ?? ""?>"/>
      </p>
      <p>
        <label class="label" for="password">Contraseña</label>
        <input class="input" type="password" name="password" id="password" required tabindex="2" maxlength="30" />
        <span>👁‍🗨</span>
      </p>
    </fieldset>
    <?php echo (isset($login["status"]) && $login["status"] -> value !== 'LOGIN_OK') ? '<p class="msg">'.$login["message"].'</p>' : '' ?>
    <input type="submit" value="Iniciar sesión" />
  </form>
  <p class="register">
    ¿No tiene cuenta?
    <a href="/register">Registrese aquí.</a>
  </p>
</body>

</html>