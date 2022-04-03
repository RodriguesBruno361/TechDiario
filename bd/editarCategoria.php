<?php 

    //import o arquivo de conexão com o BD
    require_once('conexao.php');

    //import do arquivo de configuração do sistema
    require_once('../modulo/config.php');

    //import do arquivo de configuração do sistema
    require_once('../modulo/upload.php');

    //Declaração das variaveis
    $noticia = (string) null;
    $tipoNoticia = (string) null;
    $nomeEditor = (string) null;
    $nomeFoto = (string) null;
    $id = (int) 0;

    //Valida se o botão foi clicado
    if(isset($_POST['btnEnviar']))
    {
        //Recebe o id do registro que deverá ser atualizado,
        //que foi encaminhado pelo action do form na index
        $id = $_GET['id'];

        //Recebe dados do formulário
        $noticia = $_POST['txtNoticia'];
        $tipoNoticia = $_POST['txtTipoNoticia'];
        $nomeEditor = $_POST['txtNomeEditor'];

         //Recebe o objeto array do file, que a index enviou atraves do metodo POST e enctype
         $file = $_FILES['fleFoto'];
        
         //Chama a função que faz o upload da foto e recebe o nome da foto
         //para inserir no banco de dados
         $nomeFoto = uploadArquivo($file);

        //echo($dataAtual);
        //die; //força a parada de execução do apache

        //Fazer tratamentos de erro conforme a necessidade


        //Inserir dados no BD
        //SQL (structured query language)
        $sql = "update tblnoticia set 
                    noticia =  '".$noticia."',
                    tipoNoticia = '".$tipoNoticia."',
                    nomeEditor = '".$nomeEditor."',
                    foto = '".$nomeFoto."' 
                where idnoticia =".$id;

        //Abre a conexão com o BD Mysql
        $conexao = conexaoMysql();

        //Executa no BD o Insert e valida se deu certo ou não
        if (mysqli_query($conexao, $sql))
            echo(REGISTRO_SALVO);
        else
            echo(ERRO_BD);




    }

?>