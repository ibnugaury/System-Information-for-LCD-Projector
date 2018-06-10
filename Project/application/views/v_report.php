<?php

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Universitas Hasanuddin');
$pdf->SetTitle('Laporan Lcd');
$pdf->SetSubject('Laporan');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
  

// Multicell test
$title = <<<EOD
<h3>Laporan Penggunaan LCD</h3>
EOD;
$pdf->SetFont('times');
$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
// $pdf->MultiCell(100, 5, $heading, 1, 'C', 0, 0, '', '', true);

$pdf->Cell(0, 5, "Periode : ".date("d/m/Y"), 0, false, 'C', 0, '', 0, false, 'T', 'M');

$pdf->Ln(6);
$table = '<table style="border:1px solid #000;padding:6px;">';
$table .= '<tr style="background-color:#ccc;">
			<th style="border:1px solid #000;">No</th>
			<th style="border:1px solid #000;">Nim</th>
			<th style="border:1px solid #000;">Nama</th>
			<th style="border:1px solid #000;">Jenis LCD</th>
            <th style="border:1px solid #000;">Ruangan</th>
            <th style="border:1px solid #000;">Mata Kuliah</th>
            <th style="border:1px solid #000;">Status</th>
		  </tr>';

$no = 1;
foreach ($data->result() as $d) 
{
$table .= '<tr>
				<td style="border:1px solid #000;">'.$no++.'</td>
				<td style="border:1px solid #000;">'.$d->nim.'</td>
				<td style="border:1px solid #000;">'.$d->nama.'</td>
				<td style="border:1px solid #000;">'.$d->lcd.'</td>
                <td style="border:1px solid #000;">'.$d->ruangan.'</td>
                <td style="border:1px solid #000;">'.$d->matakuliah.'</td>
                <td style="border:1px solid #000;">'.$d->status.'</td>
			  </tr>';
}
$table .= '</table>';

$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set color for background
$pdf->SetFillColor(215, 235, 255);



// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------
// ob_clean();
//Close and output PDF document
$pdf->Output('report.pdf', 'I');
