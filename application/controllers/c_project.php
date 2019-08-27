<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_project extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
	 	$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
	 // $this->load->library('grocery_CRUD');
	}

/* START-CODE LOGIN USER  */
	public function index(){
		// $this->load-> view('v_header');
		$this->load-> view('v_index');
	}

	public function cek_user(){
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
		$user_id = $this->m_project->cek_user($username, $password);
    $type = $this->m_project->type($user_id);
    if($user_id){
      $session_data = array(
						'user_id' => $user_id,
            'username' => $username,
						'typeuser' => $type,
            'logged_in' => true
        );
				// print_r($session_data);
				// die();
			 $this->session->set_userdata($session_data);
		 	$this->session->set_flashdata('user_loggedin', 'Login Berhasil selamat datang '.$session->username);
				redirect('home');
			}else{
				$this->session->set_flashdata('login_failed', 'Login gagal cek username dan password anda!');
			 redirect('index');
		}
	}

	public function home(){
		$this->load->view('v_header');
		$this->load->view('admin/v_admin');	
	}
	public function not_permission(){
		$this->load->view('v_header');
		$this->load->view('v_permission');
	}

	public function rieut(){
		$this->load->view('v_header');
		$this->load->view('v_erno');
	}


	public function logout(){
		// session_start();
		// session_unset();
		// session_destroy();
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('typeuser');
		redirect('c_project');
	}

/* END-CODE LOGIN USER  */


/* START-CODE MASTER EXCEL  */
	public function index_pegawai($offset = 0){
		if($this->session->userdata('logged_in') == false){
			redirect('c_project');
		}else{
			if (isset($_POST['cari_global'])) {
				$data1 = array('s_cari_global' => $_POST['cari_global']);
				$this->session->set_userdata($data1);
			}

		$qry = 'select * from data_pegawai_master ';
		$per_page = 31;

		if ($this->session->userdata('s_cari_global')!="") {
			$qry.="where nama like '%".$this->db->escape_like_str($this->session->userdata('s_cari_global'))."%'  ";
		}
		elseif ($this->session->userdata('s_cari_global')=="") {
			$this->session->unset_userdata('s_cari_global');
		}

		$qry.= " order by no_akun";

		$offset                    = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config['total_rows']      = $this->db->query($qry)->num_rows();
		$config['per_page']        = $per_page;
		$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_link']      = 'First';
		$config['last_link']       = 'Last';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Previous';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	 	$config['first_tagl_close'] = '</span></li>';
	  	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	  	$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment']     = 3;
		$config['base_url']        = base_url().'c_project/index_pegawai';

		 $this->pagination->initialize($config);

		 $data['paginglinks']       = $this->pagination->create_links();
		$data['per_page']          = $this->uri->segment(3);
		$data['offset']            = $offset ;
		if($data['paginglinks']!= '') {
			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->db->query($qry)->num_rows();
		}
		$qry .= " limit {$per_page} offset {$offset} ";
		$data['ListData'] = $this->db->query($qry)->result_array();
		$data['sub_judul_form']="Data Pegawai ";

		$this->load->view('v_header', $data);
		$this->load->view('admin/v_upload', $data);
		}
	}


	public function tambah_excel($error = NULL)
    {
			if($this->session->userdata('logged_in') == false){
				redirect('c_project');
			} else 
			{
				$data['action'] = site_url('c_project/proses_upload');
				$data['periode'] = $this->m_project->get_periode_all();

				$data['judul_form']="Input Data";
				$data['datadosen'] = $this->Grocery_crud_model->show_dosen();
					$this->load->view('v_header', $data);
	        		$this->load->view('admin/v_upload_excel', $data);
    		}
	}

	public function proses_input()
	{
		$data['datadosen']=$this->Grocery_crud_model->show_dosen();
		$this->load->view('admin/v_upload_excel',$data);
	}

	public function proses_upload(){
		// $action = site_url('c_project/proses_upload');
		$fileName = $this->input->post('file', TRUE);

			$config['upload_path'] = './assets/uploads/';
			 $config['file_name'] = $fileName;
			$config['allowed_types'] = 'xls|xlsx|csv';
			$config['max_size'] = '1024';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (! $this->upload->do_upload('file')) {
				$error = array('error' => $this->upload->display_errors());
				 $this->session->set_flashdata('msg','Ada kesalah dalam upload');
				print_r($error);
			} else {
				$media = $this->upload->data();
				$inputFileName = './assets/uploads/'.$media['file_name'];
				$this->db->truncate('data_pegawai');

				try {
					$inputFileType = IOFactory::identify($inputFileName);
				 $objReader = IOFactory::createReader($inputFileType);
				 $objPHPExcel = $objReader->load($inputFileName);
				} catch (\Exception $e) {
					 die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
				}
				$sheet = $objPHPExcel->getSheet(0);
		   $highestRow = $sheet->getHighestRow();
		   $highestColumn = $sheet->getHighestColumn();

			 for ($row = 2; $row <= $highestRow; $row++){
		     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
		       NULL,
		       TRUE,
		       FALSE);

					 $tanggal = $rowData[0][5];

					 $tahun 		 = substr($tanggal,6,4);
					 $bulan		 = substr($tanggal,3,2);
					 $tgl		 = substr($tanggal,0,2);
					 $tanggal	 = $tahun.'-'.$bulan.'-'.$tgl;
					 //
					 // $var  = PHPExcel_Style_NumberFormat::toFormattedString($rowData[0][5],  ‘DD-MM-YYYY’);

		     $data2 = array(
		     	"no_peg"=> $rowData[0][0],
		    	"no_akun"=> $rowData[0][1],
		    	"no"=> $rowData[0][2],
		    	"nama"=> $rowData[0][3],
				"auto_assign"=> $rowData[0][4],
				"tanggal"=> $tanggal,
				"jam_kerja"=> $rowData[0][6],
				"awal_tugas"=> $rowData[0][7],
				"akhir_tugas"=> $rowData[0][8],
				"masuk"=> $rowData[0][9],
				"keluar"=> $rowData[0][10],
				"normal"=> $rowData[0][11],
				"waktu_real"=> $rowData[0][12],
				"telat"=> $rowData[0][13],
				"plg_awal"=> $rowData[0][14],
				"bolos"=> $rowData[0][15],
				"waktu_lembur"=> $rowData[0][16],
				"waktu_kerja"=> $rowData[0][17],
				"status"=> $rowData[0][18],
				"hrs_c_in"=> $rowData[0][19],
				"hrs_c_out"=> $rowData[0][20],
				"departemen"=> $rowData[0][21],
				"ndays"=> $rowData[0][22],
				"akhir_pekan"=> $rowData[0][23],
				"hari_libur"=> $rowData[0][24],
				"lama_hadir"=> $rowData[0][25],
				"ndays_ot"=> $rowData[0][26],
				"lembur_apekan"=> $rowData[0][27],
				"libur_lembur"=> $rowData[0][28]
		    );

				$this->db->insert("data_pegawai",$data2);

				}
				$riwayat = array(
					'aksi' => 'Upload Excel',
					'username' => $this->session->userdata('username'),
					'user_id' => $this->session->userdata('typeuser')
				);
				$this->m_project->riwayat($riwayat, 'history');
				$this->session->set_flashdata('suksess_import', 'Data berhasil di import '.$session->username);
				redirect('index_point');
			}
			// redirect('c_project/index_excel');
	}

	/* END-CODE MASTER EXCEL  */


	/* START-CODE MASTER POINT  */

	public function index_point(){

		if($this->session->userdata('logged_in') == false){
			redirect('c_project');
		}else{
			if (isset($_POST['cari_global'])) {
				$data1 = array('s_cari_global' => $_POST['cari_global']);
				$this->session->set_userdata($data1);
			}

		$data['point'] = $this->m_project->get_pengguna();
		$data['periode'] = $this->m_project->get_periode_all();
		$data['sub_judul_form'] = 'Perhitungan Point';

		$this->load->view('v_header', $data);
		$this->load->view('admin/v_index_point',$data);

	}
}

	public function get_pegawai(){
	$select_nama            = $this->input->post('select_nama');
	$periode           = $this->input->post('periode');
	$data['master_point'] = $this->m_project->get_m_p();
	$data['peg'] = $this->m_project->get_data_peg($select_nama);
	$data['per'] = $this->m_project->get_id_per($periode);
		$this->load->view('admin/view_data_pegawai',$data);
	}

	public function edit_point(){
		if($this->session->userdata('logged_in') == false){
			redirect('c_project');
		}else{
				$id   = $this->uri->segment(3);
        $data['select_tenaga_ahli']  = $this->m_project->get_id_peg($id);
				$data['master_point'] = $this->m_project->get_spesifik_point();
        // $data['list_pendidikan_t_a'] =$this->Crud_m->get_pend_t_ahli($id);
				$data['judul_form']     ="Edit Data";
				$data['sub_judul_form'] ="Pegawai ";
				$this->load->view('v_header', $data);
				$this->load->view('admin/edit_pegawai', $data);
		}
	}

		public function perbaharui_point(){
		$id_peg      = $this->input->post('id_peg');
		$jam_masuk      = $this->input->post('jam_masuk');
		$jam_keluar  = $this->input->post('jam_keluar');
		$keterangan  = $this->input->post('ket');

				 $data = array(
					'id'       =>$id_peg,
					'masuk'   =>strtoupper($jam_masuk),
					'keluar'  =>$jam_keluar,
					'keterangan'  =>$keterangan
					);
		$xss_data = $this->security->xss_clean($data);
		$this->db->where('id',$id_peg);
		$this->db->update('data_pegawai',$xss_data);
		$this->session->set_flashdata('update_suksess', 'Data Telah di Perbaharui');
		redirect('c_project/edit_point/'.$id_peg);

}

	public function proses_point(){
		if($this->session->userdata('logged_in') == false){
			redirect('c_project');
		}else{
	$param          = $this->uri->segment(3);
	$periode         = $this->uri->segment(4);
	$data['periode']=$this->m_project->get_id_per($periode);
	$data['sub_judul_form']="Proses Point ";
	$data['master_point'] = $this->m_project->get_m_p();
	$data['result'] = $this->m_project->get_data_peg($param);
	$data['param']  = $param;
	$data['per']  = $periode;
	$this->load->view('v_header', $data);
	$this->load->view('admin/v_proses_point',$data);
	}
}

	public function proses_point_semua(){
		$periode         = $this->uri->segment(3);
		$nama_peg = $this->m_project->get_nama_peg();
		$result = $this->m_project->get_data_peg_all();
		$master_point = $this->m_project->get_m_p();
		$tot_jam_telat = $this->m_project->get_tot_jam_telat();
		$spesifik_periode = $this->m_project->get_periode_spesifik($periode);

		$s_p = null;
		if ($periode == null || $result == null ) {
			$this->session->set_flashdata('login_failed', 'Data tidak ditemukan!');
				redirect('rieut');
		}else{
			// die('XAXAXAXAXA');

		foreach ($spesifik_periode as $p ) {
			$s_p = $p->bulan;
		}


		$i=1;
		$total_hasil=0;
		$akun = 0;
		$nama = null;
		$x=0;

		// Count nama pegawai *31
		foreach ($nama_peg as $n_peg) {

				$x=0;
				$y=0;
				$total_hasil=0;

					foreach ($result as $key) {
							if ($key->nama == $n_peg->nama){
								$x++;
							foreach ($tot_jam_telat as $telat) {
								if ($key->nama == $telat->nama) {
								$y++;


								$hasil = 0;
								$poin = 0;
								$ket = 0;
								$id = 0;

								$nama = $key->nama;
								$tahun = $key->tanggal;

								foreach ($master_point as $m_p ) {
									if ($key->masuk >= $m_p->awal && $key->masuk <= $m_p->akhir) {
										$hasil = $m_p->point;
										$poin = $m_p->id;
										$ket =$m_p->detail;
										$id = $m_p->id;
										$total_hasil +=$hasil;
									}
									if($id == 6) {
										if ($key->keterangan == $m_p->awal){
											$hasil = $m_p->point;
											$poin = $m_p->id;
											$total_hasil += $hasil - 10;
											$ket = $m_p->detail;
												}
											}
								}

								if ($x == $n_peg->jumlah){
																$data = array(
																"no_akun"=>$key->no_akun,
															 "nama"=> $key->nama,
															 "poin"=> $total_hasil,
															 "tot_jam_telat" => $telat->telat,
															 "periode_id"=> $periode,
															 "tahun"=> substr($tahun,0,4)
															);
															$this->db->insert("perhitungan_point",$data);
								}
								$data = array(
									"no_akun" => $key->no_akun,
									"nama" => $key->nama,
									"tanggal" => $key->tanggal,
									"masuk" => $key->masuk,
									"keluar" => $key->keluar,
									"telat" => $key->telat,
									"plg_awal" =>$key->plg_awal,
									"keterangan" => $key->keterangan,
									"tahun" => substr($tahun,0,4),
									"periode_id" => $periode,
									"point_id" => $poin
								);
								$this->db->insert("data_pegawai_master" , $data);
								}
							}
						}
					}
			}
		}
	$riwayat = array(
		'aksi' => 'Proses Point Periode '. $s_p .' - '. substr($tahun,0,4),
		'username' => $this->session->userdata('username'),
		'user_id' => $this->session->userdata('typeuser')
	);
	$this->m_project->riwayat($riwayat, 'history');
	$data['sub_judul_form']="Proses Point Semua Pegawai ";
	$data['master_point'] = $this->m_project->get_m_p();
	$data['periode'] = $periode;
	$data['result'] = $this->m_project->get_hasil_semua($periode);
	$data['nama_peg'] = $this->m_project->get_nama_peg();
	$this->load->view('v_header', $data);
	$this->load->view('admin/v_proses_point_semua',$data);

	}


public function unduh_data_point(){
	$peg        = $this->uri->segment(3);
	$param          = $this->uri->segment(4);
	$data['result'] = $this->m_project->get_data_peg($peg);
	$data['master_point'] = $this->m_project->get_m_p();
	$data['param']  = $param;
	// $data['projek']  = $this->Crud_m->cari_projek_dinas($projek);

	$this->load->view('admin/cetak_laporan_point',$data);
}

public function unduh_data_point_semua(){

	$param          = $this->uri->segment(3);
	$xls          = $this->uri->segment(4);
	$data['result'] = $this->m_project->get_hasil_semua($param);
	$data['master_point'] = $this->m_project->get_m_p();
	$data['nama_peg'] = $this->m_project->get_nama_peg();
	$data['param']  = $xls;
	// $data['projek']  = $this->Crud_m->cari_projek_dinas($projek);
	$this->db->truncate('data_pegawai');
	$this->load->view('admin/cetak_laporan_point_semua',$data);
	// redirect('c_project/home');
}
	/* END-CODE MASTER POINT  */



	/* START-CODE RULES POINT  */

	public function rules_point(){
		if($this->session->userdata('typeuser') != 1){
		 redirect('not_permission');
	 }else{
		$data['sub_judul_form'] = 'Rules Point';
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		// $crud->set_table('master_point');
		$this->grocery_crud->set_table('master_point');
		$output = $this->grocery_crud->render();

		$this->load->view('v_header', $data);
		$this->load->view('admin/rules_point',$output);
	}
}

	/* END-CODE RULES POINT  */


	/* START-CODE LAPORAN  */

	public function report(){
		if($this->session->userdata('logged_in') == false){
			redirect('c_project');
		}else{
			if (isset($_POST['cari_global'])) {
				$data1 = array('s_cari_global' => $_POST['cari_global']);
				$this->session->set_userdata($data1);
			}

				$this->load->model('m_project');
				$data['model'] = $this->m_project->get_periode_all();
				$data['judul_form'] = 'Laporan';
				$this->load->view('v_header', $data);
				$this->load->view('admin/v_laporan', $data);

			}
		}

	public function view_report_semua(){
			$data['tahun'] = $this->m_project->get_tahun();
	    $data['bulan'] = $this->m_project->get_bulan();
			$this->load->view('admin/view_laporan_semua',$data);
	}


	public function get_report_semua(){
	$select_tahun         = $this->input->post('select_tahun');
	$select_bulan         = $this->input->post('select_bulan');
	$data['bulan'] = $this->m_project->get_data_bln($select_tahun, $select_bulan);

	if ($select_bulan == NULL ) {
		echo '<strong>Bulan belum di piih!</strong>';
		die();
	}if ($select_tahun == NULL ) {
		echo 'Tahun belum dipilih!';
		die();
	}
		$this->load->view('admin/view_data_semua',$data);
	}

	public function unduh_report_semua(){
		$select_tahun         = $this->uri->segment(3);
		$select_bulan         = $this->uri->segment(4);
		$param								= $this->uri->segment(5);
		$data['bulan'] = $this->m_project->get_data_bln($select_tahun, $select_bulan);
		$data['param']  = $param;
		$this->load->view('admin/cetak_report_semua',$data);
	}

	public function view_report_pegawai(){
		$data['tahun'] = $this->m_project->get_tahun();
			$data['nama'] = $this->m_project->get_id_nama();
			$this->load->view('admin/view_laporan_pegawai',$data);
	}

	public function get_report_pegawai(){
	$select_tahun         = $this->input->post('select_tahun');
	$select_pegawai         = $this->input->post('select_nama');
	$data['peg'] = $this->m_project->get_peg_data($select_tahun, $select_pegawai);

	if ($select_pegawai == NULL ) {
		echo '<strong>Pegawai belum di piih!</strong>';
		die();
	}if ($select_tahun == NULL ) {
		echo 'Tahun belum dipilih!';
		die();
	}

		$this->load->view('admin/view_data_peg',$data);
	}

	public function unduh_report_pegawai(){
		$select_tahun         = $this->uri->segment(3);
		$select_pegawai         = $this->uri->segment(4);
		$data['peg'] = $this->m_project->get_peg_data($select_tahun, $select_pegawai);
		$this->load->view('admin/cetak_report_pegawai',$data);
	}

	public function view_report_status(){
			$data['tahun'] = $this->m_project->get_tahun_peg();
			$data['bulan'] = $this->m_project->get_bulan_id();
			$data['status'] = $this->m_project->get_m_p();
			$this->load->view('admin/view_laporan_status',$data);
	}

	public function get_report_status(){
			$select_tahun         = $this->input->post('select_tahun');
			$select_bulan         = $this->input->post('select_bulan');
			$select_status       = $this->input->post('select_status');

			if ($select_tahun != NULL && $select_bulan == NULL ) {
				if($select_status == NULL){
					echo 'Status belum dipilih!';
					die();
				}
				$data['select_bulan']= $this->input->post('select_bulan');
				$data['bulan'] = $this->m_project->get_all_data_master_peg_tahunan($select_tahun, $select_status);
				$this->load->view('admin/view_data_status',$data);
			}else{
				if($select_status == NULL){
					echo 'Status belum dipilih!';
					die();

				}
				$data['select_bulan']= $this->input->post('select_bulan');
				$data['bulan'] = $this->m_project->get_all_data_master_peg($select_tahun, $select_bulan , $select_status);
				$this->load->view('admin/view_data_status',$data);
			}

	}

	public function unduh_report_status(){
		$select_tahun         = $this->uri->segment(3);
		$select_bulan          = $this->uri->segment(4);
		$select_status          = $this->uri->segment(5);

		if($select_bulan == 0){
			$data['status'] = $this->m_project->get_all_data_master_peg_tahunan($select_tahun,$select_status);
			$this->load->view('admin/cetak_report_status_tahunan',$data);
		}else{
			$data['status'] = $this->m_project->get_all_data_master_peg($select_tahun, $select_bulan, $select_status);
			$this->load->view('admin/cetak_report_status',$data);
		}
	}

	public function unduh_report_status_semua(){
		$select_tahun         = $this->uri->segment(3);
		$select_bulan          = $this->uri->segment(4);
		if($select_bulan == null){
			$data['semua'] = $this->m_project->count_status_tahunan($select_tahun);
			$this->load->view('admin/cetak_report_status_semua_tahunan',$data);
		}else{
			$data['semua'] = $this->m_project->count_status($select_tahun, $select_bulan);
			$this->load->view('admin/cetak_report_status_semua',$data);
		}
	}
	/* END-CODE LAPORAN  */

	/* START-CODE GRAPH  */

	public function index_graph(){
					$x['data']=$this->m_project->get_perhitungan();
					$this->load->view('v_header');
					$this->load->view('admin/v_graph',$x);
			}

			public function graph_pegawai(){
				$select_tahun         = $this->uri->segment(3);
				$select_pegawai         = $this->uri->segment(4);
				$x['data'] = $this->m_project->get_peg_data_graph($select_tahun, $select_pegawai);
				$this->load->view('v_header');
				$this->load->view('admin/v_graph_pegawai',$x);
			}

			public function graph_semua_pegawai(){
				$select_tahun         = $this->uri->segment(3);
				$select_bulan         = $this->uri->segment(4);
				$x['data'] = $this->m_project->get_data_bln_graph($select_tahun, $select_bulan);
				$this->load->view('v_header');
				$this->load->view('admin/v_graph_semua_pegawai',$x);
			}

			public function graph_status(){
				$select_tahun         = $this->uri->segment(3);
				$select_bulan         = $this->uri->segment(4);

				if($select_bulan == null){
					$x['data'] = $this->m_project->count_status_tahunan($select_tahun);
					$this->load->view('v_header');
					$this->load->view('admin/v_graph_status_tahunan',$x);;
				}else{
					$x['data'] = $this->m_project->count_status($select_tahun, $select_bulan);
					$this->load->view('v_header');
					$this->load->view('admin/v_graph_status',$x);
				}
			}

	/* END-CODE GRAPH  */
	
	/* START JADWAL */
	public function jadwal($offset = 0){
		if ($this->session->userdata('typeuser') != 1){
			redirect('not_permission');
		}
		else{
			if (isset($_POST['cari_global'])) {
				$data1 = array('s_cari_global' => $_POST['cari_global']);
				$this->session->set_userdata($data1);
			}

		$qry = 'select * from data_dosen';
		$per_page = 31;

		if ($this->session->userdata('s_cari_global')!="") {
			$qry.="where nama_dosen like '%".$this->db->escape_like_str($this->session->userdata('s_cari_global'))."%'  ";
		}
		elseif ($this->session->userdata('s_cari_global')=="") {
			$this->session->unset_userdata('s_cari_global');
		}

		$qry.= " order by nik";

		$offset                    = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config['total_rows']      = $this->db->query($qry)->num_rows();
		$config['per_page']        = $per_page;
		$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_link']      = 'First';
		$config['last_link']       = 'Last';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Previous';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment']     = 3;
		$config['base_url']        = base_url().'jadwal';

		 $this->pagination->initialize($config);

		$data['paginglinks']       = $this->pagination->create_links();
		$data['per_page']          = $this->uri->segment(3);
		$data['offset']            = $offset ;
		if($data['paginglinks']!= '') {
			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->db->query($qry)->num_rows();
		}
		$qry .= " limit {$per_page} offset {$offset} ";
		$data['ListData'] = $this->db->query($qry)->result_array();
		$data['sub_judul_form']="Data Users ";
		$data['tipeuser'] = $this->m_project->get_tipe_user();


		$this->load->view('v_header', $data);
		$this->load->view('admin/jadwal', $data);
		}
	}
	function tambah_jadwal(){
		$nik = $this->input->post('nik');
		$nama_dosen = $this->input->post('nama_dosen');
		$spesialis = $this->input->post('spesialis');
		$id_matkul = $this->input->post('id_matkul');
		$nama_matkul = $this->input->post('nama_matkul');
		$sks = $this->input->post('sks');
		$id_jurusan = $this->input->post('id_jurusan');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$id_prodi = $this->input->post('id_prodi');
		$nama_prodi = $this->input->post('nama_prodi');
		$kelas = $this->input->post('kelas');
		$ruangan = $this->input->post('ruangan');
		$waktu = $this->input->post('waktu');
		$tanggal = $this->input->post('tanggal');
		$data = array(
			'nik' => $nik,
			'nama_dosen' => $nama_dosen,
			'id_spesialis' => $spesialis,
			'id_matkul' => $id_matkul,
			'nama_matkul' => $nama_matkul,
			'sks' => $sks,
			'id_jurusan' => $id_jurusan,
			'nama_matkul' => $nama_matkul,
			'id_prodi' => $id_prodi,
			'nama_prodi' => $nama_prodi,
			'kelas' => $kelas,
			'ruangan' => $ruangan,
			'waktu' => $waktu,
			'tanggal' => $tanggal
			);
		$this->m_project->input_dosen($data,'data_dosen');
		redirect('c_project/jadwal');
	}
	public function input_jadwal(){
		 if($this->session->userdata('typeuser') != 1){
 			redirect('not_permission');
 		}else
 		{
			 $data['title'] = 'Tampil Jadwal';
			 $data['tipeuser'] = $this->m_project->get_tipe_user();

			 $this->form_validation->set_rules('nik', 'NIK', 'required|callback_check_nik_exists');
			 $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
			 $this->form_validation->set_rules('id_spesialis', 'Id Spesialis', 'required');
			 $this->form_validation->set_rules('id_matkul', 'Id Matkul', 'required');
			 $this->form_validation->set_rules('nama_matkul', 'Nama Matkul', 'required');
			 $this->form_validation->set_rules('id_jurusan', 'Id Jurusan', 'required');
			 $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');
			 $this->form_validation->set_rules('id_prodi', 'Id Program Studi', 'required');
			 $this->form_validation->set_rules('nama_prodi', 'Nama Program Studi', 'required');
			 $this->form_validation->set_rules('kelas', 'Kelas', 'required');
			 $this->form_validation->set_rules('ruangan', 'Ruangan', 'required');
			 $this->form_validation->set_rules('waktu', 'Waktu', 'required');
			 $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');


			 if ($this->form_validation->run() === FALSE) {
					$this->load->view('v_header');
					$this->load->view('admin/input_jadwal', $data);
			}
		}
	}
	public function lihat_jadwal_dosen(){
		if ($this->session->userdata('typeuser') != 3){
			redirect('not_permission');
		}
		else{
			if (isset($_POST['cari_global'])) {
				$data1 = array('s_cari_global' => $_POST['cari_global']);
				$this->session->set_userdata($data1);
			}

		$qry = 'select * from data_dosen';
		$per_page = 31;

		if ($this->session->userdata('s_cari_global')!="") {
			$qry.="where nama_dosen like '%".$this->db->escape_like_str($this->session->userdata('s_cari_global'))."%'  ";
		}
		elseif ($this->session->userdata('s_cari_global')=="") {
			$this->session->unset_userdata('s_cari_global');
		}

		$qry.= " order by nik";

		$offset                    = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config['total_rows']      = $this->db->query($qry)->num_rows();
		$config['per_page']        = $per_page;
		$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_link']      = 'First';
		$config['last_link']       = 'Last';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Previous';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment']     = 3;
		$config['base_url']        = base_url().'jadwal';

		 $this->pagination->initialize($config);

		$data['paginglinks']       = $this->pagination->create_links();
		$data['per_page']          = $this->uri->segment(3);
		$data['offset']            = $offset ;
		if($data['paginglinks']!= '') {
			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->db->query($qry)->num_rows();
		}
		$qry .= " limit {$per_page} offset {$offset} ";
		$data['ListData'] = $this->db->query($qry)->result_array();
		$data['sub_judul_form']="Data Users ";
		$data['tipeuser'] = $this->m_project->get_tipe_user();


		$this->load->view('v_header', $data);
		$this->load->view('admin/jadwal', $data);
		}
	}

	public function edit_jadwal(){
		 if($this->session->userdata('typeuser') != 1){
				redirect('not_permission');
			}else{
				$nik  = $this->uri->segment(3);
				$data['ListData'] = $this->m_project->get_jadwal($nik);
				$data['title'] = 'Edit Jadwal';
				$data['tipeuser'] = $this->m_project->get_tipe_user();
				$this->load->view('v_header', $data);
				$this->load->view('admin/edit_jadwal', $data);
		}
	}

	 public function simpan_jadwal(){
		if($this->session->userdata('typeuser') != 1){
		 redirect('not_permission');
	}else{
		$data['title'] = 'Edit Jadwal';
		$nik  			= $this->input->post('nik'); 
		$nama_dosen 	= $this->input->post('nama_dosen');
		$data['ListData'] = $this->m_project->get_jadwal($nik);
			$data['tipeuser'] = $this->m_project->get_tipe_user();
			$this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');

			if ($this->form_validation->run() === FALSE) {
			 	 $this->load->view('v_header');
			 	 $this->load->view('admin/edit_jadwal', $data);
			} else {
					$nama_dosen 	= $this->input->post('nama_dosen');
					$id_spesialis 	= $this->input->post('id_spesialis');
					$id_matkul 		= $this->input->post('id_matkul');
					$nama_matkul 	= $this->input->post('nama_matkul');
			 	 	$id_jurusan 	= $this->input->post('id_jurusan');
			 		$nama_jurusan 	= $this->input->post('nama_jurusan');
			 		$id_prodi 		= $this->input->post('id_prodi');
					$nama_prodi 	= $this->input->post('nama_prodi');
					$kelas 			= $this->input->post('kelas');
					$ruangan 		= $this->input->post('ruangan');
					$waktu 			= $this->input->post('waktu');
					$tanggal 		= $this->input->post('tanggal');

				 $data  		  = array(
						'nama_dosen' 	=>$nama_dosen,
						'id_spesialis' 	=>$id_spesialis,
						'id_matkul' 	=>$id_matkul,
						'nama_matkul' 	=>$nama_matkul,
						'id_jurusan' 	=>$id_jurusan,
						'nama_jurusan' 	=>$nama_jurusan,
						'id_prodi' 		=>$id_prodi,
						'nama_prodi' 	=>$nama_prodi,
						'kelas' 		=>$kelas,
						'ruangan' 		=>$ruangan,
						'waktu' 		=>$waktu,
						'tanggal' 		=>$tanggal,
						'id_user' 		=>$typeuser

					);

					$riwayat = array(
						'aksi' 		=> 'Edit Jadwal ',
						'nik' 		=> $this->session->userdata('nik'),
						'user_id' 	=> $this->session->userdata('typeuser')
					);
					$this->m_project->riwayat($riwayat, 'history');
					$xss_data = $this->security->xss_clean($data);
					$this->db->where('nik',$nik);
					$this->db->update('data_dosen',$xss_data);
			 		$this->session->set_flashdata('user_registered', 'Data User Berhasil Diubah');
			 			redirect('jadwal');
			}
		}
	}

	/* START-CODE USERS  */

	public function index_users($offset = 0){
		if($this->session->userdata('typeuser') != 1){
			redirect('not_permission');
		}
		else{
			if (isset($_POST['cari_global'])) {
				$data1 = array('s_cari_global' => $_POST['cari_global']);
				$this->session->set_userdata($data1);
			}

		$qry = 'select * from pengguna ';
		$per_page = 31;

		if ($this->session->userdata('s_cari_global')!="") {
			$qry.="where username like '%".$this->db->escape_like_str($this->session->userdata('s_cari_global'))."%'  ";
		}
		elseif ($this->session->userdata('s_cari_global')=="") {
			$this->session->unset_userdata('s_cari_global');
		}

		$qry.= " order by id_pengguna";

		$offset                    = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config['total_rows']      = $this->db->query($qry)->num_rows();
		$config['per_page']        = $per_page;
		$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_link']      = 'First';
		$config['last_link']       = 'Last';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Previous';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment']     = 3;
		$config['base_url']        = base_url().'index_users';

		 $this->pagination->initialize($config);

		$data['paginglinks']       = $this->pagination->create_links();
		$data['per_page']          = $this->uri->segment(3);
		$data['offset']            = $offset ;
		if($data['paginglinks']!= '') {
			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->db->query($qry)->num_rows();
		}
		$qry .= " limit {$per_page} offset {$offset} ";
		$data['ListData'] = $this->db->query($qry)->result_array();
		$data['sub_judul_form']="Data Users ";
		$data['tipeuser'] = $this->m_project->get_tipe_user();


		$this->load->view('v_header', $data);
		$this->load->view('admin/index_users', $data);
		}
	}

			 public function register(){
				 if($this->session->userdata('typeuser') != 1){
		 			redirect('not_permission');
		 		}else
		 		{
					 $data['title'] = 'Tambah User';
					 $data['tipeuser'] = $this->m_project->get_tipe_user();

					 $this->form_validation->set_rules('nama', 'Name', 'required');
					 $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
					 $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
					 $this->form_validation->set_rules('password', 'Password', 'required');
					 $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
					 $this->form_validation->set_rules('typeuser', 'Typeuser', 'required');


					 if ($this->form_validation->run() === FALSE) {
							 $this->load->view('v_header');
							 $this->load->view('admin/register', $data);
					 } else {
							 $enc_password = md5($this->input->post('password'));

								 $riwayat = array(
							 		'aksi' => 'Add User',
							 		'username' => $this->session->userdata('username'),
							 		'user_id' => $this->session->userdata('typeuser')
							 	);
							 	$this->m_project->riwayat($riwayat, 'history');

							 $this->m_project->register($enc_password);
							 $this->session->set_flashdata('user_registered', 'User Baru Berhasil Ditambahkan');

							 redirect('index_users');
					 }
				 }
			 }

			 public function edit_users(){
				 if($this->session->userdata('typeuser') != 1){
		 			redirect('not_permission');
		 		}else{
					$id_pengguna  = $this->uri->segment(3);
					$data['ListData'] = $this->m_project->get_users($id_pengguna);
					$data['title'] = 'Edit User';
					$data['tipeuser'] = $this->m_project->get_tipe_user();
					$this->load->view('v_header', $data);
					$this->load->view('admin/edit_users', $data);
				 }
			 }

			 public function simpan_users(){
				if($this->session->userdata('typeuser') != 1){
				 redirect('not_permission');
			 }else{
				 $data['title'] = 'Edit User';
				 $id_pengguna  = $this->input->post('id_pengguna');
				 $password = $this->input->post('password');
				 $data['ListData'] = $this->m_project->get_users($id_pegngguna);
					$data['tipeuser'] = $this->m_project->get_tipe_user();
					$this->form_validation->set_rules('password', 'Password', 'required');

					if ($this->form_validation->run() === FALSE) {
					 	 $this->load->view('v_header');
					 	 $this->load->view('admin/edit_users', $data);
					} else {
							$nama = $this->input->post('nama');
							$email = $this->input->post('email');
							$username = $this->input->post('username');
							$typeuser = $this->input->post('typeuser');
					 	 	$enc_password = md5($this->input->post('password'));

						 $data  		  = array(
								'nama' =>$nama,
								'email' =>$email,
								'username' =>$username,
								'password' =>$enc_password,
								'id_user' =>$typeuser
							);

							$riwayat = array(
								'aksi' => 'Edit User ',
								'username' => $this->session->userdata('username'),
								'user_id' => $this->session->userdata('typeuser')
							);
							$this->m_project->riwayat($riwayat, 'history');
						$xss_data = $this->security->xss_clean($data);
						$this->db->where('id_pengguna',$id_pengguna);
						$this->db->update('pengguna',$xss_data);
					 	 $this->session->set_flashdata('user_registered', 'Data User Berhasil Diubah');
					 	 redirect('index_users');
					}
				}
			}

			 public function hapus_user($id) {
		 			$id=$this->uri->segment(3);
		 		try {
		 			$this->db->where('id_pengguna',$id);
		 			$this->db->delete('pengguna');
					$riwayat = array(
						'aksi' => 'Hapus User',
						'username' => $this->session->userdata('username'),
						'user_id' => $this->session->userdata('typeuser')
					);
					$this->m_project->riwayat($riwayat, 'history');
					$this->session->set_flashdata('user_deleted', 'User Berhasil dihapus');
		 			redirect('index_users');
		 		}catch(Exception $err)
		 			{
		 			log_message("error",$err->getMessage());
		 			return show_error($err->getMessage());
		 			}
		    }

	/* END-CODE USERS  */


	/* START-CODE HISTORY  */

	public function index_history($offset = 0){
		if($this->session->userdata('logged_in') == false){
			redirect('c_project');
		}else{

		$qry = 'select * from history ';
		$per_page = 31;

		$qry.= " order by id DESC";

		$offset                    = ($this->uri->segment(3) != '' ? $this->uri->segment(3):0);
		$config['total_rows']      = $this->db->query($qry)->num_rows();
		$config['per_page']        = $per_page;
		$config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']  = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_link']      = 'First';
		$config['last_link']       = 'Last';
		$config['next_link']       = 'Next';
		$config['prev_link']       = 'Previous';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['uri_segment']     = 3;
		$config['base_url']        = base_url().'c_project/index_history';

		 $this->pagination->initialize($config);

		 $data['paginglinks']       = $this->pagination->create_links();
		$data['per_page']          = $this->uri->segment(3);
		$data['offset']            = $offset ;
		if($data['paginglinks']!= '') {
			$data['pagermessage'] = 'Showing '.((($this->pagination->cur_page-1)*$this->pagination->per_page)+1).' to '.($this->pagination->cur_page*$this->pagination->per_page).' of '.$this->db->query($qry)->num_rows();
		}
		$qry .= " limit {$per_page} offset {$offset} ";
		$data['ListData'] = $this->db->query($qry)->result_array();
		$data['sub_judul_form']="History";

		$this->load->view('v_header', $data);
		$this->load->view('admin/v_history', $data);
			}
		}

	/* END-CODE HISTORY  */

/* START-CODE YANG BIKIN ANAK SMK  */
	public function login(){
		$this->load->view('v_login');
	}

	public function percobaan(){
		$tahun = 2018;
		$periode = 1;
		$data['ListData'] = $this->m_project->count_status($tahun,$periode);

		$this->load->view('v_header');
		$this->load->view('coba',$data);
	}

	public function groc(){
		$crud = new grocery_CRUD();
		$crud->set_theme('datatables');
		// $crud->set_table('master_point');
		$this->grocery_crud->set_table('master_point');
		$output = $this->grocery_crud->render();

		$this->load->view('v_header');
		$this->load->view('coba',$output);
	}



	function daftar(){
		$this->load->view('v_daftar');
	}

	public function tambah_akun(){
		$data['username'] = $this->input->post('username',true);
		$data['password'] = $this->input->post('password',true);
		$data['typeuser'] = $this->input->post('typeuser',true);
		$this->m_project->tambah_akun($data);

		redirect('c_project');
	}

	function tambahp (){
		$data['list_data'] = $this->m_project->v_point()->result();
		$this->load->view('admin/add_point',$data);
	}
	function tambah_aksi(){
		$id= $this->input->post('id');
		$nama = $this->input->post('nama');
		$tahun = $this->input->post('tahun');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'id' => $id,
			'nama' => $nama,
			'tahun' => $tahun,
			'tanggal' => $tanggal
			);
		$this->m_project->input_data($data);
		redirect('c_project/tambahp');
	}

	function buku(){
		$data['list_data'] = $this->m_project->data_buku()->result();
		$this->load->view('v_header');
		$this->load->view('admin/v_buku',$data);
	}

	function point(){
		$data['list_data'] = $this->m_project->v_point()->result();
		$this->load->view('admin/v_point',$data);
	}
	function libur(){
		$data['list_data'] = $this->m_project->v_libur()->result();
		$this->load->view('admin/v_libur',$data);
	}

	function user(){
		$data['list_data'] = $this->m_project->data_user()->result();
		$this->load->view('admin/v_user',$data);
	}

	public function hapus($id_pengguna){
		$where = array(
			'id_pengguna' => $id_pengguna
		);
		$this->m_project->hapus_data($where,'pengguna');
		redirect('c_project/user');
	}
	public function hapusbu($id){
		$where = array(
			'id' => $id
		);
		$this->m_project->hapus($where,'master_point');
		redirect('c_project/point');
	}
	public function hapuse($id){
		$where = array(
			'id' => $id
		);
		$this->m_project->hapus($where,'hari_libur');
		redirect('c_project/libur');
	}

	public function edit($id){
		$where = array('id_pengguna' => $id);
		$data['list_data'] = $this->m_project->edit($where,'pengguna')->result();
		$this->load->view('admin/v_edit',$data);
	}


	public function editbu($id){
		$where = array('id' => $id);
		$data['list_data'] = $this->m_project->edit($where,'master_point')->result();
		$this->load->view('admin/edit3',$data);
	}
	public function editli($id){
		$where = array('id' => $id);
		$data['list_data'] = $this->m_project->edit($where,'hari_libur')->result();
		$this->load->view('admin/buku_edit',$data);
	}

	public function update1(){
		$id= $this->input->post('id');
		$nama= $this->input->post('nama');
		$tahun= $this->input->post('tahun');
		$tanggal = $this->input->post('tanggal');

		$data = array(
			'id' => $id,
			'nama' => $nama,
			'tahun' => $tahun,
			'tanggal' => $tanggal
		);

		$where = array(
			'id' => $id
		);
	}

	public function update(){
		$id_pengguna = $this->input->post('id_pengguna');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = array(
			'id_pengguna' => $id_pengguna,
			'username' => $username,
			'password' => $password
		);

		$where = array(
			'id_pengguna' => $id_pengguna
		);

		$this->m_project->update($where,$data,'pengguna');
		redirect('c_project/libur');
	}
	public function update2(){
		$id = $this->input->post('id');

		$data = array(
			'id' => $id
		);

		$where = array(
			'id' => $id
		);

		$this->m_project->update($where,$data,'master_point');
		redirect('c_project/point');
	}

	function search_keyword(){
	    $keyword    =   $this->input->post('keyword');
	    $data['list_data']    =   $this->m_project->search($keyword);
	    // $this->twig->display('v_search',$this->data);
		$this->load->view('v_search',$data);
	}
/* END-CODE ANAK SMK  */

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
