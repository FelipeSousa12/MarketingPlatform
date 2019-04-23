<?php
include '../Bonus/Bonus.php';

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["campoId"])){

    $id = addslashes($metodo["campoId"]);
    $status = 'Ativo';
    $qtd = '0';

        //SETANDO OS VALORES NO OBJETO
        $bonus = new Bonus();

        $bonus->setValor("STATUSBONUS", $status);
        $bonus->setValor("QTDVISUALIZACOES", $qtd);
        $bonus->setValor("ID_ANUNC",$id);

     if($bonus->inserir($bonus)){
           echo json_encode(array('status' => true)); 
        }else{
           echo json_encode(array('status' => false)); 
        } 
}


?>