<?php 
    
    // import do arquivo para conectar no BD
    require_once('bd/conexao.php');
    //Abre a conexão com o BD e guarda na variavel local $conexao    
    $conexao = conexaoMysql();

    //Declaração de Variaveis
    $modo = (string) null;
    $id = (int) 0;
    $nome = (string) null;
    $sobrenome = (string) null;
    $senha = (string) null;
    $email = (string) null;
   

    //Essa variavel será utilizada no action do form, para diferenciar as ações de
    //inserir um novo registro ou atualizar um registro existente
    $action = (string) "bd/registrarUsuario.php";

    //Valida se existe a variavel modo e a variavel id na url do 
    //navegador, se existir é pq foi clicado no botão editar
    if(isset($_GET['modo']) && isset($_GET['id']))
    {
        //Recebe o conteudo da variavel modo (em MAIUSCULO)
        $modo = strtoupper($_GET['modo']);
        
        //Recebe o conteudo da variavel id
        $id = $_GET['id'];
        
        //Valida se a variavel modo tem o valor editar
        if($modo == 'EDITAR')
        {
            //Script para buscar no BD
            $sql = "select * from tblnoticia where idnoticia=".$id;
            
            //Executa o script no BD
            $select = mysqli_query($conexao, $sql);

            //Valida se existe algum registro no BD e converte 
            //o resultado em um array
            if($arrayRegistro = mysqli_fetch_assoc($select))
            {
                //Recebe os dados do BD e guarda em variaveis locais
                $noticia = $arrayRegistro['noticia'];
                $tipoNoticia = $arrayRegistro['tipoNoticia'];
                $nomeEditor = $arrayRegistro['nomeEditor'];

                //Altera o arquivo que será chamado pelo form, pois precisamos editar os dados
                $action = "bd/editarUsuario.php?id=".$id;
                

            }
        }
    }

?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Registrar Usuario </title>
        <link rel="stylesheet" type="text/css" href="css/formulario.css">
    </head>
    <body>
        </div>
        <div id="container"> 
            <div id="titulo"> 
                <h1> Registrar Usuário </h1>
            </div>
            <div class="grupo">
                               
                <form action="<?=$action?>" name="frmCadastro" method="post" >
                   
                    <div class="campo">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                    <div class="campo">
                        <div class="cadastroInformacoesPessoais">
                            <label> Sobrenome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtSobrenome" value="<?=$sobrenome?>">
                        </div>
                    </div>
                    <div class="campo">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtEmail" value="<?=$email?>">
                        </div>
                    </div>
                    <div class="campo">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtSenha" value="<?=$senha?>">
                        </div>
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                    </div>                   
                </form>
            </div>
  </div>
    </body>
</html>
