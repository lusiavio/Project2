<?php
ini_set('max_execution_time', 3600000);
ini_set('memory_limit','-1');
	date_default_timezone_set('Asia/Jakarta');
$i = 1;
// print_r($status);
// die();
if($status == NULL){
	echo 'Status Belum Dipilih';
}else{

	foreach ($status as $row) {
		if ($row->id == 1) {
		$row->detail  = 'Tepat Waktu';
		} if ($row->id == 2) {
				$row->detail  =  'Telat 5 Menit';
		} if ($row->id == 3) {
				$row->detail  =  'Telat 30 Menit';
		} if ($row->id == 4) {
				$row->detail  =  'Telat 2 Jam';
		} if ($row->id == 5) {
				$row->detail  =  'Telat Lebih Dari 2 Jam';
		} if ($row->id == 6) {
				$row->detail  =  'Lupa Absen';
		} if ($row->id == 7) {
				$row->detail  =  'Sakit Dengan Surat';
		} if ($row->id == 8) {
				$row->detail  =  'Sakit Tanpa Surat';
		} if ($row->id == 9) {
				$row->detail  =  'Izin Diganti';
		} if ($row->id == 10) {
				$row->detail  =  'Izin Tidak Diganti';
		} if ($row->id == 11) {
				$row->detail  =  'ALFA';
		} if ($row->id == 12) {
				$row->detail  =  'Jalan Dinas';
		} if ($row->id == 13) {
				$row->detail  =  'Pulang Jalan Dinas > 23.00';
		} if ($row->id == 14) {
				$row->detail  =  'Cuti';
		}
		$bln = 0;
		if($row->bulan == null){
			echo ' - ';
		}
		$bln = $row->bulan;
		$x = $bln.''.$row->tahun;
		$y = $row->detail;


$html = '
<html>
<head>
<title></title>
</head>
<body>



<table  border="0" width=100% style="font-family: Cambria; font-size: 9pt;">
    <tr>
        <td align="CENTER" colspan="15">LAPORAN STATUS</td>
    </tr>
		<tr>
				<td align="CENTER" colspan="15">'.$row->detail.' '.$bln.' '.$row->tahun.'</td>
		</tr>
    <tr>
        <td align="CENTER" colspan="15"></td>
    </tr>
</table><br>

<table width="100%" border="1" >
	<tr align="center"  style="font-family: Cambria; font-size: 8pt; ">
		<td align="center" valign="top" width="30px" >No</td>
		<td align="center" valign="top" width="250px" >Nama</td>
		<td align="center" valign="top" width="250px" >Total</td>
		';


	$rcd .= '<tr style="font-family: Cambria; font-size: 8pt; ">
		<td valign="top" align="center">'.$i.'</td>
		<td valign="top" align="left" >'.$row->nama.'</td>
		<td valign="top" align="left" >'.$row->performa.'</td>

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
	$mpdf->Output('Laporan Status '.$y.' - '.$x.'.pdf','I');

	exit;
	}
}

?>
