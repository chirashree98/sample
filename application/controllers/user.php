
  
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

		public function __construct() {
			parent :: __construct();
			$this->load->helper('url','form');
			$this->load->helper('cookie');
			$this->load->library('form_validation');
			
			date_default_timezone_set('Asia/Kolkata');
			$this->load->model('users');
		}
		
		
		public function email_avilable(){
			 $username = $this->input->post('email');
			if(!(filter_var($username, FILTER_VALIDATE_EMAIL)))  
           {  
			   
                echo '<span style="color:red"> Invalid Email</span></label>';  
           }  
           else  
           {  
			
                if($this->users->email_check($username)) 
                {  
                     echo '<span style="color:red"> Email Already register</span>';  
                }  
                
                

           } 
            
		}
		public function phone_avilable(){
			$phone =$this->input->post('phone');
			 $length = strlen($phone);
			 if($length != 10){
			//if(filter_var($phone,regex_match[/^[0-9]{10}$/])){
			 	echo '<span style="color:red"> Invalid phone Number</span>'; 
			 }
			 if($this->users->phone_check($phone)){
			 	echo '<span style="color:red"> Phone Number Already register</span>';  
			 }
		}
	public function registration() {
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			 if($confirmpassword ==  $password ){
		$data=array(
		          	'username'=>$this->input->post('username'),
						'phoneno'=>$this->input->post('phone'),
						'password'=>md5($this->input->post('password')),
						'name'=>$this->input->post('name'),
						
					);
		
			$this->users->insert($data,'user');		
		//if($this->users->insert($cart)){

		}
               // $data['flash2']='existing';
               //echo "Email allready exist"; 
         //}
	redirect('registration');
}
$this->load->view('user_registration');
}

	public function add_product() {
		
		$id= $_SESSION['id'];
		
		if($id){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			
		if($_FILES['images']['name']!=''){
				if(!is_dir('images/')) {
							umask(0);
							mkdir('images/',0777);
				}
				$time=time();
				$config['upload_path'] = 'images/';
				$config['file_name'] = $time."_".$_FILES['images']['name'];
				$UploadFile=$config['file_name'];
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['image_library'] = 'gd2';
				$config['overwrite'] = TRUE;
				$config['encrypt_name'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload',$config);
				if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST"); 
				if ( ! $this->upload->do_upload('images')){
							echo 'error';
				} else {
					$this->upload->initialize($config);
					$source_image=realpath('images/'.$UploadFile);
					$config['image_library']   = 'gd2';
					$config['source_image']    = $source_image;
					$config['create_thumb']    = TRUE;
					$config['maintain_ratio']  = FALSE;
					$config['new_image']       =    'images/'.$time."_".$_FILES['images']['name'];
					$config['thumb_marker']    = '';
							//$product_small_image=thumb_'.$time."_".$_FILES['small_image']['name'];
	
							$this->load->library('image_lib',$config);
	
							if ( ! $this->image_lib->resize())
							{
							$data['error'] = strip_tags($this->image_lib->display_errors());
	
							}
							$this->image_lib->clear();
	
	
							$source_image=realpath('images/'.$UploadFile);
							$config['image_library']   = 'gd2';
							$config['source_image']    = $source_image;
							$config['create_thumb']    = TRUE;
							$config['maintain_ratio']  = FALSE;
							$config['new_image']       =    'images/thumb/'.$time."_".$_FILES['images']['name'];
							$config['thumb_marker']    = '';
							//$product_small_image=thumb_'.$time."_".$_FILES['small_image']['name'];
							$this->image_lib->initialize($config);
	
							if ( ! $this->image_lib->resize())
							{
							$data['error'] = strip_tags($this->image_lib->display_errors());
							}
							$this->image_lib->clear();
						   }
					}
				
		$data=array(
		          	'name'=>$this->input->post('name'),
						'description'=>$this->input->post('description'),
						'price'=>$this->input->post('price'),
						'image'=>$UploadFile,
						'user_id'=>$id
						
					);
		
			$this->users->insert($data,'product');		
		
redirect('product');
		}
               
	$this->load->view('add_product');

}
else{
	$this->load->view('index');
}

}

	
	public function signin() {
	error_reporting(0);
	ini_set('display_errors', 1);
	if($this->input->server('REQUEST_METHOD')==='POST'){
		$username = $this->input->post('username');
      	 $password = md5($this->input->post('password'));
		$valid = $this->users->can_login($username,$password);
		if(!empty($valid)){
			redirect('product');
		}
		else{
		$data['flash_message'] =FALSE;
		}
	}
		$this->load->view('index',$data);
	}
	

	public function delete_product(){
		$userdata = $this->session->all_userdata();
		$id =$this->uri->segment(2);
		if(!$id){
			redirect(base_url());
		}
		else{
		$this->users->delete_product('product',$id,'id');
		redirect('product');
		}
	}
	public function edit_product(){
		$id = $this->uri->segment(2);
		$userid =$_SESSION['id'];
		if($userid){
		if($this->input->server('REQUEST_METHOD')==='POST'){
			$id = $this->uri->segment(2);
			if($_FILES['images']['name']!=''){
				if(!is_dir('images/')) {
							umask(0);
							mkdir('images/',0777);
				}
				$time=time();
				$config['upload_path'] = 'images/';
				$config['file_name'] = $time."_".$_FILES['images']['name'];
				$UploadFile=$config['file_name'];
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['image_library'] = 'gd2';
				$config['overwrite'] = TRUE;
				$config['encrypt_name'] = FALSE;
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload',$config);
				if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST"); 
				if ( ! $this->upload->do_upload('images')){
							echo 'error';
				} else {
					$this->upload->initialize($config);
					$source_image=realpath('images/'.$UploadFile);
					$config['image_library']   = 'gd2';
					$config['source_image']    = $source_image;
					$config['create_thumb']    = TRUE;
					$config['maintain_ratio']  = FALSE;
					$config['new_image']       =    'images/'.$time."_".$_FILES['images']['name'];
					$config['thumb_marker']    = '';
							//$product_small_image=thumb_'.$time."_".$_FILES['small_image']['name'];
	
							$this->load->library('image_lib',$config);
	
							if ( ! $this->image_lib->resize())
							{
							$data['error'] = strip_tags($this->image_lib->display_errors());
	
							}
							$this->image_lib->clear();
	
	
							$source_image=realpath('images/'.$UploadFile);
							$config['image_library']   = 'gd2';
							$config['source_image']    = $source_image;
							$config['create_thumb']    = TRUE;
							$config['maintain_ratio']  = FALSE;
							$config['new_image']       =    'images/thumb/'.$time."_".$_FILES['images']['name'];
							$config['thumb_marker']    = '';
							//$product_small_image=thumb_'.$time."_".$_FILES['small_image']['name'];
							$this->image_lib->initialize($config);
	
							if ( ! $this->image_lib->resize())
							{
							$data['error'] = strip_tags($this->image_lib->display_errors());
							}
							$this->image_lib->clear();
						   }
						 
					}
					  else{
						echo $UploadFile=$this->input->post('upload');
						
					}
				
		$data=array(
		          	'name'=>$this->input->post('name'),
						'description'=>$this->input->post('description'),
						'price'=>$this->input->post('price'),
						'image'=>$UploadFile,
						'user_id'=>$userid
						
					);
		
			$this->users->edit_product($data,'product','id',$id);		
		
redirect('product');
		}
$data['fetch'] =$this->users->fetchs('product',$id,'id');
		$this->load->view('edit_product',$data);
		}
		
		
		else{
	$this->load->view('index');
}

	}
	public function index()
	{
		$this->load->view('index');
	}
	public function product(){
		$user_id = $this->session->all_userdata();
		$id = $_SESSION['id'];
		if($id){
	
		 
		
		$this->load->view('product');
		}

	}
	public function fetch_product_json(){
		$user_id = $this->session->all_userdata();
		$id = $_SESSION['id'];
		if($id){
	
		 $data['fetch3']= json_encode($this->users->fetch('product',$id,'user_id','id','desc'));
		
		$this->load->view('json/test_json',$data);
		}

	}
	
	public function logouts () {
	$this->session->set_userdata('username', '');
	$this->session->set_userdata('id', '');
	$this->session->set_userdata('password', '');
	redirect(base_url());
    }
}
?>