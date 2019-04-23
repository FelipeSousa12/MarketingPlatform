<?php
include '../Desenvolvedor/Desenvolvedor.php';

$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
if (isset($metodo["txtDescricaoNome"])) {
    $DescricaoNome = addslashes($metodo["txtDescricaoNome"]);
    $numero = addslashes($metodo["txtNumero"]);
    $Documento = addslashes($metodo["radioDocumento"]);
    $Email = addslashes($metodo["txtEmail"]);
    $Senha = md5($metodo["txtSenha"]);

    $des = new Desenvolvedor();

    $des->setValor("DESCRICAONOME",$DescricaoNome);
    $des->setValor("NUMERO",$numero);
    $des->setValor("DOCUMENTO",$Documento);
    $des->setValor("EMAIL",$Email);
    $des->setValor("SENHA",$Senha);

   if($des->inserir($des)){
    echo json_encode(array('status' => true)); 
  }else{
    echo json_encode(array('status' => false));
  }
    
   
}


?>