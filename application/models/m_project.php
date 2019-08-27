<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_project extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function cek_user($username, $password){
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $result = $this->db->get('pengguna');

            if($result->num_rows() == 1){
                return $result->row(0)->id_pengguna;
            } else {
                return false;
            }
        }

	public function riwayat($data,$table){
				$this->db->insert('data_dosen',$data);
			}

public function type($user_id){
		$this->db->select('id_user');
		$this->db->where('id_pengguna', $user_id);
		$result = $this->db->get('pengguna');
		if($result->num_rows() == 1){
				return $result->row(0)->id_user;
			}else {
				return false;
		}
	}

		public function get_users($id_pengguna=null){
 		 $sql = "select * from pengguna where id_pengguna = '".$id_pengguna."'";
 		 $query = $this->db->query($sql);
 		 if ($query->num_rows() > 0) {
 		 	return $query->result();
 		}else {
 			return 0;
 		}
 	 }


	function tambah_akun($data){
		$this->db->insert('pengguna',$data);
	}

	function input_data($data){
		$this->db->insert('master_point',$data);
	}

	function data_buku(){
		$this->db->select('*');
		$this->db->from('buku');

		return $this->db->get();
	}
	function v_point(){
		$this->db->select('*');
		$this->db->from('master_point');

		return $this->db->get();
	}
	function v_libur(){
		$this->db->select('*');
		$this->db->from('hari_libur');
		return $this->db->get();
	}

	function input_dosen($data,$table){
		$this->db->insert($table,$data);
	}
	public function get_tipe_user(){
						$query="select * from typeuser";
						$sql=$this->db->query($query);
						if($sql->num_rows() > 0){
							return $sql->result();
								}else{
										return 0;
								}
				 }

				 public function register($enc_password){
			             //user data
			             $data = array(
			                 'nama' => $this->input->post('nama'),
			                 'email' => $this->input->post('email'),
			                 'username' => $this->input->post('username'),
			                 'password' => $enc_password,
			                 'id_user' => $this->input->post('typeuser')
			             );

			             //insert user
			             return $this->db->insert('pengguna', $data);
			         }

							 public function get_tipe_u(){
										$query="select a.id_user,b.*
from pengguna a
INNER JOIN typeuser b on a.id_user = b.id";
										$sql=$this->db->query($query);
										if($sql->num_rows() > 0){
											return $sql->result();
												}else{
														return 0;
												}
								 }


	public function get_pengguna(){
      $query="select no_peg, nama, no_akun from data_pegawai group by no_peg order by nama";
      $sql=$this->db->query($query);
      if($sql->num_rows() > 0){
        return $sql->result();
          }else{
              return 0;
          }
   }


	 public function get_pengguna_insert(){
       $query="insert into tmp_perhitungan (id_pegawai, id_point)
							select nama, masuk, keluar
							from data_pegawai ";
       $sql=$this->db->query($query);
    }

	 public function get_data_peg($select_nama=null){
		 $sql = "select id,no_peg, no_akun, tanggal, nama, masuk, keluar, keterangan from data_pegawai where no_akun = '".$select_nama."'";
		 $query = $this->db->query($sql);
		 if ($query->num_rows() > 0) {
		 	return $query->result();
		}else {
			return 0;
		}
	 }

	 public function get_data_peg_all(){
		$sql = "select id,no_peg, no_akun, tanggal, nama, masuk, keluar, keterangan, telat, plg_awal from data_pegawai ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
		 return $query->result();
	 }else {
		 return 0;
	 }
	}

	public function get_hasil_semua($periode = 0){
	 $sql = "select a.*, b.* from perhitungan_point a
INNER JOIN periode b ON a.periode_id = b.id  where periode_id = '".$periode."'";
	 $query = $this->db->query($sql);
	 if ($query->num_rows() > 0) {
		return $query->result();
	}else {
		return 0;
	}
 }

	public function get_nama_peg(){
	 $sql = "select nama,count(*) as jumlah  from data_pegawai group by nama ";
	 $query = $this->db->query($sql);
	 if ($query->num_rows() > 0) {
		return $query->result();
	}else {
		return 0;
	}
 }

	public function no_akun(){
	 $sql = "select no_akun from data_pegawai ";
	 $query = $this->db->query($sql);
	 if ($query->num_rows() > 0) {
		return $query->result();
	}else {
		return 0;
	}
 }


	 public function get_id_peg($id=null){
		 $sql = "select id,no_peg, no_akun, tanggal, nama, masuk, keluar, keterangan from data_pegawai where id = '".$id."'";
		 $query = $this->db->query($sql);
		 if ($query->num_rows() > 0) {
		 	return $query->result();
		}else {
			return 0;
		}
	 }

	 public function get_m_p(){
		$sql = "select * from master_point";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
		 return $query->result();
	 }else {
		 return 0;
	 }
	}

	public function get_periode_all(){
	 $sql = "select * from periode";
	 $query = $this->db->query($sql);
	 if ($query->num_rows() > 0) {
		return $query->result();
	}else {
		return 0;
	}
 }

 public function get_periode_spesifik($periode){
	 	$this->db->select('bulan');
		 $this->db->where('id', $periode);
		 return $this->db->get('periode')->result();
}


 public function get_tot_jam_telat(){
	$sql = "select nama,SEC_TO_TIME( SUM( TIME_TO_SEC( `telat` ) ) ) as telat from data_pegawai group by nama";
	$query = $this->db->query($sql);
	if ($query->num_rows() > 0) {
	 return $query->result();
 }else {
	 return 0;
 	}
 }

 public function get_perhitungan(){
	 				$this->db->select('*');
					 $this->db->group_by('nama', 'asc');
					 return $this->db->get('perhitungan_point')->result();
			 }

 public function get_id_nama(){
	 				$this->db->select('id,nama,no_akun', 'asc');
					 $this->db->group_by('nama', 'asc');
					 return $this->db->get('perhitungan_point')->result();
			 }

 public function get_bulan(){
            $this->db->order_by('periode_id', 'asc');
						$this->db->join('periode', 'perhitungan_point.periode_id = periode.id');
						$this->db->group_by('periode_id', 'asc');
            return $this->db->get('perhitungan_point')->result();
        }

				public function get_bulan_id(){
			             $this->db->order_by('periode_id', 'asc');
									 $this->db->join('periode', 'data_pegawai_master.periode_id = periode.id');
			 						$this->db->group_by('periode_id', 'asc');
			             return $this->db->get('data_pegawai_master')->result();
			         }

		 public function get_all_data_master_peg($tahun=null, $periode=null, $poin=null){
			$sql = "select a.tahun,nama,count(point_id) as performa,
		b.*, c.* from data_pegawai_master a
		INNER JOIN periode b On a.periode_id = b.id
		INNER JOIN master_point c on a.point_id = c.id
		where a.tahun = '".$tahun."' and a.periode_id = '".$periode."' and a.point_id = '".$poin."' group by a.nama order by performa DESC";
		 		$query = $this->db->query($sql);
		 		if ($query->num_rows() > 0) {
					return $query->result();
				}else {
					return null;
				}
	 		}

			public function get_all_data_master_peg_tahunan($tahun=null, $poin=null){
 			$sql = "select a.tahun,nama,count(point_id) as performa,
 		c.* from data_pegawai_master a
 		INNER JOIN master_point c on a.point_id = c.id
 		where a.tahun = '".$tahun."' and a.point_id = '".$poin."' group by a.nama order by performa DESC";
 		 		$query = $this->db->query($sql);
 		 		if ($query->num_rows() > 0) {
 					return $query->result();
 				}else {
 					return null;
 				}
 	 		}

	public function get_data_bln($id=null, $id2=null){
		 		 $sql = "select a.*,
			b.* from perhitungan_point a
			INNER JOIN periode b ON a.periode_id = b.id
			where a.tahun = '".$id."' and a.periode_id = '".$id2."' order by tot_jam_telat desc";
		 		 $query = $this->db->query($sql);
		 		 if ($query->num_rows() > 0) {
		 		 	return $query->result();
		 		}else {
		 			return null;
		 		}
		 	 }

		public function get_data_bln_graph($tahun=null, $bulan=null){
							 $this->db->select('*');
							 $this->db->from('perhitungan_point');
							 $this->db->join('periode', 'periode.id = perhitungan_point.periode_id');
							 $this->db->where('tahun', $tahun);
							$this->db->where('periode_id', $bulan);
							return $this->db->get('')->result();
				}

				public function get_peg_data_graph($tahun=null, $pegawai=null){
									 $this->db->select('*');
									 $this->db->from('perhitungan_point');
									 $this->db->join('periode', 'periode.id = perhitungan_point.periode_id');
									 $this->db->where('tahun', $tahun);
									$this->db->where('no_akun', $pegawai);
									return $this->db->get('')->result();
						}

			 public function get_peg_data($id=null, $id2=null){
							$sql = "select a.*,
			b.* from perhitungan_point a
			INNER JOIN periode b ON a.periode_id = b.id
			where a.tahun = '".$id."' and a.no_akun = '".$id2."' order by tahun desc";
							$query = $this->db->query($sql);
							if ($query->num_rows() > 0) {
							 return $query->result();
						 }else {
							 return NULL;
						 }
						}

 public function get_tahun(){
	$sql = "select tahun from perhitungan_point group by tahun";
	$query = $this->db->query($sql);
	if ($query->num_rows() > 0) {
	 return $query->result();
 }else {
	 return 0;
 }
}

public function get_tahun_peg(){
 $sql = "select tahun from data_pegawai_master group by tahun";
 $query = $this->db->query($sql);
 if ($query->num_rows() > 0) {
	return $query->result();
}else {
	return 0;
}
}

 public function get_id_per($per=null){
	 $sql = "select * from periode where id = '".$per."'";
	 $query = $this->db->query($sql);
	 if ($query->num_rows() > 0) {
		return $query->result();
	}else {
		return 0;
	}
 }

	public function get_spesifik_point(){
	 $sql = "select * from master_point where id >= 7 ";
	 $query = $this->db->query($sql);
	 if ($query->num_rows() > 0) {
		return $query->result();
	}else {
		return 0;
	}
 }

 public function count_status($tahun=null, $periode=null){
	$sql = "select a.nama,
				count(if(point_id='1',1,null)) 'tepat',
				count(if(point_id='2',1,null)) 'telat_lma_mnt',
				count(if(point_id='3',1,null)) 'telat_tgaplh_mnt',
				count(if(point_id='4',1,null)) 'telat_dua_jm',
				count(if(point_id='5',1,null)) 'telat_lbhdua_jm',
				count(if(point_id='6',1,null)) 'lpa_absen',
				count(if(point_id='7',1,null)) 'SS',
				count(if(point_id='8',1,null)) 'ST',
				count(if(point_id='9',1,null)) 'ID',
				count(if(point_id='10',1,null)) 'IT',
				count(if(point_id='11',1,null)) 'A',
				count(if(point_id='12',1,null)) 'J',
				count(if(point_id='13',1,null)) 'PJ',
				count(if(point_id='14',1,null)) 'C',
				SEC_TO_TIME( SUM( TIME_TO_SEC( `telat` ) ) ) 'total_jam_telat',
				b.bulan, a.tahun
				from data_pegawai_master a
				inner join periode b on a.periode_id = b.id
				where tahun = '".$tahun."' and periode_id = '".$periode."' group by nama ";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return null;
		}
	}

	public function count_status_tahunan($tahun=null){
	 $sql = "select nama,
				count(if(point_id='1',1,null)) 'tepat',
				count(if(point_id='2',1,null)) 'telat_lma_mnt',
				count(if(point_id='3',1,null)) 'telat_tgaplh_mnt',
				count(if(point_id='4',1,null)) 'telat_dua_jm',
				count(if(point_id='5',1,null)) 'telat_lbhdua_jm',
				count(if(point_id='6',1,null)) 'lpa_absen',
				count(if(point_id='7',1,null)) 'SS',
				count(if(point_id='8',1,null)) 'ST',
				count(if(point_id='9',1,null)) 'ID',
				count(if(point_id='10',1,null)) 'IT',
				count(if(point_id='11',1,null)) 'A',
				count(if(point_id='12',1,null)) 'J',
				count(if(point_id='13',1,null)) 'PJ',
				count(if(point_id='14',1,null)) 'C',
				SEC_TO_TIME( SUM( TIME_TO_SEC( `telat` ) ) ) 'total_jam_telat',
				tahun
				from data_pegawai_master
				where tahun = '".$tahun."' group by nama ";
		 $query = $this->db->query($sql);
		 if ($query->num_rows() > 0) {
			 return $query->result();
		 }else {
			 return null;
		 }
	 }


	function data_user(){
		$this->db->select('*');
		$this->db->from('pengguna');

		return $this->db->get();
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function hapus($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit($where,$table){
		return $this->db->get_where($table,$where);
	}

	function editbu($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

		function search($keyword){
			$this->db->like('nama_buku',$keyword);
			$query  =   $this->db->get_where("buku");
			return $query->result();
		}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
