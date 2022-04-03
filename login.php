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
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />

    <title>TechDiário - Registrar</title>
  </head>
  <body>
    <!--Inicio da Area Cabeçalho-->
    <header id="area-cabecalho">
      <div id="area-logo">
        <img href="Logo.png" width="540" />
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

    <!--Inicio da area de postagem-->
    <main id="area-principal">
      <div id="area-postagens">
        <!--Abertura de postagem-->
        <article class="postagem">
          <section>
            <h2>Login</h2>
            <!-- Início do formulário -->
            <form name="frmLogin" method="post" action="autenticar.php">
              <!-- Campo de email com-->
              <div class="campo">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="txtLogin" id="email" required />
              </div>

              <div class="campo">
                <label for="senha"><strong>Senha</strong></label>
                <input type="password" name="txtSenha" id="senha" required />
              </div>

              <!-- Botão para enviar o formulário -->
              <button type="submit" name="btnLogar" class="btn btn-primary">Logar</button>
             <a href="registrar.php">Não tem cadastro ainda? Clique aqui</a>
            </form>
            </form>
            <!--Fechamento do formulário-->
          </section>
        </article>
        <!--Fechamento de postagem-->
      </div>
      <!--Começo da area lateral-->
      <aside id="area-lateral">
        <section class="conteudo-lateral">
          <h3>Postagens recentes</h3>
          <section class="postagem-lateral">
            <p>
              Lembra daquele papo de que a Nintendo estava voltando ao Brasil?
              Pois bem, devagar e sempre, as coisas estão acontecendo: em
              setembro, a empresa anunciou o lançamento oficial do Nintendo
              Switch por aqui...
            </p>
            <a href="noticias.html">Leia mais</a>
            <hr />
            <p>
              O jogo mobile de Crash Bandicoot, que foi lançado recentemente na
              Malásia e em outros países.
            </p>
            <a href="noticias.html">Leia mais</a>
          </section>
        </section>
        <section class="postagem-lateral">
          <h3>Criadores</h3>
          <section>
            <a href="">Bruno</a><br />
            <a href="">Jefferson</a><br />
            <a href="">Jaques</a><br />
            <a href="">Luiz</a><br />
            <a href="">Edson</a><br />
          </section>
        </section>
      </aside>
      <!--Fim da area lateral-->
    </main>
    <!--Fim da area de postagem-->
    <!--Começo do rodapé-->
    <footer id="rodapé">Todos os direitos reservados a TechDiário</footer>
    <!--Fim do rodapé-->
    <!-- Popper e Bootstrap JS Separados-->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
      integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
