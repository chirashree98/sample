
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model {

public function insert($data,$table) {
		
		if($insert = $this->db->insert($table, $data))
        {
            return true;
        }
		
		
}


public function phone_check($phone){
	$this->db->where('phoneno',$phone);
	$this->db->from('user');
	$query=$this->db->get();
	$num= $query->num_rows();
	return $num;
}
public function email_check($username){
	$this->db->where('username',$username);
	$this->db->from('user');
	$query=$this->db->get();
	$num= $query->num_rows();
	return $num;
}
public function fetch($table,$cond,$where,$id,$cond2){
	$this->db->select('*');
	$this->db->from($table);
	if(!empty($where))
	$this->db->where($where,$cond);
	$this->db->order_by($id,$cond2);
	//$this->db->order_by($order,$condition);
	$query = $this->db->get();
	$query2['data'] =$query->result_array();
	return $query2;
}
public function fetchs($table,$cond,$where){
	$this->db->select('*');
	$this->db->from($table);
	if(!empty($where))
	$this->db->where($where,$cond);
	
	//$this->db->order_by($order,$condition);
	$query = $this->db->get();
	return $query->result_array();
}
public function delete_product($table,$field,$id)
{
	$this->db->where($id,$field);
	$this->db->delete($table);
}
public function edit_product($table,$data,$id,$field)
{
	$this->db->where($id,$field);
	$this->db->update($data,$table);
}



public function can_login($username,$password) {
	$this->db->select('*');
	$this->db->where('username',$username);
	$this->db->where('password',$password);
	
	$query=$this->db->get('user'); 
	$result= $query->num_rows();
	if($result == 0){
		return False;
	}
	else {
	$data = $query->result_array();
	$id= $data[0]['id'];
	$name=$data[0]['name'];
	$phone =$data[0] ['phoneno'];
	$username =$data[0]['username'];
	$password = $data[0]['password'];
	
	$this->session->set_userdata('id',$id);
	$this->session->set_userdata('name',$name);
	$this->session->set_userdata('phoneno',$phone);
	$this->session->set_userdata('username',$username);
	$this->session->set_userdata('password',$password);

	$this->session->set_userdata('is_logged_in',true);
	return True;
	}
}
}
?>