<?php
header('Content-Type: aplication/json; charset=utf-8');

require '../BancoDeDados/PDO.php';

if(isset($_POST['Id'])){

$id = $_POST['Id'];

$arrayDados = array();

$pdo = ConexaoPDO::conectar();
// Preparando comando
$stmt = $pdo->prepare('SELECT Nome,Tipo,Plataforma FROM Aplicativo WHERE Id = ?');

$stmt->bindValue(1,$id);

$stmt->execute();

if($stmt->rowCount() > 0){

   $dados = $stmt->fetchAll(PDO::FETCH_OBJ);

   foreach ($dados as $valor) {
   	  array_push($arrayDados, array(
        'Nome' => $valor->Nome, 
        'Aplicativo' => '<img src="data:'.$valor->Tipo.';base64(data:'.$valor->Tipo.';base64,'.base64_encode($valor->Aplicativo) .'" style="width: 100px; heigth: 120px;"/>')
        );
   }
}

echo json_encode($arrayDados);

}