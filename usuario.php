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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="css/reset.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <!--CSS do desenvolvedor-->
    <!--<link rel="stylesheet" type="text/css" href="css/estilo.css" />-->
    <link rel="stylesheet" type="text/css" href="css/estiloUser2.css"/>
</head>
<body>
    <main class="gradient">   
        <nav class="text">
            <a href="noticiasServiços.php">Cadastrar Noticia</a>
        </nav>
    </main>
</body>
</html>