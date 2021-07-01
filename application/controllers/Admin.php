<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	var $file_qr;
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
	//read data

	public function index(){
		$data['pegawai_count'] = $this->m_data->read_data('pegawai')->num_rows();
		$data['berita_acara'] = $this->m_data->berita_acara('berita_acara')->result();
		$data['rlogin'] = $this->m_data->data_ruser();
		$data['active_link'] = 0;

		$this->load->view('index',$data);
	}
	function page_update_qr(){
		$this->load->view('pages_proses_qr');
	}
	public function read_karyawan(){
		$periode = $this->session->userdata('periode');
		$data = $this->m_data->read_data('pegawai')->where('periode',$periode)->result();
		echo json_encode($data);
	}
	public function karyawan(){
		$data['active_link'] = 1;
		$data['breadcump'] = array("Beranda","Karyawan");
		$data['jabatan'] = $this->m_departement->getData()->result();
		$this->load->view('karyawan',$data);
	}
	public function gaji(){
		$data['active_link'] =2;
		$data['breadcump'] = array("Beranda","Gaji");
		$this->load->view('gaji',$data);
	}
	public function absensi(){
		$data['active_link'] =3;
		$data['breadcump'] = array("Beranda","Absensi");
		$data['pegawai'] = $this->m_data->read_data('pegawai')->result();
		$this->load->view('absensi',$data);
	}
	public function qr_code(){
		$this->load->view('qr_code');
	}
	public function team(){
		$this->load->view('team');
	}
	//view qr code
	function view_qr_code(){
		$data['qr_code'] = $this->m_data->read_data('pegawai')->result();
		$this->load->view('home_qr_code',$data);
	}
	function riwayat_absensi(){
		$data['active_link'] =3;
		$data['breadcump'] = array("Beranda","Absensi", "Riwayat Absensi");
		$data['riwayat_absensi'] = $this->m_data->read_data('riwayat_absensi')->result();
		$this->load->view('riwayat',$data);
	}
	//read data [pegawai]

	function read_pegawai(){  
          
           $post = $this->input->post();
           $output = $this->m_pegawai->getData($post);
           echo json_encode($output);  
      }  

     //read data [gaji]

     function read_gaji(){  
          
           $fetch_data = $this->m_gaji->make_datatables();  
         
           $data = array();  
           $no = 1;
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                 	$sub_array[] = $no;
               		$sub_array[] = 
	                '<button type="button" name="update" id="'.$row->id_gaji.'"  class="btn btn-warning btn-sm edit mr-2"><i class="fa fa-edit"></i>
					</button>'.'<button type="button" name="delete" id="'.$row->id_gaji.'" class="btn btn-danger btn-sm delete-data"><i class="fa fa-trash" aria-hidden="true"></i>
					</button>';  
					$sub_array[] = $row->nama;  
					$sub_array[] = $row->nip; 
                	$sub_array[] = $row->gaji_pokok;  
                	$sub_array[] = $row->asuransi;  
                	$sub_array[] = $row->potong_gaji;  
             
                $data[] = $sub_array; 
                $no++; 
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->m_gaji->get_all_data(),  
                "recordsFiltered"     =>     $this->m_gaji->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  

      }  
      // read riwayat absensi
      function read_data_ra(){
      	$data = $this->m_absensi->read_data_absensi_riwayat()->result();
      	echo json_encode($data);
      }
     // read qr code
      function read_qr_code(){
      	$data = $this->m_data->read_data('pegawai')->result();
      	echo json_encode($data);
      }
      function search_qr_code(){
      	$search = $this->input->post('input_search');


      	$data = $this->m_data->seacrh_data_qrcode('pegawai',$search)->result();
      	echo json_encode($data);
      }

	//tambah data
	function idata_karyawan(){
		

		$this->form_validation->set_rules('in_username','In_username', 'required');
		$this->form_validation->set_message('field tidak boleh kosong');



		$username = $this->input->post('in_username'); 
		$nama = $this->input->post('in_nama'); 
		$tempat = $this->input->post('in_tempat'); 
		$tgl_lhr = $this->input->post('in_tgl_lhr'); 
		$telepon = $this->input->post('in_tlp'); 
		$jabatan = $this->input->post('in_jabatan'); 
		$email = $this->input->post('in_email'); 
		$nip = $this->input->post('in_nip'); 
		$alamat = $this->input->post('in_alamat'); 
		$periode = $this->db->query('SELECT id_periode FROM m_periode')->last_row();
		
		// var_dump($periode->kode);
		// die();

		$config['upload_path']          = './upload/image/pegawai/';
		$config['allowed_types']        = 'jpg|png|jpeg|gif';
		$config['max_size']             = 1024;
		$config['remove_space']			= true;
		$config['encrypt_name'] 		= true;

		$this->load->library('upload', $config);
		

		if ($this->upload->do_upload("in_foto")) {
			$datafile = array('upload_data' => $this->upload->data());

			//generate code qr
			$config['cacheable'] = true;
			$config['cachedir'] = '';
			$config['errorlog'] = '';
			$config['quality'] = true;
			$config['imagedir'] = './upload/code_qr/';
			$config['size'] = '1024';
			$config['black'] = array(224,255,255);
			$config['white'] = array(70,130,180);

			$this->ciqrcode->initialize($config);

			
			$this->db->select_max("id_pegawai");
          	$dataqr = $this->db->get("pegawai")->result();
          	foreach ($dataqr as $key) {
          		$dataqr_fix = $key->id_pegawai;
          	}
          	$dataqr_fix_fix = $dataqr_fix + 1;
          	$time_data = date("Y-m-d");
          	$rand_string = random_string(10);
          	$image_name_qr_code = $rand_string.'.png';//
			$params['data'] = $rand_string;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name_qr_code;

			$this->ciqrcode->generate($params);


			$data = array(
				'nama' => $nama,
				'tempat_lahir' => $tempat ,
				'tgl_lahir' => $tgl_lhr ,
				'alamat' => $alamat ,
				'email' => $email ,
				'no_tlp' => $telepon ,
				'jabatan' => $jabatan ,
				'nip' => $nip,
				'username' => $username ,  
				'image' => $datafile['upload_data']['file_name'],
				'code_qr' => $image_name_qr_code,
				'string_qr_code' => $rand_string,
				'periode' => $periode->id_periode,
			 );
		}



	 	

		$vefri = $this->m_data->add_data('pegawai',$data);
		echo json_encode($vefri);
		

		
	}
	function idata_gaji(){
		$karyawan = $this->input->post('in_karyawan'); 
		$gaji = $this->input->post('in_gaji'); 
		$asu = $this->input->post('in_asuransi'); 
		$potongan = $this->input->post('in_potongan'); 

		$data = array(
			'id_pegawai' => $karyawan, 
			'gaji_pokok' => $gaji, 
			'asuransi' => $asu , 
			'potongan' => $potongan 

		);
		
		$status = $this->m_data->add_data('gaji',$data);
		echo json_encode($status);
	}

	//update data
	function up_karyawan(){
		
		$username = $this->input->post('up_username'); 
		$nama = $this->input->post('up_nama'); 
		$tempat = $this->input->post('up_tempat'); 
		$tgl_lhr = $this->input->post('up_tgl_lhr'); 
		$telepon = $this->input->post('up_tlp'); 
		$jabatan = $this->input->post('up_jabatan'); 
		$email = $this->input->post('up_email'); 
		$nip = $this->input->post('up_nip'); 
		$alamat = $this->input->post('up_alamat'); 


		$config['upload_path']          = './upload/image/pegawai/';
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 1024;
		$config['remove_space']			= true;
		$config['encrypt_name'] 		= true;

		$this->load->library('upload', $config);
		$id = $this->uri->segment(3);

		$where = array('id_pegawai' => $id);
	
	 	
		if ($this->upload->do_upload("up_foto")) {

			$datafile = array('upload_data' => $this->upload->data());
			$nama_file = $datafile['upload_data']['file_name'];

		
				$data = array(
					'username' => $username,
					'nama' => $nama,
					'tempat_lahir' => $tempat,
					'tgl_lahir' => $tgl_lhr,
					'no_tlp' => $telepon,
					'jabatan' => $jabatan,
					'email' => $email,
					'nip' => $nip,
					'alamat' => $alamat,
					'image' => $nama_file
			 	);
			
			$status = $this->m_data->update_data('pegawai',$data,$where);
			echo json_encode($status);
			
		}else{
			$data = array(
					'username' => $username,
					'nama' => $nama,
					'tempat_lahir' => $tempat,
					'tgl_lahir' => $tgl_lhr,
					'no_tlp' => $telepon,
					'jabatan' => $jabatan,
					'email' => $email,
					'nip' => $nip,
					'alamat' => $alamat
			 	);
			$status = $this->m_data->update_data('pegawai',$data,$where);
				echo json_encode($status);
		}
		
		


		
	}
	function updata_gaji(){
		$nip = $this->uri->segment(3);

		$where = array('nip' => $nip );
		$data = array(
			'id_pegawai' => $this->input->post('up_karyawan'),
			'gaji_pokok' => $this->input->post('up_gaji'),
			'asuransi' => $this->input->post('up_asuransi'),
			'potongan' => $this->input->post('up_potongan')
		 );
		$status = $this->m_data->update_data('gaji',$data,$where);
		echo json_encode($status);
	}
	function update_qr_code(){

		$id = $this->uri->segment(3);
		$whereo = array('id_pegawai' => $id );
		$pegawai = $this->m_data->read_data_by('pegawai',$whereo)->result();
		foreach ($pegawai as $key) {
			$this->file_qr = $key->code_qr;
		}

			$presentase_data = 10;
			if (file_exists(FCPATH.'./upload/code_qr/'.$this->file_qr)) {
				@unlink(FCPATH.'./upload/code_qr/'.$this->file_qr);
			}
			
			//generate code qr
			$config['cacheable'] = true;
			$config['cachedir'] = '';
			$config['errorlog'] = '';
			$config['quality'] = true;
			$config['imagedir'] = './upload/code_qr/';
			$config['size'] = '1024';
			$config['black'] = array(224,255,255);
			$config['white'] = array(70,130,180);

			$this->ciqrcode->initialize($config);
			$rand_string = random_string(10);
			$image_name_qr_code = $rand_string.'.png';//
			
          
         
          	$time_data = date("Y-m-d");
          	
			$params['data'] = $rand_string;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name_qr_code;

			$this->ciqrcode->generate($params);


			$where = array('id_pegawai' => $id );
			$data = array(
				'code_qr' => $image_name_qr_code,
				'string_qr_code'=> $rand_string
			  );
			$this->m_data->update_data('pegawai',$data,$where);
			$presentase_data = $presentase_data + 10;
		
		echo json_encode($presentase_data);
	}
	//read_data
	
	function data_karyawan(){
		$data = $this->m_data->read_data('pegawai')->result();
		echo json_encode($data);
	}
	function data_karyawan_by($id){

		$where = array(
			'nip' => $id, 
			'periode' => $this->session->userdata('periode')
		);
		$data = $this->m_data->read_data_by('pegawai',$where)->result();
		echo json_encode($data);
	}

	function data_gaji_by(){

		$id = $this->uri->segment(3);
		$where = array('id_gaji' => $id );
		$data = $this->m_gaji->join_gaji_pegawai($where)->result();
		echo json_encode($data);

	}
	//delete
	function delete_karyawan($id){
		$where = array('id_pegawai' => $id );

		
		$data_delete = $this->m_data->read_data_by('pegawai',$where)->result();
		$config['imagedir'] = './upload/code_qr/';
		$config['imagedir2'] = './upload/image/pegawai/';
		
		foreach ($data_delete as $key) {
		 	$data_delete_image_pgw = $key->image;
		 	$data_delete_image_qr = $key->code_qr;
		 } 
		unlink(FCPATH.$config['imagedir2'].$data_delete_image_pgw);
		unlink(FCPATH.$config['imagedir'].$data_delete_image_qr);
		$status = $this->m_data->delete_data('pegawai',$where);
		echo json_encode($status);
	}
	function delete_gaji(){
		$id = $this->uri->segment(3);
		$where = array('id_pegawai' => $id );
		$status = $this->m_data->delete_data('gaji',$where);
		echo json_encode($status);
	}
	function jml_karyawan(){
		$data = $this->m_data->read_data('pegawai')->num_rows();
		echo json_encode($data);
	}


	//// report print

	function print_karyawan(){
		$this->load->view('layout_print/print_karyawan');
	}
	function print_gaji(){
		$this->load->view('layout_print/print_gaji');
	}
	//logout
	public function logout(){
        $this->session->sess_destroy();
        redirect(base_url()."login");
   }
   function ganti_pass(){
       $this->load->view('ganti_password');
   }
   function detail_pegawai($nip){
   		// $this->encryption->_mcrypt_exists = true;
   		// var_dump($this->encryption->decrypt($nip));
   		// 	die();

      	$data['active_link'] = 1;
		$data['breadcump'] = array("Beranda","Karyawan","Detail Karyawan");
		$this->db->select("*");
		$this->db->from('pegawai');
		$this->db->where('nip', $nip);
		$data['pegawai'] = $this->db->get()->row();
		$this->load->view('detail_pegawai',$data);
   }

	
}
