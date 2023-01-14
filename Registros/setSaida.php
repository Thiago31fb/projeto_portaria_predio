<?php

require_once '../vendor/autoload.php';

$visitaDao = new \App\Model\VisitaDao();
$visita = new \App\Model\Visita();


$visita->setId(filter_input(INPUT_GET,'id'));



$visitaDao->saida($visita);
header("Location: ../iindex.php");

