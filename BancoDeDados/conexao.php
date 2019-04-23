<?php

//CLASSE CONEXAO BANCO DE DADOS MANUAL
class Conexao{

	private $servidor = "localhost";
	private $usuario = "root";
	private $senha = "";
	private $dbname = "pmd";


	function ConectarBanco(){

	//CRIANDO CONEXAO
	$con = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->dbname);                

	 //RETORNANDO CONEXÃO
     return $con;	

	}

}
	
?>
