<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
?>
<h1 class="text-secondary">Login</h1>
<form class="w-40 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" class="form-control bg-warning" name="usuario" value="<?php echo (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : ''); ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control bg-warning" name="pass" value="<?php echo (isset($_REQUEST['pass']) ? $_REQUEST['pass'] : ''); ?>">
    </div>
    <input class="btn btn-primary" name="enviar" type="submit" value="Inciar Sesion">
    <input class="btn btn-danger" name="volver" type="submit" value="Volver">
    <input class="btn btn-primary" name="registrarse" type="submit" value="Registrarse">
</form>