<?php

/**
 * 
 */
class M_data extends CI_Model{

	function read_data($table){
		return $this->db->get($table);
	}
	function read_data_limit($table,$limit,$start,$kolom){
		$this->db->order_by($kolom,'DESC');
		return $this->db->get($table,$limit,$start);
	}
	function read_data_by($table,$where){
		return $this->db->get_where($table,$where);
	}
	function add_data($table,$data){
		$this->db->insert($table,$data);
	}
	function delete_data($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function delete_data_all($table){
		return $this->db->empty_table($table);
	}
	function update_data($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function seacrh_data_qrcode($table,$value){

		$this->db->select("*");
		$this->db->from($table);
		$this->db->like("nama",$value);
		return $this->db->get();
	}
	
	function join_table_2_left($tamp_kolom,$from_table,$data_join){
		$this->db->select($tamp_kolom);//colom yang di tampilkan
		$this->db->from($from_table);//'table_1'
		$this->db->join($data_join);//('table_1','table_2.id_table_1 = table_1.id_table_1','left')
		
		return $this->db->get()->result();
	}
	function data_ruser(){
		$this->db->select('*');//colom yang di tampilkan
		$this->db->from('riwayat_login');//'table_1'
		$this->db->join('m_users','riwayat_login.id_user = m_users.id_users','right');
		$this->db->order_by('id_rlogin', 'desc');
		$this->db->limit(3);
		return $this->db->get()->result();
	}
	function berita_acara($table){
		$this->db->select("*");
		$this->db->from($table);
		$this->db->order_by('id_berita', 'desc');
		return $this->db->get();
	}
}