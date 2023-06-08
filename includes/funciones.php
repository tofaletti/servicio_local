<?php 

require 'app.php';

function incluirTemplates(string $nombre, bool $inicio = false){
    include TEMPLATES_URL . "/{$nombre}.php";
}

function incluirQuestions(string $preguntas, bool $inicio = false){
    include QUESTIONS_URL . "/{$preguntas}.php";
}