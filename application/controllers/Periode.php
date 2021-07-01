<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller {
	

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

		$this->load->view('periode/index',$data);
	}
	function save(){
		$kode = $this->input->post('kode'); 
		$start = $this->input->post('start'); 
		$finish = $this->input->post('finish'); 
		$status = 0;
		
		$data = array(
					'kode' => $kode, 
					'start' => $start, 
					'finish' => $finish, 
				);
		if ($this->m_periode->addData($data) == 1) {
			$status = 1;
		}
		echo json_encode($status);
		
	}
	function getData(){
		$data = $this->m_periode->getDataAll()->result();
		$dataResult = [];

		for ($i=0; $i < count($data); $i++) { 
			$start = time_indo_convert($data[$i]->start);
			$finish = time_indo_convert($data[$i]->finish);
			$dataResult[$i] = array(
				'id' =>  ci_encode($data[$i]->id_periode), 
				'kode' => $data[$i]->kode , 
				'start' =>  $start[0], 
				'finish' =>  $finish[0], 
			);
		}

		echo json_encode($dataResult);
	}
	function delete($id){
		$status = 0;
		$data = $this->m_periode->deleteData(ci_decode($id));
		if ($data) {
			$status = 1;
		}
		echo json_encode($data);

	}
	function getDataBy($id){
		$data = $this->m_periode->getDataBy(ci_decode($id))->row();
		
		echo json_encode($data);
	}
	function saveUpdate($id){
		$kode = $this->input->post('kode'); 
		$start = $this->input->post('start'); 
		$finish = $this->input->post('finish'); 
		 

		$status = 0;

		$data = array(
					'kode' => $kode, 
					'start' => $start, 
					'finish' => $finish, 
				);


		if ($this->m_periode->updateData($data,ci_decode($id)) == 1) {
			$status = 1;
		}
			
		echo json_encode($status);
	}

}