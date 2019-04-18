<?php

require_once '../Util/PHPMailer/src/PHPMailer.php';
require_once '../Util/PHPMailer/src/SMTP.php';

class Email{

	
	public $Destino = '';
	public $NomeDestinatario = '';
	public $TipoEmail = null;
	public $Assunto = '';
	public $Mensagem = '';


	public function Enviar(){

		$mailer = new PHPMailer();

		//ENDEREÇO DO SERVIDOR DE ACORDO COM O EMAIL *GMAIL*,*OUTLOOK*,*HOTMAIL*
		if($this->TipoEmail == 'hotmail' || $this->TipoEmail == 'outlook'){
			$mailer->Host = 'smtp.live.com'; 
		}else{
			$mailer->Host = 'smtp.gmail.com';
		}


		$mailer->CharSet = 'utf8'; //PADRÃO DE CARACTERES
		$mailer->IsSMTP();
		$mailer->IsHTML(true);
		$mailer->SMTPAuth = true;
		$mailer->Username = 'felsg12@gmail.com'; //ACESSO DE USUARIO DO EMAIL DE ENVIO
		$mailer->Password = 'fel120lipao'; //ACESSO DE SENHA DO EMAIL DE ENVIO
		$mailer->SMTPSecure = 'tls';
		$mailer->Port = 587; //PORTA DO SERVIDOR
		$mailer->setFrom('felsg12@gmail.com','PMD - Plataforma de Marketing'); // TITULO DO EMAIL 'DE'
		$mailer->AddAddress($this->Destino,$this->NomeDestinatario); //DESTINATARIO DO EMAIL 'PARA'
		$mailer->Subject = $this->Assunto; //ASSUNTO DO EMAIL
		$mailer->Body = $this->Mensagem; //CORPO DO EMAIL A SER ESCRITO

		//$mailer->addAttachment('../Imagens/error.png'); //ENVIO DE IMAGEM

		if($mailer->Send()){
			return true;
		}else{
			return false;
		}
    }

}

?>