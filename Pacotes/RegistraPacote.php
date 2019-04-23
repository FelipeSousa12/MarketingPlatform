<?php
include '../Pacotes/Pacotes.php';
date_default_timezone_set('America/Sao_Paulo');

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["nomeCombo"])){

    $nome = addslashes($metodo["nomeCombo"]);
    $valor = addslashes($metodo["precoCombo"]);
    $qtd = addslashes($metodo["qtdPontosCombo"]);
    $id_anunc = addslashes($metodo["id_anunciante"]);

    $dataAtual = date('Y-m-d');

    $pacote = new Pacotes();

    $pacote->setValor("NOMEPACOTE", $nome);
    $pacote->setValor("VALORPACOTE", $valor);
    $pacote->setValor("QTDPONTOS", $qtd);
    $pacote->setValor("DATACONTRATACAO", $dataAtual);
    $pacote->setValor("ID_ANUNC", $id_anunc);

    if($pacote->inserir($pacote)){

       echo json_encode(array('status' => true)); 

     }else{

       echo json_encode(array('status' => false)); 

    }  
}


?>