<?php 

/**
 * 
 */
class Absensi_commit extends CI_Controller{
	
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
		$data['active_link'] = 3;
		$this->load->view('absensi_commit/index',$data);
	}
	function getData(){

		$postData = $this->input->post();
		$data = $this->m_absensi_commit->getData($postData);
		echo json_encode($data);
	}


}