<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login1 extends CI_Controller {



	function __construct()
    {
		
        parent::__construct();
		$this->load->library('session');
    	$this->load->model('Logindatamodel');
		//$data=$this->session->userdata('user_id');

		
		
    }

	public function index()
	{
		//$data=$this->session->userdata('user_id');

	
	


		$data['user_password']=" ";
		$data['user_id']=" ";
		$data1['user_id']=trim($this->input->post('user_id'),"u");;
		$data1['user_password']=$this->input->post('user_password');
		
		//$this->session->userdata('user_id');
		
		$data=$this->Logindatamodel->verify('user',$data1['user_id']);
		if($data['user_id']!="")
		{
	if($data['user_password']==$data1['user_password'])
			{
				
			$data['product']=$this->Logindatamodel->get_data('products');
			$this->session->set_userdata('user_id',$data1['user_id']);
			$id=$this->session->userdata('user_id');
			if(isset($id)=="true")
			{ 
				$this->load->view('productshow',$data);
			}
			
			}
			else
			{
				$data['message']="user id and password do not match";
				$this->load->view('login',$data);
			}
			
		
			
		

			
		}	

	
		else
		{
			
			
			$data['message']="wrong password";
			$this->load->view('login',$data);
			
		}

		
		
		
		
	}

	

	public function logout()
	{
		session_unset();
		header('location:'.base_url().'Login1');
	}

	public function lost_password()
	{
		$this->load->view('lostpassword');
	}
  	
		public function send_mail(){
		//	$batch=
		$data1['user_id']=trim($this->input->post('user_id'),"u");;
		$data1['user_email']=$this->input->post('user_email');
		$query=$this->db->query('select * from user where user_id='.$data1['user_id'].' and user_email="'.$data1['user_email'].'" ');
		$password = $query->row()->user_password;
			$msg="Your Password for the application JK Stores is 
								
		 $password 
			Kindly login and update the password
	
			
			
			Regards
			JK Stores";
			//$this->load->model('salon_model');
			if($query->num_rows())
			{
				$this->Logindatamodel->sendVerificatinEmail($msg,$data1['user_email']);
			echo "<script>alert('Mail has been send')</script>";
			$this->load->view('login');	
			}
			else{
				echo "<script>alert('Kindly check your user id and email')</script>";
				$this->load->view('lostpassword');	
			}
			
		}
  	

		






}
