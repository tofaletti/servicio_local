<?php 
    
require 'app.php';

function incluirTemplates(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/{$nombre}.php";
}

function incluirQuestions(string $preguntas, bool $inicio = false){
    include QUESTIONS_URL . "/{$preguntas}.php";
}

function listarEnums($consulta, $db){
        switch($consulta){
            case 'barrio':
                //Barrios---------
                //Query
                $query = "SHOW COLUMNS FROM personas LIKE 'barrio'";
                //Consultar
                $resultado = mysqli_query($db, $query);
                $barrios =  mysqli_fetch_assoc($resultado);
                return $barrios = explode(",", preg_replace("/(enum|set)\((.+?)\)/", "\\2", $barrios['Type']));
                    break;
            case 'dni':
                //Documentos--------
                //Query
                $query = "SHOW COLUMNS FROM personas LIKE 'tipo_dni'";
                //Consultar
                $resultado = mysqli_query($db, $query);
                $dni =  mysqli_fetch_assoc($resultado);
                return $dni = explode(",", preg_replace("/(enum|set)\((.+?)\)/", "\\2", $dni['Type']));
                    break;
            case 'relacion':
                //Relación-------
                //Query
                $query = "SHOW COLUMNS FROM responsables LIKE 'relacion'";
                //Consultar
                $resultado = mysqli_query($db, $query);
                $relaciones =  mysqli_fetch_assoc($resultado);
                return $relaciones = explode(",", preg_replace("/(enum|set)\((.+?)\)/", "\\2", $relaciones['Type']));
                    break;
            case 'origen':
                //Origen-------
                //Query
                $query = "SHOW COLUMNS FROM casos LIKE 'origen'";
                //Consultar
                $resultado = mysqli_query($db, $query);
                $origenes =  mysqli_fetch_assoc($resultado);
                return $origenes = explode(",", preg_replace("/(enum|set)\((.+?)\)/", "\\2", $origenes['Type']));
                    break;
                
            default:
                return "No hay Enums por listar";
                    break;
        }

}