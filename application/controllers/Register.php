<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register  extends CI_Controller {

	
	public function index()
	{
		$data['check']="";
		$data['check1']="";
		$data['check2']="";
		$this->load->view('register',$data);
	}

	public function addnewuser()
	{
		$data['user_password']=$this->input->post('user_password');
		$cpass=$this->input->post('user_cpassword');
		$data['user_mobile']=$this->input->post('user_mobile');
			$data['user_fname']=$this->input->post('user_fname');
			$data['user_lname']=$this->input->post('user_lname');
			$data['user_email']=$this->input->post('user_email');
			$this->load->model('Logindatamodel');
		
		if($cpass!=$data['user_password'])
		{
			$error['check']="user password and confirm password must be same";
	
			$error['check1']="";
			$error['check2']="";
			$this->load->view('register',$error);
		}
		
	
		
		
		
		else{
			$error1=$this->Logindatamodel->checknewusermobile('user',$data);
			$error2=$this->Logindatamodel->checknewuseremail('user',$data);
			if($error1['check2']=="1")
			{																																																																																																																																																																
				
					$error1['check2']="This mobile number already taken";
					$this->load->view('register',$error1);
				
				
			}elseif($error2['check1']=="1")
			{
				

				
					$error2['check1']="This email is already taken";
					$this->load->view('register',$error2);
			
				
				
			}
			elseif($error1['check2']=="1" && $error2['check1']=="1")
			{	
				$error['check1']="This email is already taken";
				$error['check2']="This number is already taken";
				$this->load->view('register',$error);
			}
			
			else{
				$data1['user_id']=$this->Logindatamodel->add_user('user',$data);

				$this->session->set_userdata('user_id',$data1['user_id']);
				$id=$this->session->userdata('user_id');
			//	echo "h";
				redirect(base_url('useracc'));
			}
			echo $data['user_password'];	
			
						
				
					
			
			
			
			
			}
		}
	
		
		

		
	

	
           // echo $this->Datamodel->check_mobile($this->input->post('user_mobile'));
    
}
