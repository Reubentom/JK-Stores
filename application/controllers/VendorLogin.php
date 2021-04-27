<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VendorLogin extends CI_Controller {



	function __construct()
    {
		
        parent::__construct();
		$this->load->library('session');
    	$this->load->model('Logindatamodel');
		// $data=$this->session->userdata('user_id');

		// if($data==0)
		// {
		// 	header('location:'.base_url().'Login1/index');
		// }
    }

	public function index()
	{
		
		$data['v_id']="";
		$data['v_email']="";
		$data1['v_id']=$this->input->post('v_id');
		$data1['v_email']=$this->input->post('v_email');
		
		//$this->session->userdata('user_id');
		
		$data=$this->Logindatamodel->verify_vendor('vendor',$data1['v_id']);
		if($data['v_id']!="")
		{
	if($data['v_email']==$data1['v_email'])
			{
				
			//$data['product']=$this->Logindatamodel->get_data('products');
			$this->session->set_userdata('v_email',$data1['v_email']);
			$this->session->set_userdata('v_id',$data1['v_id']);
			$id=$this->session->userdata('v_id');
			if(isset($id)=="true")
			{
				$data['info']=$this->Logindatamodel->getvendordetails('vendor',$data1['v_id']);
				//var_dump($data['info']);
				$this->load->view('vendor',$data);
			}
			
			}
			else
			{
				$data['message']="user id and password do not match";
				echo $data['message'];
				$this->load->view('vendorlogin',$data);
			}
			
		
			
		

			
		}	

	
		else
		{
			
			
			$data['message']="";
			$this->load->view('vendor',$data);
			
		}
		
		
	}

	
	public function open()
	{

		$this->load->view('vendorlogin');

	}





}
