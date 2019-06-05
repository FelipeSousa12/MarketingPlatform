<?php
include '../TermoDesenvolvedor/TermoDesenvolvedor.php';
date_default_timezone_set('America/Sao_Paulo');

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["IdDesenvolvedor"])){

    $id_desen = addslashes($metodo["IdDesenvolvedor"]);
    $status = 'Contratado';
    $dataAtual = date('Y-m-d');
    //date("Y-m-d",strtotime(str_replace('/','-',$dataAtual)))

        //SETANDO OS VALORES NO OBJETO
        $termo = new TermoDesenvolvedor();

        $termo->setValor("STATUSTERMO", $status);
        $termo->setValor("DATATERMO", $dataAtual);
        $termo->setValor("ID_DESEN",$id_desen);

     if($termo->inserir($termo)){
           echo json_encode(array('status' => true)); 
        }else{
           echo json_encode(array('status' => false)); 
        } 
}


?>