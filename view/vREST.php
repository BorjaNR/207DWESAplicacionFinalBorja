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
                <input type="date" name="fechaNasa" value="<?php echo isset($_SESSION['nasaFechaEnCurso']) ? $_SESSION['nasaFechaEnCurso'] : date("Y-m-d") ?>" max=<?php
                $hoy = date("Y-m-d");
                echo $hoy;
                ?> min='1999-01-01'>
                <input type="submit" value="Aceptar" name="nasa">
                <p><b>Titulo de la Imagen:</b> <?php echo isset($aVistaRest['nasa']['titulo']) ? $aVistaRest['nasa']['titulo'] : 'Titulo no disponible'; ?></p>
                <?php if (isset($aVistaRest['nasa']['foto'])) { ?>
                    <img src="<?php echo $aVistaRest['nasa']['foto']; ?>" width="300px" height="300px">
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
                $provinciaEnCurso = isset($_SESSION['AEMETProvinciaEnCurso']) ? $_SESSION['AEMETProvinciaEnCurso'] : '49';
                ?>
                <select name="provincia" id="provincia">
                    <option value="49" <?php echo ($provinciaEnCurso == '49') ? 'selected' : ''; ?>>Zamora</option>
                    <option value="01" <?php echo ($provinciaEnCurso == '01') ? 'selected' : ''; ?>>Araba/Álava</option>
                    <option value="02" <?php echo ($provinciaEnCurso == '02') ? 'selected' : ''; ?>>Albacete</option>
                    <option value="03" <?php echo ($provinciaEnCurso == '03') ? 'selected' : ''; ?>>Alacant/Alicante</option>
                    <option value="04" <?php echo ($provinciaEnCurso == '04') ? 'selected' : ''; ?>>Almería</option>
                    <option value="33" <?php echo ($provinciaEnCurso == '33') ? 'selected' : ''; ?>>Asturias</option>
                    <option value="05" <?php echo ($provinciaEnCurso == '05') ? 'selected' : ''; ?>>Ávila</option>
                    <option value="06" <?php echo ($provinciaEnCurso == '06') ? 'selected' : ''; ?>>Badajoz</option>
                    <option value="08" <?php echo ($provinciaEnCurso == '08') ? 'selected' : ''; ?>>Barcelona</option>
                    <option value="48" <?php echo ($provinciaEnCurso == '48') ? 'selected' : ''; ?>>Bizkaia</option>
                    <option value="09" <?php echo ($provinciaEnCurso == '09') ? 'selected' : ''; ?>>Burgos</option>
                    <option value="10" <?php echo ($provinciaEnCurso == '10') ? 'selected' : ''; ?>>Cáceres</option>
                    <option value="11" <?php echo ($provinciaEnCurso == '11') ? 'selected' : ''; ?>>Cádiz</option>
                    <option value="39" <?php echo ($provinciaEnCurso == '39') ? 'selected' : ''; ?>>Cantabria</option>
                    <option value="12" <?php echo ($provinciaEnCurso == '12') ? 'selected' : ''; ?>>Castelló/Castellón</option>
                    <option value="51" <?php echo ($provinciaEnCurso == '51') ? 'selected' : ''; ?>>Ceuta</option>
                    <option value="13" <?php echo ($provinciaEnCurso == '13') ? 'selected' : ''; ?>>Ciudad Real</option>
                    <option value="14" <?php echo ($provinciaEnCurso == '14') ? 'selected' : ''; ?>>Córdoba</option>
                    <option value="15" <?php echo ($provinciaEnCurso == '15') ? 'selected' : ''; ?>>A Coruña</option>
                    <option value="16" <?php echo ($provinciaEnCurso == '16') ? 'selected' : ''; ?>>Cuenca</option>
                    <option value="17" <?php echo ($provinciaEnCurso == '17') ? 'selected' : ''; ?>>Girona</option>
                    <option value="18" <?php echo ($provinciaEnCurso == '18') ? 'selected' : ''; ?>>Granada</option>
                    <option value="19" <?php echo ($provinciaEnCurso == '19') ? 'selected' : ''; ?>>Guadalajara</option>
                    <option value="20" <?php echo ($provinciaEnCurso == '20') ? 'selected' : ''; ?>>Gipuzkoa</option>
                    <option value="21" <?php echo ($provinciaEnCurso == '21') ? 'selected' : ''; ?>>Huelva</option>
                    <option value="22" <?php echo ($provinciaEnCurso == '22') ? 'selected' : ''; ?>>Huesca</option>
                    <option value="23" <?php echo ($provinciaEnCurso == '23') ? 'selected' : ''; ?>>Jaén</option>
                    <option value="24" <?php echo ($provinciaEnCurso == '24') ? 'selected' : ''; ?>>León</option>
                    <option value="25" <?php echo ($provinciaEnCurso == '25') ? 'selected' : ''; ?>>Lleida</option>
                    <option value="27" <?php echo ($provinciaEnCurso == '27') ? 'selected' : ''; ?>>Lugo</option>
                    <option value="28" <?php echo ($provinciaEnCurso == '28') ? 'selected' : ''; ?>>Madrid</option>
                    <option value="29" <?php echo ($provinciaEnCurso == '29') ? 'selected' : ''; ?>>Málaga</option>
                    <option value="52" <?php echo ($provinciaEnCurso == '52') ? 'selected' : ''; ?>>Melilla</option>
                    <option value="30" <?php echo ($provinciaEnCurso == '30') ? 'selected' : ''; ?>>Murcia</option>
                    <option value="31" <?php echo ($provinciaEnCurso == '31') ? 'selected' : ''; ?>>Navarra</option>
                    <option value="32" <?php echo ($provinciaEnCurso == '32') ? 'selected' : ''; ?>>Ourense</option>
                    <option value="34" <?php echo ($provinciaEnCurso == '34') ? 'selected' : ''; ?>>Palencia</option>
                    <option value="36" <?php echo ($provinciaEnCurso == '36') ? 'selected' : ''; ?>>Pontevedra</option>
                    <option value="26" <?php echo ($provinciaEnCurso == '26') ? 'selected' : ''; ?>>La Rioja</option>
                    <option value="37" <?php echo ($provinciaEnCurso == '37') ? 'selected' : ''; ?>>Salamanca</option>
                    <option value="40" <?php echo ($provinciaEnCurso == '40') ? 'selected' : ''; ?>>Segovia</option>
                    <option value="41" <?php echo ($provinciaEnCurso == '41') ? 'selected' : ''; ?>>Sevilla</option>
                    <option value="42" <?php echo ($provinciaEnCurso == '42') ? 'selected' : ''; ?>>Soria</option>
                    <option value="43" <?php echo ($provinciaEnCurso == '43') ? 'selected' : ''; ?>>Tarragona</option>
                    <option value="44" <?php echo ($provinciaEnCurso == '44') ? 'selected' : ''; ?>>Teruel</option>
                    <option value="45" <?php echo ($provinciaEnCurso == '45') ? 'selected' : ''; ?>>Toledo</option>
                    <option value="46" <?php echo ($provinciaEnCurso == '46') ? 'selected' : ''; ?>>València/Valencia</option>
                    <option value="47" <?php echo ($provinciaEnCurso == '47') ? 'selected' : ''; ?>>Valladolid</option>
                    <option value="50" <?php echo ($provinciaEnCurso == '50') ? 'selected' : ''; ?>>Zaragoza</option>
                </select>
                <button class="volver" type="submit" name="prevision">Obtener Previsión</button>
                <hr>
                <?php
                // Muestra con formato los datos
                if (is_array($aVistaRest['AEMET'])) {
                    $previsionUtf8 = utf8_encode(file_get_contents());
                    if ($previsionUtf8 !== false) {
                        echo "<pre>{$previsionUtf8}</pre>";
                    } else {
                        echo "Error al leer el archivo: <br>";
                    }
                } else {
                    // Si $aVistaRest['AEMET'] no es un array, suponemos que es una cadena de texto
                    $previsionUtf8 = utf8_encode(file_get_contents($aVistaRest['AEMET']));
                    if ($previsionUtf8 !== false) {
                        echo "<pre>{$previsionUtf8}</pre>";
                    } else {
                        echo "Error al leer el archivo: {$aVistaRest['AEMET']}<br>";
                    }
                }
                ?>
            </fieldset>
        </form>
    </div>
    <div>
        <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset class=" nasa">
                <legend>
                    <h2>Buscar Departamento</h2>
                </legend>
                <input type="text" maxlength="3"  name="codDepartamento" value="<?php echo isset($_SESSION['DepartamentoEnCurso']) ? $_SESSION['DepartamentoEnCurso'] : 'AAA' ?>">
                <input type="submit" value="Buscar" name="departamento">
                <span style="color: #cc0000;" <?php echo isset($aVistaRest['departamento']['codigo']) ? $aVistaRest['departamento']['codigo'] : '';?>></span>
                <hr>
                <p><span style="font-weight: bold;">Codigo Departamento:</span><?php echo isset($aVistaRest['departamento']['codDep']) ? $aVistaRest['departamento']['codDep'] : ''; ?></p>
                <p><span style="font-weight: bold;">Descripcion del departamento:</span><?php echo isset($aVistaRest['departamento']['descDep']) ? $aVistaRest['departamento']['descDep'] : ''; ?></p>
                <p><span style="font-weight: bold;">Fecha de Creación:</span><?php echo isset($aVistaRest['departamento']['descDep']) ? $aVistaRest['departamento']['descDep'] : ''; ?></p>
                <p><span style="font-weight: bold;">Volumen de Negocio:</span><?php echo isset($aVistaRest['departamento']['volumen']) ? $aVistaRest['departamento']['volumen'] : ''; ?></p>
                <p><span style="font-weight: bold;">Fecha de Baja:</span><?php echo isset($aVistaRest['departamento']['fechaBaja']) ? $aVistaRest['departamento']['fechaBaja'] : ''?></p>
            </fieldset>
        </form>
    </div>
</div>
