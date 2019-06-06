<?php

header('Content-type:application/json;charset=utf-8');

require '../Anuncio/Anuncio.php';
include '../BancoDeDados/PDO.php';

//CONSTANTES
define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

if(isset($_FILES['file'])){

	$ModeloAnuncio = $_POST['ModeloAnuncio'];
  $nomeAnuncio = $_POST['Nome'];
  $caminho = $_POST['Caminho'];
  $tipoDirec = $_POST['TipoDirecionamento'];
	$id = $_POST['id'];

  //OPÇÕES DO ARQUIVO
	$nome = $_FILES['file']['name'];
	$tamanho = $_FILES['file']['size'];
	$file = $_FILES['file']['tmp_name'];
	$tipoArquivo = $_FILES['file']['type'];


if(!preg_match('/^image\/(pjpeg|jpeg|png|jpg|gif|bmp)$/', $tipoArquivo)){

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
		$stmt = $pdo->prepare('INSERT INTO Anuncio(NomeAnuncio,ModeloAnuncio,TipoArquivo,DirecAnuncio,CaminhoAnuncio,Anuncio,Id_Anunc) VALUES (?,?,?,?,?,?,?)');

		// Definindo parâmetros
		$stmt->bindValue(1, $nomeAnuncio, PDO::PARAM_STR);
		$stmt->bindValue(2, $ModeloAnuncio, PDO::PARAM_STR);
    $stmt->bindValue(3, $tipoArquivo, PDO::PARAM_STR);
		$stmt->bindValue(4, $tipoDirec, PDO::PARAM_STR);
    $stmt->bindValue(5, $caminho, PDO::PARAM_STR);
		$stmt->bindValue(6, $bin, PDO::PARAM_LOB);
		$stmt->bindValue(7, $id, PDO::PARAM_INT);

   		if($stmt->execute()){
   			echo json_encode(array('status' => true, 'valor' => 'ANUNCIO ADICIONADO COM SUCESSO!!'));
   		}else{
   			echo json_encode(array('status' => false, 'valor' => 'ERRO AO ADICIONAR ANUNCIO!'));
   		}

   		
  }
}

}

