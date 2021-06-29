<?php 

/**
 * 
 */
class M_periode extends CI_Model{
	
	function getDataAll(){
		$this->db->select("*");
		$this->db->from("m_periode");
		return $this->db->get();
	}
	function getDataLast(){
		$this->db->select("kode");
		$this->db->from("m_periode");
		$this->db->order_by("id_periode","desc");
		return $this->db->get()->row();
	}

}