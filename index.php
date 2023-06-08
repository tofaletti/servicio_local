<?php
    
    //Conexion
    require 'includes/config/database.php';
    $db = conectarBD();
    //Query
    $query = "SELECT * FROM personas 
    JOIN responsables ON responsables.id_persona = personas.id_persona
    JOIN chicos ON chicos.id_persona = personas.id_persona
    JOIN casos ON casos.id_chico = chicos.id_chico AND casos.id_responsable = responsables.id_responsable;";
    //Consultar
    $resultado = mysqli_query($db, $query);


    //Inclusion de Templates 
    require 'includes/funciones.php';
    incluirTemplates('header');
?>

<main>
    <h1>Casos Recientes</h1>
    <table>
        <thead>
            <tr>
                <th>N° Expediente</th>
                <th>Nombre y Apellido</th>
                <th>Apodo</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Domicilio</th>
                <th>Barrio</th>
                <th>Responsable</th>
                <th>Relación</th>
                <th>Teléfono</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody><!--Casos recientes-->
            <?php while($caso = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <th><?php echo $caso['n_expediente']; ?></th>
                <th><?php echo $caso['nombre'] . " " . $caso['apellido']; ?></th>
                <th><?php echo $caso['apodo']; ?></th>
                <th><?php echo $caso['dni']; ?></th>
                <th>
                    <?php 
                        $edad = date('Y/m/d') - $caso['fecha_nacimiento']; 
                        echo $edad;    
                    ?>
                </th>
                <th><?php echo $caso['domicilio']; ?></th>
                <th><?php echo $caso['barrio']; ?></th>
                <th><?php echo $caso['id_responsable']; ?></th>
                <th><?php echo $caso['relacion']; ?></th>
                <th><?php echo $caso['telefono']; ?></th>
                <th><a href="#">Detalles</a></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
    mysqli_close($db);
    incluirTemplates('footer');
?>