<?php
/**
 * 
 */
class Absensi extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->library('encryption');
		
		if ($this->session->userdata("Status") != "login" ) {
			redirect(base_url()."login");
		}
		// if ($this->session->userdata("Tanggal") != "login") {
		// 	# code...
		// }
		
	}
	function read_absen(){
		$postData = $this->input->post();
		$data = $this->m_absensi->getData($postData);
		
		echo json_encode($data);
	}
	// function tes_time(){
	// 	echo date("s", strtotime("2020-08-30 21:19:17"));
	// 	 $hari = date('l');
 //            $hari_indo = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday'=> 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
 //            $hari_indo_fix = $hari_indo[$hari];
 //            echo $hari_indo_fix;

	// }
	function absenCommit(){
		$dataAbsen = $this->m_absensi->getDataAll()->result();
		// var_dump($dataAbsen);
		// die();
		$periode = $this->session->userdata('periode');
		foreach ($dataAbsen as $key) {
			$pegawai = $this->m_pegawai->getDataBy($key->id_pegawai)->row();

			


			//proses commit absensi
			$absenCommit = $this->m_absensi_commit->getDataBy($key->id_pegawai)->row();
			if ($absenCommit == null) {

				$data = array(
					'id_pegawai' => $key->id_pegawai, 
					'masuk' => $this->searchStatus($key->status,1),  
					'sakit' => $this->searchStatus($key->status,2), 
					'izin' => $this->searchStatus($key->status,3), 
					'telat' => $this->searchStatus($key->status,4), 
					'tugas' => $this->searchStatus($key->status,5), 
					'periode' => $periode, 
				);
				$this->m_absensi_commit->addData($data);
			}else{
				$data = array(
					'masuk' => $this->searchStatus($key->status,1),  
					'sakit' => $this->searchStatus($key->status,2), 
					'izin' => $this->searchStatus($key->status,3), 
					'telat' => $this->searchStatus($key->status,4), 
					'tugas' => $this->searchStatus($key->status,5), 
				);

				$this->m_absensi_commit->updateData($data,$key->id_pegawai);
			}


		}
		//mencari pegawai yang tidak masuk
			//jika di riwayat_absen gk ada
			//maka tidak masuk di isi 2
		$this->pegawaiTidakMasuk();
		redirect("absensi_commit/index");
	}

	function searchStatus($data,$status){
		## 1. Masuk = 2
		## 2. Sakit = 1
		## 3. Izin = 1
		## 4. Telat = 1
		## 5. Tugas = 2
		## 6. Tidak Masuk = 2
		$result = 0;
		if ($data == $status) {
			switch ($status) {
				case 1 || 5:
					$result = 2;
					break;
				case 2 || 3 || 4:
					$result = 1;;
					break;
			}
		}
		

	
		return $result;
	}

	function pegawaiTidakMasuk(){
		$result = 0;
		$pegawai = $this->m_pegawai->getDataAll()->result();
		foreach ($pegawai as $key) {

			//proses commit absensi
			$absenCommit = $this->m_absensi_commit->getDataBy($key->id_pegawai)->row();
			if ($absenCommit == null) {

				$data = array(
					'id_pegawai' => $key->id_pegawai,  
					'tidak_masuk' => 2, 
				);
				$this->m_absensi_commit->addData($data);
			}else{
				$data = array(
					'tidak_masuk' => $absenCommit->tidak_masuk + 2, 
				);
				$where = array(
					'id_pegawai' => $key->id_pegawai, 
				);
				$this->m_absensi_commit->updateData($data,$where);
			}


		}

	}
}