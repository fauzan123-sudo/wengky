<?php
/**
 * 
 */
class Absensi extends CI_Controller{
	
	function __construct(){
		parent::__construct();

	}
	function read_absen(){
		$data = $this->m_absensi->read_data_absensi()->result();
		
		echo json_encode($data);
	}
	function tes_time(){
		echo date("s", strtotime("2020-08-30 21:19:17"));
		 $hari = date('l');
            $hari_indo = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday'=> 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
            $hari_indo_fix = $hari_indo[$hari];
            echo $hari_indo_fix;

	}
}