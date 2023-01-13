<?php
require_once './vendor/autoload.php';
$visitaDao = new \App\Model\VisitaDao();
$op_visitas= $visitaDao->read();
var_dump($op_visitas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="cadastro_visitante">
        <h2>Cadastrar visitante</h2>
        <form action="Registros/setVisitante.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
            <label for="sobrenome">Sobrenome:</label>
            <input type="text" name="sobrenome" id="sobrenome">
            <label for="indentidade">Indentidade:</label>
            <input type="text" name="indentidade" id="indentidade">
            <label for="empresa">Empresa:</label>
            <input type="text" name="empresa" id="empresa">
            <input type="submit" value="Cadastrar">
        </form>
    </section>
    <section class="registro_entrada">
        <h2>Registrar entrada</h2>
        <form action="Registros/setVisita.php" method="post">

            <label for="indentidade">Indentidade:</label>
            <input type="text" name="indentidade" id="indentidade">

            <label for="apartamento">Apartamento:</label>
            <input type="number" name="apartamento" id="apartamento">

            <input type="submit" value="Registrar">

        </form>
    </section>

    <section class="registro_saida">
        <h2>Visitas ativas</h2>
        <form action="setSaida.php" method="post">

            <label for="apartamento">Apartamento:</label>
            <input type="number" name="apartamento" id="apartamento">
            
            <input type="submit" value="Adicionar">

        </form>
    </section>
</body>
</html>
