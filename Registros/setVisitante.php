<?php

require_once '../vendor/autoload.php';

$visitante = new \App\Model\Visitante();
$visitante->setNome(filter_input(INPUT_POST,'nome'));
$visitante->setSobrenome(filter_input(INPUT_POST,'sobrenome'));
$visitante->setIndentidade(filter_input(INPUT_POST,'indentidade'));
$visitante->setEmpresa(filter_input(INPUT_POST,'empresa'));

$visitanteDao = new \App\Model\VisitanteDao();


$visitanteDao->create($visitante);

header("Location: ../iindex.php");
?>