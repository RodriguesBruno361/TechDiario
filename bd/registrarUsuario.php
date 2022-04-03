<?php 

    //import o arquivo de conexão com o BD
    require_once('conexao.php');

    //import do arquivo de configuração do sistema
    require_once('../modulo/config.php');

    //Declaração das variaveis
    $nome = (string) null;
    $sobrenome = (string) null;
    $senha = (string) null;
    $email = (string) null;
    

    //Valida se o botão foi clicado
    if(isset($_POST['btnEnviar']))
    {
        //Recebe dados do formulário
        $nome = $_POST['txtNome'];
        $sobrenome = $_POST['txtSobrenome'];
        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];
       

        //echo($dataAtual);
        //die; //força a parada de execução do apache

        //Fazer tratamentos de erro conforme a necessidade


        //Inserir dados no BD
        //SQL (structured query language)
        $sql = "insert into tblusuario 
                        (nome, sobrenome, senha, email)
                values ('". $nome ."', '". $sobrenome ."', 
                        '". $senha ."', '". $email ."')";

        //Abre a conexão com o BD Mysql
        $conexao = conexaoMysql();

        //Executa no BD o Insert e valida se deu certo ou não
        if (mysqli_query($conexao, $sql))
            echo(REGISTRO_SALVO);
        else
            echo(ERRO_BD);




    }

?>