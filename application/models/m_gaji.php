<?php


/**
 * 
 */
class M_gaji extends CI_Model{

  	var $select_column = array("id_gaji","gaji_pokok","nama","nip","gaji_bersih");  
   	var $order_column = array(null,"gaji_pokok","nama","nip",null,"gaji_bersih"); 

    
   	function make_query() {  
       $this->db->select($this->select_column);  
       $this->db->from('gaji'); 
       $this->db->join('pegawai','gaji.id_pegawai=pegawai.id_pegawai','left');
       $this->db->where('periode',$this->session->userdata('periode'));

         if(isset($_POST["search"]["value"]))  {  
              $this->db->like("nama", $_POST["search"]["value"]);  
              $this->db->or_like("gaji_pokok", $_POST["search"]["value"]);   
              $this->db->or_like("nip", $_POST["search"]["value"]);   
         }  


         if(isset($_POST["order"]))  {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }else{  
              $this->db->order_by('id_gaji', 'DESC');  
         }  
      }
    function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1){  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
    function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
    function get_all_data(){  
           $this->db->select($this->select_column);  
           $this->db->from("gaji");  
           return $this->db->count_all_results();  
      }
      function join_gaji_pegawai($where){
          $this->db->select("*");
          $this->db->from("gaji");
          
          $this->db->join("pegawai","gaji.id_pegawai=pegawai.id_pegawai","left");
          $this->db->where($where);
          return $this->db->get();

        }  
}