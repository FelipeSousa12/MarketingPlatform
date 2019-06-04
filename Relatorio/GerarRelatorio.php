<?php 
header('Content-Type: text/html; charset=utf-8');
require '../Util/fpdf/fpdf.php';


class myPDF extends FPDF{

function header(){
	$this->Image('../Imagens/logoPreta.png',10,6);
	$this->SetFont('Arial','B',14);
	$this->Cell(276,5,utf8_decode('RELATÓRIO'),0,0,'C');
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(276,5,utf8_decode('GERAL'),0,0,'C');
	$this->Ln(20);

}


function footer(){
$this->SetY(-15);
$this->SetFont('Arial','',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'L');

}

function headerTable(){
	$this->SetFont('Times','B',12);
	$this->Cell(25,10,'ID',1,0,'L');
	$this->Cell(150,10,utf8_decode('ENDEREÇO'),1,0,'L');
	$this->Cell(50,10,'LATITUDE',1,0,'C');
	$this->Cell(50,10,'LONGITUDE',1,0,'L');
	$this->Ln();

}


function VisuTabela(){
	$db = new PDO('mysql:host=localhost;dbname=pmd','root','');
	$this->SetFont('Times','',12);
	$stmt = $db->query('select * from  pontospublicidade');
	
	while($data = $stmt-> fetch(PDO::FETCH_OBJ)){
		$this->SetFont('Times','B',12);
		$this->Cell(25,10,$data->IdPontoPublicidade,1,0,'L');
		$this->Cell(150,10,$data->Endereco,1,0,'L');
		$this->Cell(50,10,$data->Latitude,1,0,'L');
		$this->Cell(50,10,$data->Longitude,1,0,'L');
		$this->Ln();
	}


	$this->SetFont('Times','B',12);
	$this->Ln();
	
	$this->SetFont('Arial','B',14);
	$this->Cell(276,5,utf8_decode('USUÁRIOS'),0,0,'C');
	
	$this->Ln();
	$this->Cell(25,10,'ID',1,0,'L');
	$this->Cell(90,10,utf8_decode('NOME'),1,0,'L');
	$this->Cell(50,10,'CNPJ',1,0,'C');
	$this->Cell(60,10,'TELEFONE',1,0,'L');
	$this->Cell(50,10,'TELEFONE',1,0,'L');
	$this->Ln();



	$stmtUser = $db->query('select * from  anunciante');
	
	while($data = $stmtUser-> fetch(PDO::FETCH_OBJ)){
		$this->SetFont('Times','B',12);
		$this->Cell(25,10,$data->IdAnunciante,1,0,'L');
		$this->Cell(90,10,$data->RazaoSocial,1,0,'L');
		$this->Cell(50,10,$data->Cnpj,1,0,'L');
		$this->Cell(60,10,$data->Telefone,1,0,'L');
		$this->Cell(50,10,$data->Email,1,0,'L');
		$this->Ln();
	}




	
}

}













class myPDFuser extends FPDF{

function header(){
	$this->Image('../Imagens/logoPMD.png',10,6);
	$this->SetFont('Arial','B',14);
	$this->Cell(276,5,utf8_decode('RELATÓRIO'),0,0,'C');
	$this->Ln();
	$this->SetFont('Arial','B',12);
	$this->Cell(276,5,utf8_decode('GERAL'),0,0,'C');
	$this->Ln(20);

}


function footer(){
$this->SetY(-15);
$this->SetFont('Arial','',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'L');

}

function headerTableUser(){
	$this->SetFont('Times','B',12);
	$this->Cell(25,10,'ID',1,0,'L');
	$this->Cell(150,10,utf8_decode('ENDEREÇO'),1,0,'L');
	$this->Cell(50,10,'LATITUDE',1,0,'C');
	$this->Cell(50,10,'LONGITUDE',1,0,'L');
	$this->Ln();

}


function VisuTabelaUser(){
	$db = new PDO('mysql:host=localhost;dbname=pmd','root','');
	$this->SetFont('Times','',12);
	$stmt = $db->query('select * from  pontospublicidade');
	$stmtPontos = $db->query('select * from  pontospublicidade');
	while($data = $stmt-> fetch(PDO::FETCH_OBJ)){
		$this->SetFont('Times','B',12);
		$this->Cell(25,10,$data->IdPontoPublicidade,1,0,'L');
		$this->Cell(150,10,$data->Endereco,1,0,'L');
		$this->Cell(50,10,$data->Latitude,1,0,'L');
		$this->Cell(50,10,$data->Longitude,1,0,'L');
		$this->Ln();
	}




	
}

}





















?> 