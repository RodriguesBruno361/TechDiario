<?php
/**************************************************************************************************
* Objetivo: Arquivo de configuração de variaveis e constantes do projeto
* Data: 03/11/2021
* Autor: Marcel
**************************************************************************************************/

//MENSAGENS DO SISTEMA
const REGISTRO_SALVO = "<script>
                            alert('Registro salvo com sucesso no Banco de Dados!');
                            window.location.href = '../index.php';
                        </script>";

const REGISTRO_EXCLUIDO = "<script>
                                alert('Registro excluído com sucesso do Banco de Dados!');
                                window.location.href = '../index.php';
                            </script>";

const ERRO_BD = "<script>
                    alert('Não foi possivel enviar os dados para o Banco de Dados!');
                    window.history.back();
                </script>";


?>