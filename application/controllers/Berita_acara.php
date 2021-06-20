<?php

/**
 * 
 */
class Berita_acara extends CI_Controller{
	var $statusAdd = "";
	var $statusUp = 0;
	function __construct(){
		parent::__construct();
		if ($this->session->userdata("Status") != "login" ) {
			redirect(base_url()."login");
		}
		
		



	}
	function index(){
		$data['active_link'] = 5;
		$data['breadcump'] = array("Beranda","Berita Acara");
		$this->load->view('berita_acara',$data);
	}
	function add_berita(){
		$status = "";
		$title = $this->input->post('title');
		$isi_berita = $this->input->post('isi_berita');

		$config['upload_path']          = './upload/berita/';
		$config['allowed_types']        = 'jpg|png|jpeg|gif';
		$config['max_size']             = 1024;
		$config['remove_space']			= true;
		$config['encrypt_name'] 		= true;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('file_image')) {
			$datafile = array('upload_data' => $this->upload->data());

			$data = array('title' => $title, 'image' =>  $datafile['upload_data']['file_name'], 'isi' => $isi_berita  );
			$this->statusAdd = $this->m_data->add_data('berita_acara',$data);
		}
		echo json_encode($this->statusAdd);

		
	}
	function read_data(){
		 $fetch_data = $this->m_berita->make_datatables();  
           $data = array();  
           $no = 1;
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                 $sub_array[] = $no;
                $sub_array[] = 
	                '<button type="button" name="update" id="'.$row->id_berita.'"  class="btn btn-warning btn-sm edit mr-2" data-toggle="modal" data-target="#modal-update"><i class="fa fa-edit"></i>
					</button>'.'<button type="button" name="delete" id="'.$row->id_berita.'" class="btn btn-danger btn-sm delete-data"><i class="fa fa-trash" aria-hidden="true"></i>
					</button>';  
                $sub_array[] = $this->security->xss_clean($row->title);  
                $sub_array[] = $this->security->xss_clean($row->isi);  
           
                $sub_array[] = '<img src="'.base_url().'upload/berita/'.$row->image.'" class="img-thumbnail" width="50" height="35" />'; 

                $data[] = $sub_array; 
                $no++; 
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->m_berita->get_all_data(),  
                "recordsFiltered"     =>     $this->m_berita->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           
           echo json_encode($output);
	}
	function read_berita_by(){
		$id = $this->uri->segment(3);
		$where = array('id_berita' => $id );
		$result = $this->m_data->read_data_by('berita_acara',$where)->result();
		echo json_encode($result);
	}
	function simpan_update(){
		$id = $this->uri->segment(3);
		$image_lawas = $this->uri->segment(4);
		

		$where = array('id_berita' => $id );
		$title = $this->input->post('e_title');
		$isi_berita = $this->input->post('e_isi');

		$config['upload_path']          = './upload/berita/';
		$config['allowed_types']        = 'jpg|png|jpeg|gif';
		$config['max_size']             = 1024;
		$config['remove_space']			= true;
		$config['encrypt_name'] 		= true;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('up_foto')) {
			@unlink(FCPATH.'./upload/berita/'.$image_lawas);
			$datafile = array('upload_data' => $this->upload->data());

			$data = array('title' => $title, 'image' =>  $datafile['upload_data']['file_name'], 'isi' => $isi_berita  );
			$this->m_data->update_data('berita_acara',$data,$where);
			$this->statusUp = 1;
			echo json_encode($this->statusUp);
		}else{
			$this->statusUp = 0;
			echo json_encode($this->statusUp);
		}
		

	}
	function delete_berita(){
		$id = $this->uri->segment(3);
		$where = array('id_berita' => $id );
		
		$data_delete = $this->m_data->read_data_by('berita_acara',$where)->result();
		$config['imagedir'] = './upload/berita/';
		
		foreach ($data_delete as $key) {
		 	$data_delete_image = $key->image;
		 } 

		unlink(FCPATH.$config['imagedir'].$data_delete_image);

		
		$data = $this->m_data->delete_data('berita_acara',$where);
		echo json_encode($data);
	}
	function print_berita(){
		$data['berita'] = $this->m_data->read_data('berita_acara')->result();
		$this->load->view('layout_print/print_berita',$data);
	}

}