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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <!-- Cadastrar visitante -->
        
        <section class="cadastro_visitante">
            <h2 class="titulo">Cadastrar visitante</h2>
            <form action="Registros/setVisitante.php" method="post">
                <div class="itens">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="itens">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome">
                </div>
                <div class="itens">
                    <label for="indentidade">Indentidade:</label>
                    <input type="text" name="indentidade" id="indentidade">
                </div>
                <div class="itens">
                    <label for="empresa">Empresa:</label>
                    <input type="text" name="empresa" id="empresa">
                </div>
                <div class="itens">
                    <div class="btn">
                        <input  type="submit" value="Cadastrar" id="submit_cadastro">
                    </div>
                </div> 
                <div class="itens">
                    <div class="msg"></div><!-- Menssagem erro JS -->
                </div>    
            </form>
        </section>
        
        <!-- Registrar entrada -->
        
        <section class="registro_entrada">
            <h2 class="titulo">Registrar entrada</h2>
            <form action="Registros/setVisita.php" method="post">
                <div class="itens">
                    <label for="indentidade">Indentidade:</label>
                    <input type="text" name="indentidade" id="indentidade_entrada">
                    <select class="select" name="apartamento" id="apartamento">
                        <?php foreach($apartamentos as $ap): ?>
                            <option class="opt" value="<?=$ap['id']?>"><?=$ap['apartamento']?></option> 
                        <?php endforeach; ?>
                    </select>
                    <div class="btn">
                        <input type="submit" value="Registrar" id="submit_entrada">
                    </div>
                </div>
                <div class="msg_entrada"></div><!-- Menssagem erro JS -->
            </form>
        </section>
    
            <!-- Visitas do dia ou ativas -->
    
        <section class="registro_saida">
            <h2 class="titulo">Visitas do dia ou ativas</h2>
            <div class="rolagem2">
                <table class="tabela_saida" >
                    <tr class ="titulos">
                        <th>Apartamento</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Indentidade</th>
                        <th>Entrada</th>
                        <th>Saida</th>
                    </tr>
                    <?php foreach($op_visitas as $visitas): ?>
                        <tr class="conteudo_saida">
                            <th><?=$visitas['apartamento'];?></th>
                            <th><?=$visitas['nome'];?></th>
                            <th><?=$visitas['sobrenome'];?></th>
                            <th><?=$visitas['indentidade'];?></th>
                            <th><?=$visitas['entrada'];?></th>
                            <?php if($visitas['saida']==NULL):?>
                                <th><a href="./Registros/setSaida.php?id=<?=$visitas['id'];?>">Registrar saida</a></th>
                            <?php else:?>
                                <th><?=$visitas['saida'];?></th>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </section>
            
            <!-- Historico de visitas de um apartamento-->
            
        <section class="historico_apartamento">
            <h2 class="titulo">Historico de visitas de um apartamento</h2>
            <?php if(filter_input(INPUT_GET,'id_hist') == NULL):?>
                <ul>
                    <?php foreach($apartamentos as $ap): ?>
                        <li><a href="./iindex.php?id_hist=<?=$ap['id'];?>&&ap=<?=$ap['apartamento'];?>"><?=$ap['apartamento'];?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: $historico= $visitaDao->historico((int)filter_input(INPUT_GET,'id_hist'));?>
                <H3><?php echo "Apartamento: ".filter_input(INPUT_GET,'ap')?></H3>
                <div class="rolagem">
                    <table class ="tabela_historico">
                        <tr class="tabela_historico_titulo">
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
                </div>
            <?php endif; ?>                  
    </div>
    </section>
    <script src="script.js"></script>
</body>
</html>
            