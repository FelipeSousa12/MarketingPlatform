<?php
include '../Anunciante/Anunciante.php';

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["txtRazao"])){
    
    $id = $metodo["id"];
    
    $razao = addslashes($metodo["razao"]);
    $cnpj = addslashes($metodo["cnpj"]);
    $telefone = addslashes($metodo["telefone"]);
    $email = addslashes($metodo["email"]);
    $senha = md5($metodo["senha"]);

        //SETANDO OS VALORES NO OBJETO
        $anunc = new Anunciante();

        $anunc->valorpk = $id;

        $anunc->setValor("RAZAOSOCIAL", $razao);
        $anunc->setValor("CNPJ", $cnpj);
        $anunc->setValor("EMAIL", $email);
        $anunc->setValor("SENHA", $senha);
        $anunc->setValor("TELEFONE", $telefone);

     if($anunc->atualizar($anunc)){
           echo json_encode(array('status' => true, 'msg' => 'ANUNCIANTE ATUALIZADO COM SUCESSO')); 
        }else{
           echo json_encode(array('status' => false,'msg' => 'ERRO AO ATUALIZAR ANUNCIANTE')); 
        } 
}


?>
