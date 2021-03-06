<?php 

/**
 * 
 */
class M_absensi extends CI_Model{
	function getDataAll(){
		$periode = $this->session->userdata('periode');
		// SELECT * FROM `riwayat_absensi` INNER JOIN pegawai ON pegawai.id_pegawai = riwayat_absensi.id_pegawai 
		$this->db->select("*");
		$this->db->from("riwayat_absensi");
		$this->db->join("pegawai","riwayat_absensi.id_pegawai = pegawai.id_pegawai","left");
		$this->db->where('periode',$periode);
		return $this->db->get();
	}
	// function read_data_absensi(){
	// 	$this->db->select("*");
	// 	$this->db->from("absensi");
	// 	$this->db->join("pegawai","riwayat_absensi.id_karyawan = pegawai.id_pegawai","left");
	// 	return $this->db->get();

	// }

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

	

}
