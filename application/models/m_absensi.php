<?php 

/**
 * 
 */
class M_absensi extends CI_Model{
	function read_data_absensi(){
		$this->db->select("*");
		$this->db->from("absensi");
		return $this->db->get();
	}
	// function read_data_absensi(){
	// 	$this->db->select("*");
	// 	$this->db->from("absensi");
	// 	$this->db->join("pegawai","riwayat_absensi.id_karyawan = pegawai.id_pegawai","left");
	// 	return $this->db->get();

	// }

}