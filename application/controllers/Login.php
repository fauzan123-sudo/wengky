<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    var $status;
    var $id_users;
    var $dataResult;
    function __construct(){
        parent::__construct();
        if ($this->session->userdata("Status") == "login" ) {
            redirect(base_url());
        }
    }
   function index(){
       $this->load->view("login");
   }
   function proseslogin(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $where = array(
        "username" => $username,
        "password" => sha1($password)
    );


    $data = $this->m_data->read_data_by('m_users',$where)->result();
    $date = date('Y-m-d');
    
    if(count($data) != 0){
        foreach($data as $key){
            $id_users = $key->id_users;
            $nama = $key->nama;
            $username = $key->username;
        };
        $userdata = array(
            'Nama' =>  $nama,
            'Status' =>  "login",
            'Tanggal' => $date
        );
        $data_rlogin = array('id_user' => $id_users );

        $statuslogin = $this->m_data->add_data('riwayat_login',$data_rlogin);

        $data_hl = array('id_users' => $id_users,'date' => $date);
        $where_id = array('id_users' =>  1);


        $data_cek_date = $this->m_data->read_data("h_login",$where_id)->result();
        foreach ($data_cek_date as $key ) {
           $date_cek = $key->date;
        }
        
        // //insert data riwayat absensi ke absensi
        // if ($date_cek !=  $date) {
        //     $this->m_data->update_data('h_login',$data_hl,$where_id);
        //     $data = $this->m_data->read_data('riwayat_absensi')->result();
        //     foreach ($data as $key) {
        //         $where_id = array('id_pegawai' => $key->id_karyawan);
        //         $data_pegawai = $this->m_data->read_data_by('pegawai',$where_id)->result();
        //         foreach ($data_pegawai as $value) {
        //            $nama_karyawan = $value->nama;
        //         }
        //         $day = date("s", strtotime($key->jam));
        //         $this->dataResult[] = array('nama'=>$nama_karyawan, 'hari' =>  $day, 'status'=> $key->status);
        //     }
        //     $dataResultfix = json_encode(array($this->dataResult));
        //     $hari = date('l');

        //     $hari_indo = array('Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday'=> 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu' );
        //     $hari_indo_fix = $hari_indo[$hari];

        //     $dataResult_fix_fix = array('hari' =>$hari_indo_fix, 'all_data' => $dataResultfix );
        //     $this->m_data->add_data('absensi',$dataResult_fix_fix);
        // }


        $this->session->set_userdata($userdata);
        $status = 1;
        echo json_encode($status);
    }else{
        $status = 0;
        echo json_encode($status);
    }
    
    
   }
   
  
}