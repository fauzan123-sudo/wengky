<?php 

/**
 * 
 */
class Riwayat_absensi extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}


	public function simpan_riw_absensi(){
		$data = $this->m_data->read_data('riwayat_absensi')->result();


		foreach ($data as $key) {
			$dataResult[$key->id_karyawan] = array('jam' => $key->jam , 'status'=> $key->status);
		}
		$dataResultfix = json_encode(array($dataResult));
		$hari = date('l');

		$hari_indo = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday'=> 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
		$hari_indo_fix = $hari_indo[$hari];

		$dataResult_fix_fix = array('hari' =>$hari_indo_fix, 'all_data' => $dataResultfix );
		$this->m_data->add_data('absensi',$dataResult_fix_fix);

	

	}
	public function view_testing(){
		$this->load->view('team');
	}

}