<?php
	include("conexao/connection.php");

	$imagem = "C:/Inventory/logo.png";
	$titulo = "Relatorio";
	$end_pdf = "C:/Inventory/dist/fpdf";
	$por_pagina = "13";
	$tipo_pdf = "I";
	$sqltxt = "SELECT * FROM Inventory.dbo.software ORDER BY id";
	$sql = sqlsrv_query($connection,
		$sqltxt);
	$row = sqlsrv_num_rows($sql);

	if(!$sql) { echo "Nao retornou nenhum registro";
				die; }
	$paginas = ceil($sql/$por_pagina);

	define("FPDF_FONTPATH", "../dist/fpdf/font/");
	require_once("../dist/fpdf/fpdf.php"); 
	$pdf = new FPDF();

	$linha_atual = 0;
	$inicio = 0;

	for($x=1; $x<=$paginas; $x++) {
		$inicio = $linha_atual;
		$fim = $linha_atual + $por_pagina;
		if($fim > $row) $fim = $row;

		
$pdf->AddPage(); 
$pdf->SetFont("Arial", "B", 10);

		$pdf->Image($imagem, 0, 8);
		$pdf->Ln(2);
		$pdf->cell(185, 8, "Pagina $x de $paginas",
		0, 0, 'R');

		$pdf->LN(20);
		$pdf->cell(85, 8, 'Description', 1, 0,'L');

		$pdf->cell(85, 8, "Licences Number", 1, 1,'L');
$vetor = sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC);		for($i=$inicio; $i<$fim; $i++) {
			$pdf->cell(85, 8, sqlsrv_get_field($sql, $i, "descricao"),1, 0,'L'); 
			$pdf->cell(85, 8, sqlsrv_get_field($sql, $i, "quant_licenca"),1, 1,'L'); 
			$linha_atual++;
		}
	}

	$pdf->OUTPUT("Relatorio",$tipo_pdf);
?>