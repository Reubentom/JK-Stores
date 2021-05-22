<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
    {
		
        parent::__construct();
        $this->load->model('Datamodel');
		$data=$this->session->userdata('user_id');

		if($data==0)
		{
			header('location:'.base_url().'Login1/index');
		}
    }
	public function index()
	{
		$d=$this->session->userdata('user_id');

		if($d==0)
		{
			header('location:'.base_url().'Login1/index');
		}
		else
		{
    	$data['data']=$this->Datamodel->aboutuserdata('user'); 
		$data['allorders']=$this->Datamodel->userorders();
		$data['ship']=$this->Datamodel->usershipping();
		}
		
	//	var_dump($data['ship']);	
		$this->load->view('user_account',$data);
	}

	public function gotocart()
	{
		//$data['cart_item']=$this->Datamodel->checkoutdata('cart');
		//$this->load->view('checkout',$data);
		redirect(base_url('updatecart'));
		
	}


	public function showbill()
	{
		$da=$this->session->userdata('user_id');

		if($da==0)
		{
			header('location:'.base_url().'Login1/index');
		}else{
			$data['order_no']=$this->uri->segment(3);
			$this->session->set_userdata('order_no',$data['order_no']);
			$data['data1']=$this->Datamodel->showuserorderreciept($data); 
			$data1['user_id']=$this->session->userdata('user_id');
			$data['data']=$this->Datamodel->aboutuserdata($data1);
			//var_dump($data['data']);
			$data['order_date']=$this->Datamodel->ordersdate($data1);
			$data['s_housename']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_housename;
		$data['s_city']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_city;
		$data['s_pincode']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_pincode;
		$data['s_state']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_state;
			$this->load->view('paymentreciept',$data);
			//echo $data['order_no'];
			//redirect(base_url('updatecart'));
		}
		
		
	}



	

	public function updateDetails()
	{	$d=$this->session->userdata('user_id');

		if($d==0)
		{
			header('location:'.base_url().'Login1/index');
		}
		else{
			$data['user_password']=$this->input->post('user_password');
			$data['user_email']=$this->input->post('user_email');
			$data['user_mobile']=$this->input->post('user_mobile');
			$data['user_fname']=$this->input->post('user_fname');
			$data['user_lname']=$this->input->post('user_lname');
			$this->db->where('user_id',$this->session->userdata('user_id'));
			$this->db->update('user',$data);
			echo '<script>alert("Your User Details have been Saved Succesfully")</script>';
			$data['data']=$this->Datamodel->aboutuserdata('user'); 
			$data['allorders']=$this->Datamodel->userorders();
			$data['ship']=$this->Datamodel->usershipping();
			
			
			
			$this->load->view('user_account',$data);
		}
		
	}

public function updateshipdetails()
{
	$data['s_firstname']=$this->input->post('s_firstname');
	$data['s_lastname']=$this->input->post('s_lastname');
	$data['s_housename']=$this->input->post('s_housename');
	$data['s_city']=$this->input->post('s_city');
	$data['s_state']=$this->input->post('s_state');
	$data['s_pincode']=$this->input->post('s_pincode');
	$this->db->where('user_id',$this->session->userdata('user_id'));
		$this->db->update('shippingdetails',$data);
		echo '<script>alert("Your Shipping Details have been Saved Succesfully")</script>';
		$data['data']=$this->Datamodel->aboutuserdata('user'); 
		$data['allorders']=$this->Datamodel->userorders();
		$data['ship']=$this->Datamodel->usershipping();
		
		
		
		$this->load->view('user_account',$data);
}


	public function saveshippingdetails()
	{
		$data['s_firstname']=$this->input->post('s_firstname');
		$data['s_lastname']=$this->input->post('s_lastname');
		$data['s_housename']=$this->input->post('s_housename');
		$data['s_city']=$this->input->post('s_city');
		$data['s_state']=$this->input->post('s_state');
		
		$data['s_pincode']=$this->input->post('s_pincode');
		$data['data']=$this->Datamodel->ship_details_save($data); 
		echo '<script>alert("Your Details are Saved succesfully")</script>';
		$this->load->view('user_account',$data);
		
		//$data['s_firstname']=$this->input->post('s_firstname');
		//echo $data['s_firstname'];
	}

	public function savenewshippingdetails()
	{
		$data['s_firstname']=$this->input->post('s_firstname');
		$data['s_lastname']=$this->input->post('s_lastname');
		$data['s_housename']=$this->input->post('s_housename');
		$data['s_city']=$this->input->post('s_city');
		$data['s_state']=$this->input->post('s_state');
		
		$data['s_pincode']=$this->input->post('s_pincode');
		$this->Datamodel->ship_details_save($data); 
		echo '<script>alert("Your Details are Updated Sucessfully")</script>';
		$this->load->view('user_account',$data);
		
		//$data['s_firstname']=$this->input->post('s_firstname');
		//echo $data['s_firstname'];
	}

	
}