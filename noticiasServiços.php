<?php 
    
    // import do arquivo para conectar no BD
    require_once('bd/conexao.php');

    //Abre a conexão com o BD e guarda na variavel local $conexao    
    $conexao = conexaoMysql();

    //Declaração de Variaveis
    $modo = (string) null;
    $id = (int) 0;
    $noticia = (string) null;
    $tipoNoticia = (string) null;
    $nomeEditor = (string) null;
    $nomeFoto = (string) null;
   

    //Essa variavel será utilizada no action do form, para diferenciar as ações de
    //inserir um novo registro ou atualizar um registro existente
    $action = (string) "bd/inserirCategoria.php";

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
                $nomeFoto = $arrayRegistro['foto'];

                //Altera o arquivo que será chamado pelo form, pois precisamos editar os dados
                $action = "bd/editarCategoria.php?id=".$id;
                

            }
        }
    }

?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro de noticias </title>
        <link rel="stylesheet" type="text/css" href="css/estiloUser.css">
    </head>
    <body>
        </div>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de noticias </h1>
            </div>
            <div id="cadastroInformacoes">
                               
                <form action="<?=$action?>" name="frmCadastro" method="post" enctype="multipart/form-data">
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Noticia: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNoticia" value="<?=$noticia?>" placeholder="Digite o titulo da noticia" maxlength="100">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Tipo de Noticia: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtTipoNoticia" value="<?=$tipoNoticia?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome do Editor: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNomeEditor" value="<?=$nomeEditor?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Foto: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="file" name="fleFoto" accept="image/jpeg, image/png, image/jpg">
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Lista de Noticias</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Noticia </td>
                    <td class="tblColunas destaque"> Tipo de Noticia </td>
                    <td class="tblColunas destaque"> Nome do Editor </td>
                    <td class="tblColunas destaque"> Foto </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
               <?php 
                    //Script para listar os dados do BD
                    $sql = "select * from tblnoticia order by idnoticia desc";

                    //Executa no BD o script e guarda o retorno na variavel $select
                    $select = mysqli_query($conexao, $sql);

                    //converte o resultado do BD em um array de dados ($arrayUsuarios)
                    while ($arrayUsuarios = mysqli_fetch_assoc($select))
                    {
                    ?>
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$arrayUsuarios['noticia']?></td>
                            <td class="tblColunas registros"><?=$arrayUsuarios['tipoNoticia']?></td>
                            <td class="tblColunas registros"><?=$arrayUsuarios['nomeEditor']?></td>
                            <td class="tblColunas registros">
                                <img src="arquivos/<?=$arrayUsuarios['foto']?>" class='foto'>
                            </td>
                            <td class="tblColunas registros">
                                <a href="noticiasServiços.php?modo=editar&id=<?=$arrayUsuarios['idnoticia']?>">
                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>
                                <a onclick="return confirm('Deseja realmente excluir?');" href="bd/excluirCategoria.php?modo=excluir&id=<?=$arrayUsuarios['idnoticia']?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                            </td>
                        </tr>
                    <?php 
                    }
                    ?>            
            </table>
        </div>
    </body>
</html>