<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 08/05/2024
 */
?>
<h1 class="text-secondary">REST</h1>
<form class="position-absolute top-0 end-0" style="margin-top: 85px; margin-right: 15px" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input class="btn btn-danger" name="volver" type="submit" value="Volver">
</form>
<div style="display: flex;">
    <div style="margin-top: 50px; margin-left: 50px; max-width: 29%; display: flex; justify-content: center;">
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset class=" nasa">
                <legend>
                    <h2>Foto del dia de la nasa</h2>
                </legend>
                <input type="date" name="fecha" value="<?php echo isset($_SESSION['nasaFecha']) ? $_SESSION['nasaFecha'] :  date("Y-m-d") ?>" max=<?php $hoy = date("Y-m-d");
                                                                                                                                                    echo $hoy; ?> min='1999-01-01'>
                <input type="submit" value="Aceptar" name="nasa">
                <p><b>Titulo de la Imagen:</b> <?php echo isset($aVistaRest['nasa']['title']) ? $aVistaRest['nasa']['title'] : 'Titulo no disponible'; ?></p>
                    <?php if (isset($aVistaRest['nasa']['hdurl'])){?>
                        <img src="<?php echo $aVistaRest['nasa']['hdurl']; ?>" width="300px" height="300px">
                    <?php }else { ?>
                        <p>Imagen no disponible</p>
                    <?php } ?>
                <hr>
                <p style="margin-top: 20px;"><span style="font-weight: bold;">URL</span>: https://api.nasa.gov/planetary/apod?api_key=rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14&date=$fecha", false, $context</p>
                <p><span style="font-weight: bold;">Parametros:</span> Fecha</p>
                <p><span style="font-weight: bold;">Metodo:</span> GET</p>
            </fieldset>
        </form>
    </div>
</div>
