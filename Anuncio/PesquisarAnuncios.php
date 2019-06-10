<?php
header('Content-Type: aplication/json; charset=utf-8');

require '../BancoDeDados/PDO.php';

if(isset($_POST['IdAnunc'])){

$id = $_POST['IdAnunc'];

$arrayDados = array();

$pdo = ConexaoPDO::conectar();
// Preparando comando
$stmt = $pdo->prepare('SELECT IDANUNCIO,NOMEANUNCIO,TIPOARQUIVO,ANUNCIO FROM ANUNCIO WHERE ID_ANUNC = ?');

$stmt->bindValue(1,$id);

$stmt->execute();

if($stmt->rowCount() > 0){

   $dados = $stmt->fetchAll(PDO::FETCH_OBJ);

   foreach ($dados as $valor) {
   	  array_push($arrayDados, array(
        'Nome' => $valor->NOMEANUNCIO,
        'Id' => $valor->IDANUNCIO, 
        'Anuncio' => '<img src="data:'.$valor->TIPOARQUIVO.';base64(data:'.$valor->TIPOARQUIVO.';base64,'.base64_encode($valor->ANUNCIO) .'" style="width: 100px; heigth: 120px;"/>')
        );
   }
}

echo json_encode($arrayDados);

}