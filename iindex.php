<?php
require_once './vendor/autoload.php';

$visitaDao = new \App\Model\VisitaDao();
$op_visitas= $visitaDao->VisitasDiaOrAtiva();

$apartamentoDao = new \App\Model\ApartamentoDao();
$apartamentos = $apartamentoDao->read();
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

            <select name="apartamento" id="apartamento">
            <?php foreach($apartamentos as $ap): ?>
                <option value="<?=$ap['id']?>"><?=$ap['apartamento']?></option>
            
            <?php endforeach; ?>
            </select>

            <input type="submit" value="Registrar">

        </form>
    </section>

    <section class="registro_saida">
        <h2>Visitas do dia ou ativas</h2>
        <table border="1">
            <tr>
                <th>Apartamento</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Indentidade</th>
                <th>Entrada</th>
                <th>Saida</th>
            </tr>

            <?php foreach($op_visitas as $visitas): ?>

            <tr>
                <th><?=$visitas['apartamento'];?></th>
                <th><?=$visitas['nome'];?></th>
                <th><?=$visitas['sobrenome'];?></th>
                <th><?=$visitas['indentidade'];?></th>
                <th><?=$visitas['entrada'];?></th>
                <th><?=$visitas['saida'];?></th>

                <?php if($visitas['saida']==NULL):?>
                        <th><a href="./Registros/setSaida.php?id=<?=$visitas['id'];?>">Registrar saida</a></th>
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>

        </table>
    </section>

    <section class="historico_apartamento">
        <h2>Historico de visitas de um apartamento</h2>
        <?php if(filter_input(INPUT_GET,'id_hist') == NULL):?>
        <ul >
            <?php foreach($apartamentos as $ap): ?>
                <li><a href="./iindex.php?id_hist=<?=$ap['id'];?>&&ap=<?=$ap['apartamento'];?>"><?=$ap['apartamento'];?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php else: $historico= $visitaDao->historico((int)filter_input(INPUT_GET,'id_hist'));?>
    
            
        <table border="1">
            <H3><?php echo "Apartamento: ".filter_input(INPUT_GET,'ap')?></H3>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Indentidade</th>
                <th>Entrada</th>
                <th>Saida</th>
            </tr>

            <?php foreach($historico as $visitas): ?>

            <tr>
                
                <th><?=$visitas['nome'];?></th>
                <th><?=$visitas['sobrenome'];?></th>
                <th><?=$visitas['indentidade'];?></th>
                <th><?=$visitas['entrada'];?></th>
                <th><?=$visitas['saida'];?></th>
        <?php endforeach; ?>
        <a href="./iindex.php"><h4>Voltar</h4></a>
        <?php endif; ?>
        
    </section>
</body>
</html>
