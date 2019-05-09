<?php

header('Content-type:application/json;charset=utf-8');

require '../Anuncio/Anuncio.php';
include '../BancoDeDados/PDO.php';

//CONSTANTES
define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

if(isset($_FILES['file'])){

	$ModeloAnuncio = $_POST['ModeloAnuncio'];
	$id = $_POST['id'];

	$nome = $_FILES['file']['name'];
	$tamanho = $_FILES['file']['size'];
	$file = $_FILES['file']['tmp_name'];
	$tipoAnuncio = $_FILES['file']['type'];


if(!preg_match('/^image\/(pjpeg|jpeg|png|jpg|gif|bmp)$/', $tipoAnuncio)){

    echo json_encode(array('status' => false, 'valor' => 'Não é uma Imagem Válida!'));
    exit;

}else{

   if ($tamanho > TAMANHO_MAXIMO){

    echo json_encode(array('status' => false, 'valor' => 'Imagem Muito Grande!'));
    exit;
   
   }else{

   	    $bin = file_get_contents($file);

   	    $pdo = ConexaoPDO::conectar();

   		// Preparando comando
		$stmt = $pdo->prepare('INSERT INTO Anuncio (NomeAnuncio,ModeloAnuncio,TipoAnuncio,Anuncio,Id_Anunc) VALUES (:nome,:modelo,:tipo,:anunc,:id)');

		// Definindo parâmetros
		$stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
		$stmt->bindParam(':modelo', $ModeloAnuncio, PDO::PARAM_STR);
		$stmt->bindParam(':tipo', $tipoAnuncio, PDO::PARAM_STR);
		$stmt->bindParam(':anunc', $bin, PDO::PARAM_LOB);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

   		if($stmt->execute()){
   			echo json_encode(array('status' => true, 'valor' => 'ANUNCIO ADICIONADO COM SUCESSO!!'));
   		}else{
   			echo json_encode(array('status' => false, 'valor' => 'ERRO AO ADICIONAR ANUNCIO!'));
   		}

   		
  }
}

}

