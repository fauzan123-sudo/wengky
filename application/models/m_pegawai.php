<?php 

/**
 * 
 */
class M_pegawai extends CI_Model{
	
	 var $table = "pegawai";  
   var $select_column = array("id_pegawai", "nama", "tempat_lahir", "tgl_lahir","alamat","email","no_tlp","jabatan","nip","username","image","code_qr","periode");  
   var $order_column = array(null, "nama", "tempat_lahir",null,null,null,null,null,"username",null, null,null); 

    
       function getData($postData=null){
        $response = array();

           ## Read value
           $draw = $postData['draw'];
           $start = $postData['start'];
           $rowperpage = $postData['length']; // Rows display per page
           $columnIndex = $postData['order'][0]['column']; // Column index
           $columnName = $postData['columns'][$columnIndex]['data']; // Column name
           $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
           $searchValue = $postData['search']['value']; // Search value

           ## Search 
           $searchQuery = "";
           if($searchValue != ''){
              $searchQuery = " (nama like '%".$searchValue."%' or nip like '%".$searchValue."%' ) ";
           }

           ## Total number of records without filtering
           $this->db->select('count(*) as allcount');
           $this->db->from('riwayat_absensi');
           $this->db->join("pegawai","pegawai.id_pegawai = riwayat_absensi.id_pegawai");
           $records = $this->db->get()->result();
           $totalRecords = $records[0]->allcount;

           ## Total number of record with filtering
           $this->db->select('count(*) as allcount');
           $this->db->from('riwayat_absensi');
           $this->db->join("pegawai","pegawai.id_pegawai = riwayat_absensi.id_pegawai");
           if($searchQuery != '')
              $this->db->where($searchQuery);
           $records = $this->db->get()->result();
           $totalRecordwithFilter = $records[0]->allcount;

           ## Fetch records
           $this->db->select('*');
           $this->db->from('riwayat_absensi');
           $this->db->join("pegawai","pegawai.id_pegawai = riwayat_absensi.id_pegawai");
           if($searchQuery != '')
              $this->db->where($searchQuery);
           $this->db->order_by($columnName, $columnSortOrder);
           $this->db->limit($rowperpage, $start);
           $records = $this->db->get()->result();

           $data = array();

           foreach($records as $record ){
            $time = time_indo_convert($record->jam);
              $data[] = array( 
                 "jam"=>$time[1],
                 "tanggal"=>$time[0],
                 "nama"=>$record->nama,
                 "nip"=>$record->nip,
                 "lokasi"=>'<small><a class="btn btn-warning btn-sm" target="_blank" href="'.$record->lokasi.'"><i class="fas fa-map-marker-alt"></i> Cek Lokasi</a></small>',
              ); 
           }

           ## Response
           $response = array(
              "draw" => intval($draw),
              "iTotalRecords" => $totalRecords,
              "iTotalDisplayRecords" => $totalRecordwithFilter,
              "aaData" => $data
           );

           return $response;
      }
       
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data(){  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function get_data_max(){
          $this->db->select_max("id_pegawai");
          $this->db->get("pegawai");
      }

      function getDataBy($where){
          $this->db->select("*");
          $this->db->from('pegawai');
          $this->db->where('id_pegawai',$where);
          $this->db->where('periode',$this->session->userdata('periode'));

          return $this->db->get();
      }
       function getDataAll(){
          $this->db->select("*");
          $this->db->from('pegawai');
          $this->db->where('periode',$this->session->userdata('periode'));
          return $this->db->get();
      }
}