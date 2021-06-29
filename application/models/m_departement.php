<?php


/**
 * 
 */
class M_departement extends CI_Model{
	function addData($data){
		$this->db->insert('m_departement',$data);
		return $this->db->affected_rows();
	}
	function getData(){
		$this->db->select("*");
		$this->db->from("m_departement");
		return $this->db->get();
	}
	function getDataBy($data){
		$this->db->select("*");
		$this->db->from("m_departement");
		$this->db->where("id_departement",$data);
		return $this->db->get();
	}
	function updateData($data,$by){

		$this->db->set($data);
		$this->db->where("id_departement",$by);
		$this->db->update("m_departement");
		return $this->db->affected_rows();
	}
	function deleteData($id){
		$this->db->where("id_departement",$id);
		$this->db->delete("m_departement");
		return $this->db->affected_rows();
		
	}
}