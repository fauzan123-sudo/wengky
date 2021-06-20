<?php 

/**
 * 
 */
class M_berita extends CI_Model{
	
	var $table = "berita_acara";  
   var $select_column = array("id_berita","title","isi","image");  
   var $order_column = array(null, "title","isi",null); 

    
   function make_query() {  
       $this->db->select($this->select_column);  
       $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  {  
              $this->db->like("title", $_POST["search"]["value"]);  
              $this->db->or_like("isi", $_POST["search"]["value"]);  

                
         }  


         if(isset($_POST["order"]))  {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }else{  
              $this->db->order_by('id_berita', 'DESC');  
         }  
      }
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
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
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function get_data_max(){
          $this->db->select_max("id_berita");
          $this->db->get("berita_acara");
       

      }
}