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
                <input type="date" name="fechaNasa" value="<?php echo isset($_SESSION['nasaFechaEnCurso']) ? $_SESSION['nasaFechaEnCurso'] : date("Y-m-d") ?>" max=<?php $hoy = date("Y-m-d");
echo $hoy;
?> min='1999-01-01'>
                <input type="submit" value="Aceptar" name="nasa">
                <p><b>Titulo de la Imagen:</b> <?php echo isset($aVistaRest['nasa']['title']) ? $aVistaRest['nasa']['title'] : 'Titulo no disponible'; ?></p>
                <?php if (isset($aVistaRest['nasa']['hdurl'])) { ?>
                    <img src="<?php echo $aVistaRest['nasa']['hdurl']; ?>" width="300px" height="300px">
                <?php } else { ?>
                    <p>Imagen no disponible</p>
<?php } ?>
                <hr>
                <p style="margin-top: 20px;"><span style="font-weight: bold;">URL</span>: https://api.nasa.gov/planetary/apod?api_key=rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14&date=$fecha", false, $context</p>
                <p><span style="font-weight: bold;">Parametros:</span> Fecha</p>
                <p><span style="font-weight: bold;">Metodo:</span> GET</p>
            </fieldset>
        </form>
    </div>
    <div>
        <form name="formulario2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset class="aemet">
                <legend>
                    <h2>Prediccion del dia</h2>
                </legend>
                <?php
                    // Definir el valor $provinciaSeleccionada
                    $provinciaSeleccionada = isset($_SESSION['provinciaSeleccionada']) ? $_SESSION['provinciaSeleccionada'] : '01';
                ?>
                <select name="provincia" id="provincia">
                    <option value="01" <?php echo ($provinciaSeleccionada == '01') ? 'selected' : ''; ?>>Araba/Álava</option>
                    <option value="02" <?php echo ($provinciaSeleccionada == '02') ? 'selected' : ''; ?>>Albacete</option>
                    <option value="03" <?php echo ($provinciaSeleccionada == '03') ? 'selected' : ''; ?>>Alacant/Alicante</option>
                    <option value="04" <?php echo ($provinciaSeleccionada == '04') ? 'selected' : ''; ?>>Almería</option>
                    <option value="33" <?php echo ($provinciaSeleccionada == '33') ? 'selected' : ''; ?>>Asturias</option>
                    <option value="05" <?php echo ($provinciaSeleccionada == '05') ? 'selected' : ''; ?>>Ávila</option>
                    <option value="06" <?php echo ($provinciaSeleccionada == '06') ? 'selected' : ''; ?>>Badajoz</option>
                    <option value="08" <?php echo ($provinciaSeleccionada == '08') ? 'selected' : ''; ?>>Barcelona</option>
                    <option value="48" <?php echo ($provinciaSeleccionada == '48') ? 'selected' : ''; ?>>Bizkaia</option>
                    <option value="09" <?php echo ($provinciaSeleccionada == '09') ? 'selected' : ''; ?>>Burgos</option>
                    <option value="10" <?php echo ($provinciaSeleccionada == '10') ? 'selected' : ''; ?>>Cáceres</option>
                    <option value="11" <?php echo ($provinciaSeleccionada == '11') ? 'selected' : ''; ?>>Cádiz</option>
                    <option value="39" <?php echo ($provinciaSeleccionada == '39') ? 'selected' : ''; ?>>Cantabria</option>
                    <option value="12" <?php echo ($provinciaSeleccionada == '12') ? 'selected' : ''; ?>>Castelló/Castellón</option>
                    <option value="51" <?php echo ($provinciaSeleccionada == '51') ? 'selected' : ''; ?>>Ceuta</option>
                    <option value="13" <?php echo ($provinciaSeleccionada == '13') ? 'selected' : ''; ?>>Ciudad Real</option>
                    <option value="14" <?php echo ($provinciaSeleccionada == '14') ? 'selected' : ''; ?>>Córdoba</option>
                    <option value="15" <?php echo ($provinciaSeleccionada == '15') ? 'selected' : ''; ?>>A Coruña</option>
                    <option value="16" <?php echo ($provinciaSeleccionada == '16') ? 'selected' : ''; ?>>Cuenca</option>
                    <option value="17" <?php echo ($provinciaSeleccionada == '17') ? 'selected' : ''; ?>>Girona</option>
                    <option value="18" <?php echo ($provinciaSeleccionada == '18') ? 'selected' : ''; ?>>Granada</option>
                    <option value="19" <?php echo ($provinciaSeleccionada == '19') ? 'selected' : ''; ?>>Guadalajara</option>
                    <option value="20" <?php echo ($provinciaSeleccionada == '20') ? 'selected' : ''; ?>>Gipuzkoa</option>
                    <option value="21" <?php echo ($provinciaSeleccionada == '21') ? 'selected' : ''; ?>>Huelva</option>
                    <option value="22" <?php echo ($provinciaSeleccionada == '22') ? 'selected' : ''; ?>>Huesca</option>
                    <option value="23" <?php echo ($provinciaSeleccionada == '23') ? 'selected' : ''; ?>>Jaén</option>
                    <option value="24" <?php echo ($provinciaSeleccionada == '24') ? 'selected' : ''; ?>>León</option>
                    <option value="25" <?php echo ($provinciaSeleccionada == '25') ? 'selected' : ''; ?>>Lleida</option>
                    <option value="27" <?php echo ($provinciaSeleccionada == '27') ? 'selected' : ''; ?>>Lugo</option>
                    <option value="28" <?php echo ($provinciaSeleccionada == '28') ? 'selected' : ''; ?>>Madrid</option>
                    <option value="29" <?php echo ($provinciaSeleccionada == '29') ? 'selected' : ''; ?>>Málaga</option>
                    <option value="52" <?php echo ($provinciaSeleccionada == '52') ? 'selected' : ''; ?>>Melilla</option>
                    <option value="30" <?php echo ($provinciaSeleccionada == '30') ? 'selected' : ''; ?>>Murcia</option>
                    <option value="31" <?php echo ($provinciaSeleccionada == '31') ? 'selected' : ''; ?>>Navarra</option>
                    <option value="32" <?php echo ($provinciaSeleccionada == '32') ? 'selected' : ''; ?>>Ourense</option>
                    <option value="34" <?php echo ($provinciaSeleccionada == '34') ? 'selected' : ''; ?>>Palencia</option>
                    <option value="36" <?php echo ($provinciaSeleccionada == '36') ? 'selected' : ''; ?>>Pontevedra</option>
                    <option value="26" <?php echo ($provinciaSeleccionada == '26') ? 'selected' : ''; ?>>La Rioja</option>
                    <option value="37" <?php echo ($provinciaSeleccionada == '37') ? 'selected' : ''; ?>>Salamanca</option>
                    <option value="40" <?php echo ($provinciaSeleccionada == '40') ? 'selected' : ''; ?>>Segovia</option>
                    <option value="41" <?php echo ($provinciaSeleccionada == '41') ? 'selected' : ''; ?>>Sevilla</option>
                    <option value="42" <?php echo ($provinciaSeleccionada == '42') ? 'selected' : ''; ?>>Soria</option>
                    <option value="43" <?php echo ($provinciaSeleccionada == '43') ? 'selected' : ''; ?>>Tarragona</option>
                    <option value="44" <?php echo ($provinciaSeleccionada == '44') ? 'selected' : ''; ?>>Teruel</option>
                    <option value="45" <?php echo ($provinciaSeleccionada == '45') ? 'selected' : ''; ?>>Toledo</option>
                    <option value="46" <?php echo ($provinciaSeleccionada == '46') ? 'selected' : ''; ?>>València/Valencia</option>
                    <option value="47" <?php echo ($provinciaSeleccionada == '47') ? 'selected' : ''; ?>>Valladolid</option>
                    <option value="49" <?php echo ($provinciaSeleccionada == '49') ? 'selected' : ''; ?>>Zamora</option>
                    <option value="50" <?php echo ($provinciaSeleccionada == '50') ? 'selected' : ''; ?>>Zaragoza</option>
                </select>
                <button class="volver" type="submit" name="prevision">Obtener Previsión</button>
                <hr>
                <?php
                    // Muestra con formato los datos
                    $previsionUtf8 = utf8_encode(file_get_contents($aVistaRest['AEMET']['datos']));
                    if (isset($previsionUtf8)) {
                        echo "<pre>{$previsionUtf8}</pre>";
                    }
                ?>
            </fieldset>
        </form>
    </div>
</div>
