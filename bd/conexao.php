<?php 
/*********************************************************************
*   Objetivo: Arquivo para realizar a conexão com o BD Mysql
*   Data: 20/10/2021
*   Autor: Marcel
**********************************************************************/

//Estabelece a conexão com o BD Mysql
function conexaoMysql()
{
    //Local do banco (pode ser o IP)
    $host = (string) "localhost";
    //Usuário para autenticação do BD
    $user = (string) "root";
    //Senha para autenticação do BD
    $password = (string) "Kk@98083351";
    //Database para utilizar o BD
    $database = (string) "dbpio";
    
    $conexao = (string) null;
    
    /*
        Bibliiotecas para estabelecer a conexão com o BD pelo PHP
            mysql_connect() - é a mais antiga (desatualizada)
            mysqli_connect() - é uma biblioteca mais atual (segurança, perfomance)
            PDO() - é a biblioteca para POO
    */
    
    //Abre a conexão com o BD através da biblioteca mysqli_connect()
    if($conexao = mysqli_connect($host, $user, $password, $database))
        //retorna a conexão se ela for estabelecida com sucesso
        return $conexao;
    else
        return false;
    
}

?>