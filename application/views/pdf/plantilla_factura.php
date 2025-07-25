<?php


// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintHeader(false);
// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Señorio de Guadalest');
$pdf->setTitle('Señorio de guadalest');



// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<!-- Logotipo -->
	<style>
		/* Estilos para el logotipo */
		.logo {
			float: left;
			margin-top: 00px;
			width: 200px;
			height: 41px;
		}

		/* Estilos para los datos del empresario */
		.datos-empresa {
			font-size: 10px;
			margin-left: 210px;
			width:150px;
			float: right;
			left: 1110px;
		}
		.datos-empresa p {
			margin: 0;
		}

		/* Estilos para la numeración y fecha */
		.numero-fecha {
				margin-top: 20px;
		}

		/* Estilos para la tabla de artículos */
		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}
	
	</style>


<table style="width: 100%; 	margin-bottom:  20px; ">
	<tr>
		<td style=" padding: 5px; width: 80%; height: 61px;"> <img class="logo" src="./assets/images/logo_factura.png" alt="Logotipo de la empresa">
</td>
		<td style=" text-align: center; padding: 5px; width: 20%;color:grey; font-size: 20px; "> <span >Factura Simple</span></td>
	</tr>
	
</table>

<br>

<table style="width: 100%; ">
	<tr >
		<td style=" text-align: left; font-size: 10px;width: 80%;	height: 20px; ">
			<span> <span style="font-weight: bold;">Dirección: </span> Calle del Rosario, 6. 03517, Beniardá</span>
</td>
		<td style=" text-align: center; width: 20%;color:grey; font-size: 10px; border-bottom: 2px solid #dbdbdb" >
		<span style="color:#204478; ">Fecha</span>

	</td>
	</tr>
	
</table>


<table style="width: 100%; ">
	<tr >
		<td style=" text-align: left; font-size: 10px;width: 80%;	height: 20px; ">
			<span> <span style="font-weight: bold;">Nif: </span>  B42953372</span>
</td>
		<td style=" text-align: center; width: 20%;color:grey; font-size: 10px;" >
		<span style="color:#204478; ">  <?php echo  $fechaFactura; ?> </span>
		
	</td>
	</tr>
	
</table>








	


EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('a.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
