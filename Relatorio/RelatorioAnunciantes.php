<?php 

require'../Relatorio/GerarRelatorio.php';

$id = $_GET['id'];

header('Content-Type: text/html; charset=utf-8');

	$pdf = new myPDF();
	$pdf -> AliasNbpages();
	$pdf -> AddPage('L','A4',0);
	$pdf -> headerTable();
	$pdf -> VisuTabela($id);
	$pdf -> Output();


?>