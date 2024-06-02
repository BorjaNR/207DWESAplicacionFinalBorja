<h1 class="text-secondary">Cambiar Password</h1>
<form class="w-45 position-absolute top-50 start-50 translate-middle" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div>
        <label class="form-label">Contraseña Actual</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100 bg-warning " style="width: 261.66px; height: 38px;" type="password" name="contraseña" value="<?php echo (isset($_REQUEST['contraseña']) ? $_REQUEST['contraseña'] : ''); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['contraseña']) ? '<span style="color: red;">' . $aErrores['contraseña'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <div>
        <label class="form-label">Nueva Contraseña</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100 bg-warning " style="width: 261.66px; height: 38px;" type="password" name="nuevaContraseña" value="<?php echo (isset($_REQUEST['nuevaContraseña']) ? $_REQUEST['nuevaContraseña'] : ''); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['nuevaContraseña']) ? '<span style="color: red;">' . $aErrores['nuevaContraseña'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <div>
        <label class="form-label">Repetir Contraseña</label>
    </div>
    <div class="mb-3 d-flex justify-content-center">
        <input class="form-control mw-100 bg-warning " style="width: 261.66px; height: 38px;" type="password" name="repetirNuevaContraseña" value="<?php echo (isset($_REQUEST['repetirNuevaContraseña']) ? $_REQUEST['repetirNuevaContraseña'] : ''); ?>">
    </div>
    <div>
        <?php echo (!empty($aErrores['repetirNuevaContraseña']) ? '<span style="color: red;">' . $aErrores['repetirNuevaContraseña'] . '</span>' : '');//Esto es para mostrar el mensaje de error en color rojo ?>
    </div>
    <input class="btn btn-primary" name="guardarCambios" type="submit" value="Confirmar">
    <input class="btn btn-danger" name="cancelar" type="submit" value="Cancelar">
</form>