<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
?>
<h1 class="text-secondary">Registro</h1>
<form class="w-40 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Codigo de Usuario</label>
        <input type="text" class="form-control bg-warning" name="T01_CodUsuario" value="<?php echo (isset($_REQUEST['T01_CodUsuario']) ? $_REQUEST['T01_CodUsuario'] : ''); ?>">
        <?php echo (!empty($aErrores["T01_CodUsuario"]) ? '<span style="color: red;">' . $aErrores["T01_CodUsuario"] . '</span>' : ''); //Esto es para mostrar el mensaje de error en color rojo  ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Decripcion Usuario</label>
        <input type="text" class="form-control bg-warning" name="T01_DescUsuario" value="<?php echo (isset($_REQUEST['T01_DescUsuario']) ? $_REQUEST['T01_DescUsuario'] : ''); ?>">
        <?php echo (!empty($aErrores["T01_DescUsuario"]) ? '<span style="color: red;">' . $aErrores["T01_DescUsuario"] . '</span>' : ''); //Esto es para mostrar el mensaje de error en color rojo  ?>
    </div>
        <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control bg-warning" name="T01_Password" value="<?php echo (isset($_REQUEST['T01_Password']) ? $_REQUEST['T01_Password'] : ''); ?>">
        <?php echo (!empty($aErrores["T01_Password"]) ? '<span style="color: red;">' . $aErrores["T01_Password"] . '</span>' : ''); //Esto es para mostrar el mensaje de error en color rojo  ?>
    </div>
        <div class="mb-3">
        <label class="form-label">Repetir contraseña</label>
        <input type="password" class="form-control bg-warning" name="repetirPassword" value="<?php echo (isset($_REQUEST['repetirPassword']) ? $_REQUEST['repetirPassword'] : ''); ?>">
        <?php echo (!empty($aErrores["repetirPassword"]) ? '<span style="color: red;">' . $aErrores["repetirPassword"] . '</span>' : ''); //Esto es para mostrar el mensaje de error en color rojo  ?>
    </div>
    <input class="btn btn-primary" name="enviar" type="submit" value="Registrarse">
    <input class="btn btn-danger" name="volver" type="submit" value="Volver">
</form>
