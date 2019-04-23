<?php
include '../Anunciante/Anunciante.php';

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["txtRazao"])){
    $razao = addslashes($metodo["txtRazao"]);
    $cnpj = addslashes($metodo["txtCnpj"]);
    $telefone = addslashes($metodo["txtTelefone"]);
    $email = addslashes($metodo["txtEmail"]);
    $senha = md5($metodo["txtSenha"]);

        //SETANDO OS VALORES NO OBJETO
        $anunc = new Anunciante();

        $anunc->setValor("RAZAOSOCIAL", $razao);
        $anunc->setValor("CNPJ", $cnpj);
        $anunc->setValor("EMAIL", $email);
        $anunc->setValor("SENHA", $senha);
        $anunc->setValor("TELEFONE", $telefone);

     if($anunc->inserir($anunc)){
           echo json_encode(array('status' => true)); 
        }else{
           echo json_encode(array('status' => false)); 
        } 
}


?>
