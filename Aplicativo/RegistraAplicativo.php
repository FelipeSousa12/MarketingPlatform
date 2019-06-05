<?php

header('Content-Type: application/json; charset=utf-8');
require '../Aplicativo/Aplicativo.php';


//PEGANDO VALORES DOS CAMPOS
if (isset($_POST["Nome"])){

    $nomeApp = $_POST["Nome"];
    $idApp = $_POST["Identificador"];
    $CategoriaApp = $_POST["Categoria"];
    $id_Desen = $_POST["idDesen"];


    $app = new Aplicativo();

    $app->setValor('NOMEAPP',$nomeApp);
    $app->setValor('CATEGORIAAPP',$CategoriaApp);
    $app->setValor('IDENTIFICADORAPP',$idApp);
    $app->setValor('ID_DESEN',$id_Desen);

    if($app->inserir($app)){
    	echo json_encode(array('status' => true,'msg' => 'APLICATIVO CADASTRADO COM SUCESSO!'));
    }else{
    	echo json_encode(array('status' => false,'msg' => 'ERRO AO CADASTRAR!'));
    }
}


?>