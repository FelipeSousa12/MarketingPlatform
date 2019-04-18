<?php

require '../Util/Email.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$msg = $_POST['mensagem'];

$mail = new Email();

$mail->Destino = $email;
$mail->NomeDestinatario = $nome;
$mail->TipoEmail = 'gmail';
$mail->Assunto = $assunto;
$mail->Mensagem = $msg;

if($mail->Enviar()){
	echo json_encode(array('status' => true));
}else{
	echo json_encode(array('status' => false));;
}



?>