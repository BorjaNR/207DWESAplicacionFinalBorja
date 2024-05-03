<?php
/**
 * @author Borja Nuñez Refoyo
 * @version 2.0
 * @since 03/05/2024
 */
?>
<form class="position-absolute top-0 end-0" style="margin-top: 85px; margin-right: 15px" name="fomrulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input class="btn btn-danger" name="volver" type="submit" value="Volver">
</form>
<div class="container t-container">
    <table class="table table-striped table-bordered" style="margin-bottom: 75px;"> 
        <tr>
            <th class="rounded-top" colspan="2"><legend>ERROR</legend></th>
        </tr>
        <tr>
            <td>Código:</td>
            <td><span style="color:red"><?php echo $avError['error'] ?></span></td>
        </tr>
        <tr>
            <td>Descripción:</td>
            <td><span style="color:red"><?php echo $avError['descripcion'] ?></span></td>
        </tr>
        <tr>
            <td>Archivo:</td>
            <td><span style="color:red"><?php echo $avError['archivo'] ?></span></td>
        </tr>
        <tr>
            <td>Línea:</td>
            <td><span style="color:red"><?php echo $avError['linea'] ?></span></td>
        </tr>
    </table>
</div>
