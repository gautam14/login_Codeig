<?php
//User model
class User_model extends CI_model {

	public function index(){
		die("User model");

	}
	public function user_register($u_data){
		$this->db->insert("user", $u_data);

	}
	public function add_record($data){

		$this->db->insert("records", $data);
		$this->db->trans_complete();

           if ($this->db->trans_status() === FALSE) {
               return "error";
           } else {
               return "success";
           }
	}

	public function get_records_count(){
		$query = $this->db->count_all("records");
		return $query;
		
	}

	public function get_all_records($limit,$start,$order,$dir){
		$query = $this->db->limit($limit,$start)->order_by($order,$dir)->get('records');
		if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }

	}

	public function get_search_records($limit,$start,$search,$order,$dir){
		$query = $this->db->like('name',$search)->or_like('position',$search)->or_like('office',$search)->limit($limit,$start)->order_by($order,$dir)->get('records');
		//echo $this->db->last_query();
		//die("test");
		if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }

	}

	public function search_record_count($search){
		$query = $this->db->like('name',$search)->or_like('position',$search)->or_like('office',$search)->get('records');
    
        return $query->num_rows();
		//return $query;

	}
	public function update_record($user_id){
		$query = $this->db->get_where('records', array('id' => $user_id));
		if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
	}

	public function update_user_record($data){		
		$this->db->where('id', $data['id'])->update('records', $data);
		$this->db->trans_complete();

           if ($this->db->trans_status() === FALSE) {
               return "edit_error";
           } else {
               return "edit_success";
           }

	}

	public function delete_user($user_id){
		//echo "delete user ".$user_id;
		$this->db->where('id', $user_id)->delete('records');
		// $this->db->trans_complete();

  //          if ($this->db->trans_status() === FALSE) {
  //              return "delete_error";
  //          } else {
  //              return "delete_success";
  //          }
		
	}

}
?>