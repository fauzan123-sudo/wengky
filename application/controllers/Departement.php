<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement extends CI_Controller {
	

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

		$this->load->view('departement/index',$data);
	}
	function save(){
		$data = $this->input->post('nama_departement'); 
		$status = 0;
		for($i=0;$i < count($data);$i++) {
			if ($data[$i] != "") {
				$dataSend = array( 'nama' => $data[$i]);
				$this->m_departement->addData($dataSend);
				$status = 1;
			}
		}
			

		echo json_encode($status);
		
	}
	function getData(){
		$data = $this->m_departement->getData()->result();
		$dataResult = [];


	

		for ($i=0; $i < count($data); $i++) { 
			$dataResult[$i] = array(
				'id' =>  ci_encode($data[$i]->id_departement), 
				'nama' => $data[$i]->nama , 
			);
		}

		echo json_encode($dataResult);
	}
	function delete($id){
		$status = 0;
		$data = $this->m_departement->deleteData(ci_decode($id));
		if ($data) {
			$status = 1;
		}
		echo json_encode($data);

	}
	function getDataBy($id){
		$data = $this->m_departement->getDataBy(ci_decode($id))->row();
		
		echo json_encode($data);
	}
	function saveUpdate($id){
		$input = $this->input->post('nama_departement'); 
		 

		$status = 0;

		$data = array('nama' => $input);

		if ($this->m_departement->updateData($data,ci_decode($id)) == 1) {
			$status = 1;
		}
			
		echo json_encode($status);
	}

}