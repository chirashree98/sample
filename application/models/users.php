
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Model {

public function insert($data,$table) {
		
		if($insert = $this->db->insert($table, $data))
        {
            return true;
        }
		
		
}public function getproduct($postData=null){
	ini_set('display_errors', '0'); 
	 error_reporting(E_ALL);
     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; 
     $columnIndex = $postData['order'][0]['column']; 
     $columnName = $postData['columns'][$columnIndex]['data']; 
     $columnSortOrder = $postData['order'][0]['dir']; 
     $searchValue = $postData['search']['value']; 

     ## Search 
     $searchQuery = "";
     if($searchValue != ''){
        $searchQuery = " (name like '%".$searchValue."%' or description like '%".$searchValue."%' or price like'%".$searchValue."%' ) ";
	 }
	 
	 	
	
     ## Total number of records without filtering
	 $this->db->select('count(*) as allcount');
	 if($_SESSION['id']){
	  $this->db->where('user_id',$_SESSION['id']);
	 }
     $records = $this->db->get('product')->result();
     $totalRecords = $records[0]->allcount;
	 	
     ## Total number of record with filtering
	 $this->db->select('count(*) as allcount');  
	 //$this->db->where('user_id',$user_id);
	 if($_SESSION['id']){
		$this->db->where('user_id',$_SESSION['id']);
	   }
     if($searchQuery != '')
		
        $this->db->where($searchQuery);
     $records = $this->db->get('product')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
        $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder); //$this->db->where('user_id',$user_id);
	 //$this->db->where('user_id',$user_id);
	 if($_SESSION['id']){
		$this->db->where('user_id',$_SESSION['id']);
	   }
	$this->db->limit($rowperpage, $start);
     $records = $this->db->get('product')->result();

     $data = array();

     foreach($records as $record ){

        $data[] = array( 
			"id"=>$record->id,
           "name"=>$record->name,
           "image"=>$record->image,
           "description"=>$record->description,
           "price"=>$record->price,
			'user_id'=>$record->user_id
           
        ); 
     }

     ## Response
     $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
     );

     return $response; 
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
