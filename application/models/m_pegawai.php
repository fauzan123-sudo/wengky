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
           $this->db->from('pegawai');
   
           $records = $this->db->get()->result();
           $totalRecords = $records[0]->allcount;

           ## Total number of record with filtering
           $this->db->select('count(*) as allcount');
           $this->db->from('pegawai');
   
           if($searchQuery != '')
              $this->db->where($searchQuery);
           $records = $this->db->get()->result();
           $totalRecordwithFilter = $records[0]->allcount;

           ## Fetch records
           $this->db->select('*');
           $this->db->from('pegawai');
   
           if($searchQuery != '')
              $this->db->where($searchQuery);
              $this->db->order_by('nama', $columnSortOrder);
              $this->db->limit($rowperpage, $start);
           $records = $this->db->get()->result();

           $data = array();
           $no = 1;
           foreach($records as $row){  
                  $date = time_indo_convert($row->tgl_lahir);
                  $data[] = array(
                    'no' => $no,
                    'nip' => $this->security->xss_clean($row->nip),
                    'nama' => $this->security->xss_clean($row->nama),
                    'tanggal_lahir' => $this->security->xss_clean($date[0]),
                    'email' => $this->security->xss_clean($row->email),
                    'telepon' => $this->security->xss_clean($row->no_tlp),
                    'jabatan' => $this->security->xss_clean($row->jabatan),
                    'action' => '<button type="button" name="update" id="'.$row->nip.'"  class="btn btn-sm edit mr-2"><i class="fa fa-edit fa-sm"></i>
                            </button>'.'<button type="button" name="delete" id="'.$row->nip.'" class="btn btn-sm delete-data btn-transparent"><i class="fa fa-trash fa-sm" aria-hidden="true"></i>
                            </button>
                            <a href="'.base_url().'index.php/admin/detail_pegawai/'.$row->nip.'" name="detail" id="'.$row->nip.'" class="btn btn-sm  btn-transparent"><i class="fa fa-info fa-sm" aria-hidden="true"></i>
                            </a>',
                  );
                  $no++;
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