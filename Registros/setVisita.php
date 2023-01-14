<?php
$x= filter_input(INPUT_POST,'apartamento');
var_dump($x);

require_once '../vendor/autoload.php';

$visitanteDao = new \App\Model\VisitanteDao();
$visitante=$visitanteDao->validate(filter_input(INPUT_POST,'indentidade'));

$visita = new \App\Model\Visita();
foreach($visitante as $v){
    $visita->setId_visitante($v['id']);
}

$visita->setId_apartamento(filter_input(INPUT_POST,'apartamento'));


$visitaDao = new \App\Model\VisitaDao();
$visitaDao->entrada($visita);




header("Location: ../iindex.php");

