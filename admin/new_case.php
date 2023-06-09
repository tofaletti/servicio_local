<?php
    require '../includes/funciones.php';

    //Conexion
    require '../includes/config/database.php';
    $db = conectarBD();

    //Inclusion de Templates 
    incluirTemplates('header');

?>

<main>
    <h1>Nuevo Caso</h1>
    

    <form action="">
        <fieldset><!--Chico-->
            <legend>Información del Niño</legend>
            <label for="nombre_chico">Nombre del Niño</label>
            <input type="text" placeholder="Indique el Nombre del Niño" id="nombre_chico">

            <label for="apellido_chico">Apellido del Niño</label>
            <input type="text" placeholder="Indique el Apellido del Niño" id="apellido_chico">

            <label for="apodo_chico">Apodo del Niño</label>
            <input type="text" placeholder="Indique el Apodo del Niño" id="apodo_chico">

            <label for="tipo_dni_chico">Tipo de Documento</label>
            <select name="" id="tipo_dni_chico">
                <option value="" disabled selected>Seleccione Tipo de Documento</option>
                <?php 
                    foreach(listarEnums('dni', $db) as $tipo_dni): ?>
                        <option value="<?php str_replace("'", "", $tipo_dni); ?>"><?php echo str_replace("'", "", $tipo_dni); ?></option>
                <?php
                    endforeach;
                ?>
            </select>

            <label for="dni_chico">DNI</label>
            <input type="number" min="0" id="dni_chico">

            <label for="fecha_nacimiento_chico">Fecha de Nacimiento</label>
            <input type="date" value="<?php echo date(''); ?>" id="fecha_nacimiento_chico">

            <label for="domicilio_chico">Domicilio</label>
            <input type="text" placeholder="Indique Calle y Altura" id="domicilio_chico">
            
            <label for="barrio_chico">Indique el Barrio</label>
            <select name="" id="barrio_chico">
                <option value="" disabled selected>Seleccione Barrio</option>
                <?php 
                    foreach(listarEnums('barrio', $db) as $nombre_barrio): ?>
                        <option value="<?php str_replace("'", "", $nombre_barrio); ?>"><?php echo str_replace("'", "", $nombre_barrio); ?></option>
                <?php
                    endforeach;
                ?>
            </select>
        </fieldset>

        <fieldset><!--Responsable-->
            <legend>Información del Responsable</legend>

            <label for="relacion">Tipo de Relación</label>
            <select name="" id="relacion">
                <option value="" disabled selected>Seleccione Relación</option>
                <?php 
                    foreach(listarEnums('relacion', $db) as $relacion): ?>
                        <option value="<?php str_replace("'", "", $relacion); ?>"><?php echo str_replace("'", "", $relacion); ?></option>
                <?php
                    endforeach;
                ?>
            </select>

            <label for="nombre_responsable">Nombre del Responsable</label>
            <input type="text" placeholder="Indique el Nombre del Responsable" id="nombre_responsable">

            <label for="apellido_responsable">Apellido del Responsable</label>
            <input type="text" placeholder="Indique el Apellido del Responsable" id="apellido_responsable">

            <label for="tipo_dni_responsable">Tipo de Documento</label>
            <select name="" id="tipo_dni_responsable">
                <option value="" disabled selected>Seleccione Tipo de Documento</option>
                <?php 
                    foreach(listarEnums('dni', $db) as $tipo_dni): ?>
                        <option value="<?php str_replace("'", "", $tipo_dni); ?>"><?php echo str_replace("'", "", $tipo_dni); ?></option>
                <?php
                    endforeach;
                ?>
            </select>

            <label for="dni_responsable">DNI</label>
            <input type="number" min="0" id="dni_responsable">

            <label for="fecha_nacimiento_responsable">Fecha de Nacimiento</label>
            <input type="date" value="<?php echo date(''); ?>" id="fecha_nacimiento_responsable">

            <label for="domicilio_responsable">Domicilio</label>
            <input type="text" placeholder="Indique Calle y Altura" id="domicilio_responsable">
            
            <label for="barrio_responsable">Indique el Barrio</label>
            <select name="" id="barrio_responsable">
                <option value="" disabled selected>Seleccione Barrio</option>
                <?php 
                    foreach(listarEnums('barrio', $db) as $nombre_barrio): ?>
                        <option value="<?php str_replace("'", "", $nombre_barrio); ?>"><?php echo str_replace("'", "", $nombre_barrio); ?></option>
                <?php
                    endforeach;
                ?>
            </select>

            <label for="telefono">Número de Teléfono</label>
            <input type="tel" id="telefono" placeholder="Número de Teléfono">
        </fieldset>

        <fieldset><!--Caso-->
            <legend>Acerca del Caso</legend>
            
            <label for="n_expediente">N° Expediente</label>
            <input type="number" id="n_expediente" placeholder="Digite N° de Expediente">

            <label for="ingreso">Fecha de Ingreso</label>
            <input type="date" id="ingeso" value="<?php echo date("Y-m-d"); ?>">

            <label for="denunciante">Nombre Completo del Denunciante</label>
            <input type="text" placeholder="Ingrese Nombre Completo">

            <label for="origen">Origen del Caso</label>
            <select name="" id="origen">
                <option value="" disabled selected>Origen</option>
                <?php foreach(listarEnums('origen', $db) as $origen): ?>
                    <option value="<?php str_replace("'", "", $origen); ?>"><?php echo str_replace("'", "", $origen); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="observaciones">Observaciones</label>
            <div id="observaciones">   
                <label for="asi">ASI</label><input type="checkbox" name="" id="asi">
                <label for="maltrato">Maltrato Infantil</label><input type="checkbox" name="" id="maltrato">
                <label for="calle">Situación de Calle</label><input type="checkbox" name="" id="calle">
                <label for="riesgo_hab">Riesgo Habitacional</label><input type="checkbox" name="" id="riesgo_hab">
                <label for="fugas">Fugas del Hogar</label><input type="checkbox" name="" id="fugas">
                <label for="embarazo">Menor Embarazada</label><input type="checkbox" name="" id="embarazo">
                <label for="adicciones">Adicciones</label><input type="checkbox" name="" id="adicciones">
                <label for="ley">Conflictos con la Ley</label><input type="checkbox" name="" id="ley">
                <label for="abandono">Abandono de Persona</label><input type="checkbox" name="" id="abandono">
                <label for="laboral">Explotacion Laboral</label><input type="checkbox" name="" id="laboral">
                <label for="sexual">Explotacion Sexual</label><input type="checkbox" name="" id="sexual">
                <label for="ausentismo">No asiste a Escuela</label><input type="checkbox" name="" id="ausentismo">
                <label for="adopcion">Adoptado</label><input type="checkbox" name="" id="adopcion">
                <label for="bullying">Recibe Bullying</label><input type="checkbox" name="" id="bullying">
            </div>

            
            <label for="medidas">Medidas Tomadas</label>
            <div id="medidas">   
                <label for="intervencion">Intervención</label><input type="checkbox" name="" id="intervercion">
                <label for="abrigo">Abrigo</label><input type="checkbox" name="" id="abrigo">
                <label for="transito">Casa de Transito</label><input type="checkbox" name="" id="transito">
            </div>
        </fieldset>

    </form>
</main>

<?php
    incluirTemplates('footer');
?>
