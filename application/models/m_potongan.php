<?php


/**
 * 
 */
class M_potongan extends CI_Model{
	function addData($data){
		$this->db->insert('potongan',$data);
		return $this->db->affected_rows();
	}
	function getData(){
		$this->db->select("*");
		$this->db->from("potongan");
		return $this->db->get();
	}
	function getDataBy($data){
		$this->db->select("*");
		$this->db->from("potongan");
		$this->db->where("id_potongan",$data);
		return $this->db->get();
	}
	function updateData($data,$by){

		$this->db->set($data);
		$this->db->where("id_potongan",$by);
		$this->db->update("potongan");
		return $this->db->affected_rows();
	}
	function deleteData($id){
		$this->db->where("id_potongan",$id);
		$this->db->delete("potongan");
		return $this->db->affected_rows();
		
	}
}