<?php

    //Inclusion de Templates 
    require '../includes/funciones.php';
    incluirTemplates('header');
?>

<main>
    <h1>Nuevo Caso</h1>

    <form action="">
        <fieldset>
            <legend>Información del Niño</legend>
            <label for="nombre_chico">Nombre del Niño</label>
            <input type="text" placeholder="Indique el Nombre del Niño" id="nombre_chico">

            <label for="apellido_chico">Apellido del Niño</label>
            <input type="text" placeholder="Indique el Apellido del Niño" id="apellido_chico">

            <label for="tipo_dni">Tipo de Documento</label>
            <select name="" id="tipo_dni">
                <option value="" disabled selected>Seleccione Tipo de Documento</option>
                <option value="DNI">DNI</option>
                <option value="Partida de Naciemiento">Partida de Naciemiento</option>
                <option value="Pasaporte">Pasaporte</option>
            </select>

            <label for="dni">DNI</label>
            <input type="number" min="0">

            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" value="<?php echo date(''); ?>">
        </fieldset>

    </form>
</main>

<?php
    incluirTemplates('footer');
?>
