<?php
ini_set('max_execution_time', 3600000);
ini_set('memory_limit','-1');
	date_default_timezone_set('Asia/Jakarta');
	$i=1;
	$rcd = '';
	$total_hasil=0;

	foreach ($result as $row) {
		$hasil = 0;
		$ket = 0;
		$id = 0;

$html = '
<html>
<head>
<title></title>
</head>
<body>



<table  border="0" width=100% style="font-family: Cambria; font-size: 9pt;">
    <tr>
        <td align="CENTER" colspan="15">LAPORAN POINT  '.$row->nama.' </td>
    </tr>
    <tr>
        <td align="CENTER" colspan="15"></td>
    </tr>
</table><br>

<table width="100%" border="1" >
	<tr align="center"  style="font-family: Cambria; font-size: 8pt; ">
		<td align="center" valign="top" width="30px" >No</td>
		<td align="center" valign="top" width="250px" >Tanggal</td>
		<td align="center" valign="top" width="250px" >Jam Masuk</td>
		<td align="center" valign="top" width="250px" >Jam Keluar</td>
		<td align="center" valign="top" width="250px" >Keterangan</td>
		<td align="center" valign="top" width="250px" >Point</td>
		<td align="center" valign="top" width="250px" >Total Point</td>

		';




		foreach ($master_point as $m_p ) {
			if ($row->masuk >= $m_p->awal && $row->masuk <= $m_p->akhir) {
				$hasil = $m_p->point;
				$ket =$m_p->detail;
				$id = $m_p->id;
				$total_hasil +=$hasil;
			}
			if($id == 6) {
				if ($row->keterangan == $m_p->awal){
					$hasil = $m_p->point;
					$total_hasil += $hasil - 10;
					$ket = $m_p->detail;
						}
					}
		}
	$rcd .= '<tr style="font-family: Cambria; font-size: 8pt; ">
		<td valign="top" align="center">'.$i.'</td>
		<td valign="top" align="left" >'.$row->tanggal.'</td>
		<td valign="top" align="left" >'.$row->masuk.'</td>
		<td valign="top" align="left" >'.$row->keluar.'</td>
		<td valign="top" align="left" >'.$ket.'</td>
		<td valign="top" align="left" >'.$hasil.'</td>
		<td valign="top" align="left" >'.$total_hasil.'</td>

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
	header("Content-Disposition: attachment; filename=laporan_point_'.$row->nama.'.xls");
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
	$mpdf->Output('Laporan Point '.$row->nama.'.pdf','I');

	exit;
	}


?>
