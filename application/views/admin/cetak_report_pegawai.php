<?php
ini_set('max_execution_time', 3600000);
ini_set('memory_limit','-1');
	date_default_timezone_set('Asia/Jakarta');
$i = 1;

  foreach ($peg as $row) {

$html = '
<html>
<head>
<title></title>
</head>
<body>



<table  border="0" width=100% style="font-family: Cambria; font-size: 9pt;">
    <tr>
        <td align="CENTER" colspan="15">LAPORAN POINT</td>
    </tr>
		<tr>
				<td align="CENTER" colspan="15"><strong>'.$row->nama.' '.$row->tahun.' </strong></td>
		</tr>
    <tr>
        <td align="CENTER" colspan="15"></td>
    </tr>
</table><br>

<table width="100%" border="1" >
	<tr align="center"  style="font-family: Cambria; font-size: 8pt; ">
		<td align="center" valign="top" width="30px" >No</td>
		<td align="center" valign="top" width="250px" >Bulan</td>
		<td align="center" valign="top" width="250px" >Total Point</td>
		';


	$rcd .= '<tr style="font-family: Cambria; font-size: 8pt; ">
		<td valign="top" align="center">'.$i.'</td>
		<td valign="top" align="left" >'.$row->bulan.'</td>
		<td valign="top" align="left" >'.$row->poin.'</td>

		';
	$html = $html . $rcd;
$html = $html . '
</table>
</body>
</html>
';
$i++;
}
	// echo $html;
	// exit();
if($param==1){
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=laporan_point_'.$x.'.xls");
	echo $html;
}else{
	include_once APPPATH.'/third_party/mpdf60/mpdf.php';

	//mpdf = new mPDF('en-x','FOLIO-L', '','', L,R,T,B,10,10);
	$mpdf = new mPDF('en-x','FOLIO','','',17,15,10,10,10,10);
	$mpdf->AddPage('L');
	//$mpdf->SetHTMLFooter($footer);
	$stylesheet = file_get_contents( base_url().'assets/css/mpdfstyletables.css' );
	$mpdf->WriteHTML($stylesheet,1);

	$mpdf->WriteHTML($html);
	$mpdf->Output('Laporan Point '.$x.'.pdf','I');

	exit;
	}


?>
