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
	function addData($data){
		$this->db->insert('m_periode',$data);
		return $this->db->affected_rows();
	}
	function getDataBy($data){
		$this->db->select("*");
		$this->db->from("m_periode");
		$this->db->where("id_periode",$data);
		return $this->db->get();
	}
	function updateData($data,$by){

		$this->db->set($data);
		$this->db->where("id_periode",$by);
		$this->db->update("m_periode");
		return $this->db->affected_rows();
	}
	function deleteData($id){
		$this->db->where("id_periode",$id);
		$this->db->delete("m_periode");
		return $this->db->affected_rows();
		
	}

}