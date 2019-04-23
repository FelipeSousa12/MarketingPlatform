<?php 

require '../Util/fpdf/fpdf.php';

class myPDF extends FPDF{

function header(){
	$this->Image('../Imagens/logoPreta.png',10,8);
	$this->SetFont('Arial','B',14);
	$this->Cell(276,5,utf8_decode('RELATÓRIO DE USO DA PLATAFORMA'),0,0,'C');
	$this->Ln(10);
	$this->SetFont('Times','',12);
	$this->Cell(276,5,utf8_decode('Lista de Anunciantes'),0,0,'C');
	$this->Ln(15);
}

function footer(){
	$this->SetX(38);
	$this->SetY(-15);
	$this->SetFont('Arial','',8);
	$this->Cell(0,10,'Page'.$this->PageNo().'',0,0,'C');
}

function headerTable(){
	$this->SetX(38);
	$this->SetFont('Times','B',12);
	$this->Cell(55,10,'ID',1,0,'C');
	$this->Cell(55,10,utf8_decode('RAZÃO SOCIAL'),1,0,'C');
	$this->Cell(55,10,'CNPJ',1,0,'C');
	$this->Cell(55,10,'TELEFONE',1,0,'C');
	$this->Ln();
}


function VisuTabela(){
	$db = new PDO('mysql:host=localhost;dbname=pmd','root','');

	$this->SetFont('Times','',12);

	$stmt = $db->query('select * from  Anunciante');

	while($data = $stmt-> fetch(PDO::FETCH_OBJ)){
		$this->SetX(38);
		$this->SetFont('Times','B',12);
		$this->Cell(55,10,$data->IdAnunciante,1,0,'L');
		$this->Cell(55,10,$data->RazaoSocial,1,0,'L');
		$this->Cell(55,10,$data->Cnpj,1,0,'L');
		$this->Cell(55,10,$data->Telefone,1,0,'L');
		$this->Ln();
	}
}

}



?> 