<?php

/**
 * 
 */
class M_absensi_commit extends CI_Model{
	var $table = 'absen_commit';
	function getDataBy($where){
		$periode = $this->session->userdata('periode');
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_pegawai',$where);
		$this->db->where('periode',$periode);
		return $this->db->get();
	}
	function addData($data){
		$this->db->insert($this->table,$data);
	}
	function updateData($data,$id){

		$periode = $this->session->userdata('periode');
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_pegawai',$where);
		$this->db->where('periode',$periode);
		return $this->db->get();
	}
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
	     $this->db->from('absen_commit');
	     $this->db->join("pegawai","pegawai.id_pegawai = absen_commit.id_pegawai");
	     $records = $this->db->get()->result();
	     $totalRecords = $records[0]->allcount;

	     ## Total number of record with filtering
	     $this->db->select('count(*) as allcount');
	     $this->db->from('absen_commit');
	     $this->db->join("pegawai","pegawai.id_pegawai = absen_commit.id_pegawai");
	     if($searchQuery != '')
	        $this->db->where($searchQuery);
	     $records = $this->db->get()->result();
	     $totalRecordwithFilter = $records[0]->allcount;

	     ## Fetch records
	     $this->db->select('*');
	     $this->db->from('absen_commit');
	     $this->db->join("pegawai","pegawai.id_pegawai = absen_commit.id_pegawai");
	     if($searchQuery != '')
	        $this->db->where($searchQuery);
	     $this->db->order_by($columnName, $columnSortOrder);
	     $this->db->limit($rowperpage, $start);
	     $records = $this->db->get()->result();

	     $data = array();

	     foreach($records as $record ){
	     
	        $data[] = array( 
	           "nama"=>$record->nama,
	           "nip"=>$record->nip,
	           "masuk"=>$record->masuk,
	           "tidak_masuk"=>$record->tidak_masuk,
	           "sakit"=>$record->sakit,
	           "izin"=>$record->izin,
	           "telat"=>$record->telat,
	           "tugas"=>$record->tugas,
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
}