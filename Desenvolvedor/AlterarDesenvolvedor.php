<?php
include '../Desenvolvedor/Desenvolvedor.php';

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["id"])) {

    $id = $metodo['id'];

    $DescricaoNome = addslashes($metodo["razao"]);
    $numero = addslashes($metodo["numero"]);
    $Documento = addslashes($metodo["radioDocumento"]);
    $Email = addslashes($metodo["email"]);
    $Senha = md5($metodo["senha"]);

    $des = new Desenvolvedor();

    $des->valorpk = $id;

    $des->setValor("DESCRICAONOME",$DescricaoNome);
    $des->setValor("NUMERO",$numero);
    $des->setValor("DOCUMENTO",$Documento);
    $des->setValor("EMAIL",$Email);
    $des->setValor("SENHA",$Senha);

   if($des->atualizar($des)){
    echo json_encode(array('status' => true,'msg' => 'DADOS ATUALIZADOS COM SUCESSO!!')); 
  }else{
    echo json_encode(array('status' => false,'msg' => 'ERRO AO ATUALIZAR DADOS!!'));
  }
    
   
}


?>