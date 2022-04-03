<?php
/*******************************************************
 * Objetivo: Arquivo para fazer upload de imagens 
 * Data: 23/11/2021
 * Autor: Bruno Rodrigues Oliveira
 *******************************************************/

//Função para realizar upload de um arquivo
function uploadArquivo ($arrayFile)
{
    //Declaração de váriaveis
    $arquivoFoto = (string) null;
    $tamanhoFoto = (int) 0;
    $tamanhoFotoKB = (int) 0;
    $extensaoFoto = (string) null;
    $tipoFoto = (string) null;
    $nomeFoto = (string) null;
    $nomeFotoCryt = (string) null;
    $caminhoFotoTemp = (string) null;

    //Variaveis de ambiente para o uploado de arquivo
    define ('TAMANHO_MAXIMO',  '2048');
    define ('NOME_DIRETORIO',  '../arquivos/');
    $tipos_permitidos = array ("image/png", "image/jpg", "image/jpeg"); 

    //Recebe o objeto array da foto
    $arquivoFoto = $arrayFile;
    
    //Valida se o arquivo que está chegando existe
    if($arquivoFoto['size'] > 0 && $arquivoFoto['type'] !="")
    {
        //Recebe o tamanho original da foto em bytes 
        $tamanhoFoto = $arquivoFoto['size'];
        
        //Converte o tamanho da foto em KB 
        $tamanhoFotoKB = $tamanhoFoto/1024;

        //Recebe o tipo de arquivo da foto (image/png ou imagem/jpg, etc...)
        $tipoFoto = $arquivoFoto['type'];

        //Validação para permitir o upload apenas de arquivos menores que o estabelecido
        if($tamanhoFotoKB <= TAMANHO_MAXIMO)
        {
            //Validação para verificar se o tipo de arquivo que está chegando é permitido
            if(in_array($tipoFoto, $tipos_permitidos))
            {
                //Separando o nome do arquivo e a extensão do arquivo
                $nomeFoto = pathinfo($arquivoFoto ['name'], PATHINFO_FILENAME);
                $extensaoFoto = pathinfo($arquivoFoto ['name'], PATHINFO_EXTENSION);

                //Converte o nome do arquivo original em uma sequencia de letras e números 
                //juntando com um id único  e a hora, minuto, segundo que a foto está sendo 
                //enviada para o servidor
                $nomeFotoCryt = md5($nomeFoto . uniqid(time()));
                
                //Junta novamente a extensão original do arquivo 
                $nomeFotoCryt = $nomeFotoCryt . "." . $extensaoFoto;

                //Recebe o caminho e a foto (pasta temporaria) que foi disponibilizado pelo apache
                $caminhoFotoTemp = $arquivoFoto["tmp_name"];

                if(move_uploaded_file($caminhoFotoTemp, NOME_DIRETORIO.$nomeFotoCryt))
                    return $nomeFotoCryt;
                else
                    return false;
            }else 
                echo("Tipo de arquivo inválido para subir no servidor!");

        }else
            echo("Tamanho de arquivo inválido, o permitido é no máximo: " . TAMANHO_MAXIMO . "Kb");

    }

}




?>