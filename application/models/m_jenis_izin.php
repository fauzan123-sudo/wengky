<?php


/**
 * 
 */
class M_jenis_izin extends CI_Model{
	function addData($data){
		$this->db->insert('m_jenis_izin',$data);
	}
	function getData(){
		$this->db->select("*");
		$this->db->from("m_jenis_izin");
		return $this->db->get();
	}
	function getDataBy($data){
		$this->db->select("*");
		$this->db->from("m_jenis_izin");
		$this->db->where("id_jenis_izin",$data);
		return $this->db->get();
	}
	function updateData($data,$by){

		$this->db->set($data);
		$this->db->where("id_jenis_izin",$by);
		$this->db->update("m_jenis_izin");
		return $this->db->affected_rows();
	}
	function deleteData($id){
		$this->db->where("id_jenis_izin",$id);
		$this->db->delete("m_jenis_izin");
		return $this->db->affected_rows();
		
	}
}