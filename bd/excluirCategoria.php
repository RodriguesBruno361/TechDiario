<?php 
/*************************************************************************
 *  Objetivo: Arquivo responsavel para excluir usuários
 *  Data: 03/11/2021
 *  Autor: Marcel
 *************************************************************************/

  //import o arquivo de conexão com o BD
  require_once('conexao.php');

  //import do arquivo de configuração do sistema
  require_once('../modulo/config.php');
  
  //Declaração de variáveis 
  $modo = (string) null;
  $id = (int) 0;

  //Verifica se existe as variaveis modo e id no GET
  if(isset($_GET['modo']) && isset($_GET['id']))
  {
        //Recebe as variaveis encaminhadas no GET pela index
            //strtoupper() converte uma string em MAIUSCULO
            //strtolower() converte uma string em minusculo
        $modo = strtoupper($_GET['modo']);
        $id = $_GET['id'];

        //Validação para verificar se o conteudo da variavel modo é EXCLUIR
        if($modo == 'EXCLUIR')
        {
            //Script para deletar um registro
            $sql = "delete from tblnoticia where idnoticia = " . $id;
            
            //Abre a conexão com o BD
            $conexao = conexaoMysql();
            
            //Executa o script no BD e valida se teve sucesso ou deu erro
            if (mysqli_query($conexao, $sql))
                echo(REGISTRO_EXCLUIDO);
            else
                echo(ERRO_BD);  
        }        
  }
?>