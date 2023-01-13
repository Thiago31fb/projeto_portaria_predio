<?php

require_once '../vendor/autoload.php';

$visitanteDao = new \App\Model\VisitanteDao();
$visitante=$visitanteDao->validate(filter_input(INPUT_POST,'indentidade'));

$apartamentoDao = new \App\Model\ApartamentoDao();
$apartamento = $apartamentoDao->validate(filter_input(INPUT_POST,'apartamento'));

$visita = new \App\Model\Visita();
foreach($visitante as $v){
    $visita->setId_visitante($v['id']);
}
foreach($apartamento as $a){
    $visita->setId_apartamento($a['id']);
}

$visitaDao = new \App\Model\VisitaDao();
$visitaDao->entrada($visita);



header("Location: ../iindex.php");

