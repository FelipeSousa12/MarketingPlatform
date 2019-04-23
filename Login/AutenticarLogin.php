<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../tmp'));
session_start();

require '../Util/daoGenerico.php';
require '../Anunciante/Anunciante.php';

$dao = new daoGenerico();

$requisicao = $_POST;

if(isset($requisicao['txtEmail']) && isset($requisicao['txtSenha'])){
	
	$email = addslashes($requisicao['txtEmail']);
	$senha = md5($requisicao['txtSenha']);

	$sqlAnunc = "SELECT * FROM ANUNCIANTE WHERE Email = '$email' AND Senha = '$senha'";
        
	$query_anunc = $dao->executaSQL($sqlAnunc);

	//CASO SEJA ANUNCIANTE
	if(mysqli_num_rows($query_anunc) > 0){

		$dados_anunc = mysqli_fetch_array($query_anunc);

		$_SESSION['SESSION_ANUNC_ID'] = $dados_anunc['IdAnunciante'];
	    $_SESSION['SESSION_ANUNC_RAZAO'] = $dados_anunc['RazaoSocial'];
		$_SESSION['SESSION_ANUNC_EMAIL'] = $dados_anunc['Email'];
		$_SESSION['SESSION_ANUNC_SENHA'] = $dados_anunc['Senha'];
						
		echo json_encode(array('status' => true,'tipoUser' => 'Anunciante'));	
			 

   }else{

	    //CASO SEJA DESENVOLVEDOR
   	    $sqlDes = "SELECT * FROM DESENVOLVEDOR WHERE Email = '$email' AND Senha = '$senha'";

		$query = $dao->executaSQL($sqlDes);

		if(mysqli_num_rows($query) > 0){

		   $dados = mysqli_fetch_array($query);

		   $_SESSION['SESSION_DESENV_ID'] = $dados['IdDesenvolvedor'];
		   $_SESSION['SESSION_DESENV_DESENVOLVEDOR'] = $dados['DescricaoNome'];
		   $_SESSION['SESSION_DESENV_EMAIL'] = $dados['Email'];
		   $_SESSION['SESSION_DESENV_SENHA'] = $dados['Senha'];
			
		   echo json_encode(array('status' => true,'tipoUser' => 'Desenvolvedor'));
		
		}else{

			echo json_encode(array('status' => false));

		}	
	}
}


function verificarBonus($id){

	$sql = "SELECT QtdVisualizacoes AS Quantidade FROM BONUS WHERE Id_Anunc = '$id'";
    
    $dao = new daoGenerico();

	$query = $dao->executaSQL($sql);

	if(mysqli_num_rows($query) > 0){

		$result = mysqli_fetch_array($query);

		if($result['Quantidade'] < 20){
			return true;
		}else{
		    return false;
		}	

	}else{
		return null;
	}

}


?>