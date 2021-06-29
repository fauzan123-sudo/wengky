<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongan_gaji extends CI_Controller {
	

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

	function index(){
		$data['active_link'] = 1;

		$this->load->view('potongan_gaji/index',$data);
	}
	function save(){
		$nama_potongan = $this->input->post('nama_potongan'); 
		$nilai = $this->input->post('nilai'); 
		$status = 0;
		for($i=0;$i < count($nama_potongan);$i++) {
			if ($nama_potongan[$i] != "") {
				$dataSend = array( 
					'jenis_potongan' => $nama_potongan[$i],
					'value' => $nilai[$i],
				);
				$this->m_potongan->addData($dataSend);
				$status = 1;
			}
		}
			

		echo json_encode($status);
		
	}
	function getData(){
		$data = $this->m_potongan->getData()->result();
		$dataResult = [];


	

		for ($i=0; $i < count($data); $i++) { 
			$dataResult[$i] = array(
				'id' =>  ci_encode($data[$i]->id_potongan), 
				'nama' => $data[$i]->jenis_potongan , 
				'value' => $data[$i]->value , 
			);
		}

		echo json_encode($dataResult);
	}
	function delete($id){
		$status = 0;
		$data = $this->m_potongan->deleteData(ci_decode($id));
		if ($data) {
			$status = 1;
		}
		echo json_encode($data);

	}
	function getDataBy($id){
		$data = $this->m_potongan->getDataBy(ci_decode($id))->row();
		
		echo json_encode($data);
	}
	function saveUpdate($id){
		$nama_potongan = $this->input->post('nama_potongan'); 
		$nilai = $this->input->post('nilai'); 
		 

		$status = 0;

		$data = array(
			'jenis_potongan' => $nama_potongan,
			'value' => $nilai,
		);

		if ($this->m_potongan->updateData($data,ci_decode($id)) == 1) {
			$status = 1;
		}
			
		echo json_encode($status);
	}

}