<?php

require '../Util/daoGenerico.php';

if(isset($_POST['Ident'])){

$pontos = array();

$dao = new daoGenerico();

$id = $_POST['Ident'];

$sql = "SELECT * FROM PONTOSPUBLICIDADE WHERE ID_ANUNC = $id";

$result = $dao->executaSQL($sql);

if(mysqli_num_rows($result) > 0){
	while ($dados = mysqli_fetch_object($result)) {
		array_push($pontos,array('Endereco' => $dados->Endereco,'Latitude' => $dados->Latitude,'Longitude' => $dados->Longitude));
	}
}


echo json_encode($pontos);

}


?>