<?php



(defined('BASEPATH')) OR exit('No direct script access allowed');

if (!isset($_SESSION)) {
    session_start();
} 

class Pnp_model extends CI_Model
{
    function __construct() {
        parent::__construct();
        
        // kahit hindi ka na mag load ng database kasi naka load naman ito automatically sa autoload
        // unless gagamit ka ng multi database
    }
    public function create_wanted($data)
    {
        $this->db->insert('tbl_wanted', $data);  
        return ($this->db->affected_rows() == 1) ? TRUE : FALSE; // kung may na update > True, kung wala > false
        
        
    } 
    
        public function create_most_wanted($data)
    {
        $this->db->insert('tbl_top_ten', $data);
        return($this->db->affected_rows() == 1) ? TRUE : FALSE;
         
    }
    public function read_users()
    {
        $query = $this->db->get('tbl_user');
        return $query->result();
    }
    
    public function read_wanted()
    {
        
        $query = $this->db->get('tbl_wanted');
        return $query->result();
    }
    


    public function search_wanted()
    {
        $match = $this->input->get('txtSearch');
        
        $this->db->or_like('first_name', $match);
        $this->db->or_like('last_name', $match);
        $this->db->or_like('middle_name', $match);
        $this->db->or_like('alias', $match);
        $this->db->or_like('station', $match);
        $query = $this->db->get('tbl_wanted');
        return $query->result();
    }
   
    function delete_wanted($wanted_id)
    {
           $this->db->where('wanted_id',$wanted_id);
           $this->db->delete('tbl_wanted');

            return ($this->db->affected_rows() == 1) ? TRUE : FALSE; 
    }
    
    function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_user');
        
        return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
    }
    
    function delete_most_wanted($wanted_id)
    {
            $this->db->where('topten_id', $wanted_id);
            $this->db->delete('tbl_top_ten');
            
            return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
    }

    function get_update_wanted($wanted_id)
    {
        $this->db->where('wanted_id', $wanted_id);
        $this->db->get(tbl_wanted)->row_array();
    }
   
    function update_wanted($wanted_id, $data)
    {

        $this->db->where('wanted_id', $wanted_id);
        $this->db->update('tbl_wanted', $data);
        
        return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
    }
    
    function update_most_wanted($most_wanted_id, $data)
    {
        $this->db->where('topten_id', $most_wanted_id);
        $this->db->update('tbl_top_ten', $data);
        
        return ($this->db->affected_rows() == 1) ? TRUE : FALSE;
    }
    
    function get_wanted_info($wanted_id)
   { 
      $this->db->where('wanted_id',$wanted_id); 
      return $this->db->get('tbl_wanted')->row_array();
   }
   
   function get_most_wanted_info($most_wanted_id)
   {
       $this->db->where('topten_id', $most_wanted_id);
       return $this->db->get('tbl_top_ten')->row_array();
   }
   /* START CODE
    * module: Login
    */
   
    public function convert_to_hash($password)
    {
        return hash_hmac('sha256', $password, ')zb803,&*#$(Iw_QxTroPb=98$#+=@%');
    }
    
    public function check_credential($username, $password)
    { 
        $md5_password = $this->convert_to_hash($password);
        $this->db->where('username',$username);
        $this->db->where('password',$md5_password);
        return ($this->db->get('tbl_user')->num_rows() == 1) ? true : false;  
    }
    
    public function get_user_info($username)
    {
        $this->db->where('username',$username);
        $this->db->limit(1);
        return $this->db->get('tbl_user')->result();
    }
    
    public function create_user($data)
    {
        $this->db->insert('tbl_user', $data);  
        return ($this->db->affected_rows() == 1) ? TRUE : FALSE; 
    }
   
    public function old_wanted_file($wanted_id)
    {
        $this->db->where('wanted_id', $wanted_id);
        $this->db->select('image_path');
        $query = $this->db->get('tbl_wanted');
        $ret = $query->row();
        return (count($ret) > 0)? $ret->image_path : 'no_picture.jpg';
        
    }
    
    public function old_most_wanted_file($most_wanted_id)
    {
        $this->db->where('topten_id', $most_wanted_id);
        $this->db->select('image_path');
        $query = $this->db->get('tbl_top_ten');
        $ret = $query->row();
        return (count($ret) > 0)? $ret->imaget_path : 'no_picture.jpg';
        
        
    }
     
 
    // END CODE
  
    function check_username($user_name=''){
        $this->db->select('user_id');
        $this->db->from('tbl_user');
        $this->db->where('username', $user_name);
        $query = $this->db->get();
        $result= $query->result();
        return ( count($result) >= 1) ? TRUE :FALSE;
    }
    
    function check_email($email){
		$this->db->select('emailaddress');  
		$this->db->from('tbl_user');
		$this->db->where('emailaddress', $email);
		$query = $this->db->get();
		return $query->num_rows();
		
	}
    
    function get_all(){
        $query = $this->db->get('home');
        return $query->result();
    }
    
    public function get_station($station){
        
        $this->db->where('station', $station);
        $this->db->order_by('rank', 'asc');
        $query = $this->db->get('tbl_top_ten', 10);
        return $query->result();
        
    }
 
}

