<?php
ini_set('max_execution_time', 3600000);
ini_set('memory_limit','-1');
	date_default_timezone_set('Asia/Jakarta');
$i = 1;


  foreach ($semua as $row) {
		$x = $row->bulan.''.$row->tahun;

$html = '
<html>
<head>
<title></title>
</head>
<body>



<table  border="0" width=100% style="font-family: Cambria; font-size: 12pt;">
    <tr>
        <td align="CENTER" colspan="15">LAPORAN SEMUA STATUS</td>
    </tr>
		<tr>
				<td align="CENTER" colspan="15">'.$row->bulan.' '.$row->tahun.'</td>
		</tr>
    <tr>
        <td align="CENTER" colspan="15"></td>
    </tr>
</table><br>

<table width="100%" border="1" >
	<tr align="center"  style="font-family: verdana; font-size: 8pt; ">
		<td align="center" valign="top" width="1px" >No</td>
		<td align="center" valign="top" width="250px" >Nama</td>
		<td align="center" valign="top" width="10px" >Tepat Waktu</td>
		<td align="center" valign="top" width="10px" >Telat 5 Menit</td>
		<td align="center" valign="top" width="10px" >Telat 20 Menit</td>
		<td align="center" valign="top" width="10px" >Telat 2 Jam</td>
		<td align="center" valign="top" width="10px" >Telat Lebih 2 Jam</td>
		<td align="center" valign="top" width="10px" >Lupa Absen</td>
		<td align="center" valign="top" width="10px" >Sakit</td>
		<td align="center" valign="top" width="10px" >Sakit Tanpa Surat</td>
		<td align="center" valign="top" width="10px" >Izin Ganti</td>
		<td align="center" valign="top" width="10px" >Izin Tidak Ganti</td>
		<td align="center" valign="top" width="10px" >Alfa</td>
		<td align="center" valign="top" width="10px" >Jaldis</td>
		<td align="center" valign="top" width="10px" >Plg Jaldis</td>
		<td align="center" valign="top" width="10px" >Cuti</td>
		<td align="center" valign="top" width="10px" >Total Waktu Telat</td>
		';


	$rcd .= '<tr style="font-family: verdana; font-size: 8pt; ">
		<td valign="top" align="center" width="1px">'.$i.'</td>
		<td valign="top" align="left"  width="250px">'.$row->nama.'</td>
		<td valign="top" align="center"  width="10px">'.$row->tepat.'</td>
		<td valign="top" align="center"  width="10px">'.$row->telat_lma_mnt.'</td>
		<td valign="top" align="center"  width="10px">'.$row->telat_tgaplh_mnt.'</td>
		<td valign="top" align="center"  width="10px">'.$row->telat_dua_jm.'</td>
		<td valign="top" align="center"  width="10px">'.$row->telat_lbhdua_jm.'</td>
		<td valign="top" align="center"  width="10px">'.$row->lpa_absen.'</td>
		<td valign="top" align="center"  width="10px">'.$row->SS.'</td>
		<td valign="top" align="center"  width="10px">'.$row->ST.'</td>
		<td valign="top" align="center"  width="10px">'.$row->ID.'</td>
		<td valign="top" align="center"  width="10px">'.$row->IT.'</td>
		<td valign="top" align="center"  width="10px">'.$row->A.'</td>
		<td valign="top" align="center"  width="10px">'.$row->J.'</td>
		<td valign="top" align="center"  width="10px">'.$row->PJ.'</td>
		<td valign="top" align="center"  width="10px">'.$row->C.'</td>
		<td valign="top" align="center"  width="10px">'.$row->total_jam_telat.'</td>

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
	$mpdf->Output('Laporan Semua Status Bulan - '.$x.'.pdf','I');

	exit;
	}


?>
