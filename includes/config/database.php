<?php

    function conectarBD() : mysqli{
        $db = mysqli_connect('localhost', 'root', 'root', 'servicio_local');

        if(!$db){
            echo "Error! No se pudo conectar con la base de datos";
            exit;
        }

        return $db;
    }