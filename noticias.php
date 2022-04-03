<?php
// import do arquivo para conectar no BD
    require_once('bd/conexao.php');

    //Testa se a conexão com o banco foi feita
    //var_dump(conexaoMysql());

    //Abre a conexão com o BD e guarda na variavel local $conexao
    $conexao = conexaoMysql();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/reset.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    

    <!--CSS do desenvolvedor-->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
    <title>TechDiário - Noticias</title>
</head>
<body>
    <!--Inicio da Area Cabeçalho-->
    <header id="area-cabecalho">
        <div id="area-logo">
            <h1>TechDiário</h1>
        </div>
        <nav id="area-menu">
            <a href="index.php">Home</a>
            <a href="noticias.php">Notícias</a>
            <a href="sobre.php"> Sobre</a>
            <a href="login.php">Login</a>
        </nav>
    </header>
    <!--Fim da Area Cabeçalho-->
    <!--Inicio container de postagem-->
    <div class="container">
    <?php 
        //Script para listar os dados do BD
        $sql = "select * from tblnoticia order by idnoticia desc";

        //Executa no BD o script e guarda o retorno na variavel $select
        $select = mysqli_query($conexao, $sql);

        //converte o resultado do BD em um array de dados ($arrayUsuarios)
        while ($arrayUsuarios = mysqli_fetch_assoc($select))
            {
        ?>
    
    <!--Inicio de postagem-->    
        <div class="card">
            <div class="card-header">
            <img src="arquivos/<?=$arrayUsuarios['foto']?>">
            </div>
            <div class="card-body">
                <span class="tag tag-teal"><?=$arrayUsuarios['tipoNoticia']?></span>
                <h4><?=$arrayUsuarios['noticia']?></h4>
                    <div class="user">
                        <div class="user-info">
                            <h5><?=$arrayUsuarios['nomeEditor']?></h5>
                            <small>Postado há 2 dias</small>
                        </div>
                    </div>
            </div>
        </div>   
    <!--Fechamento de postagem-->
    <!--FIM container de postagem-->
        <?php 
            }
        ?> 
    </div> 
    <!--Começo do rodapé-->
    <footer id="rodapé">
        Todos os direitos reservados a TechDiário
    </footer>
    <!--Fim do rodapé-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>