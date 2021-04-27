<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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


		$p=$this->session->userdata('user_id');

		if($p==0)
		{
			header('location:'.base_url().'Login1/index');
		}
		$d=$this->session->userdata('user_id');
		$query =$this->db->query('select * from shippingdetails where user_id='.$d.'');

		
		if($query->num_rows()>0)
		{
		$data['s_firstname'] = $query->row()->s_firstname;
		$data['s_lastname'] = $query->row()->s_lastname;

		$data['s_housename'] = $query->row()->s_housename;

		$data['s_city'] = $query->row()->s_city;

		$data['s_state'] = $query->row()->s_state;

		$data['s_pincode'] = $query->row()->s_pincode;
		$data['cart_item']=$this->Datamodel->checkoutdata('cart');
		$this->load->view('checkout', $data); 
		}
		else
		{
	
			$data['cart_item']=$this->Datamodel->checkoutdata('cart');
		
		$data['s_firstname'] = "";
		$data['s_lastname'] ="";

		$data['s_housename'] = "";

		$data['s_city'] = "";

		$data['s_state'] ="";

		$data['s_pincode'] = "";
		$this->load->view('checkout', $data);
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
				//echo '<script>alert("Your Shipping Details have been Saved Succesfully")</script>';
				redirect(base_url('check'));
		}

		public function saveshipdetail()
		{
			$data['user_id']=$this->session->userdata('user_id');
			$data['s_firstname']=$this->input->post('s_firstname');
			$data['s_lastname']=$this->input->post('s_lastname');
			$data['s_housename']=$this->input->post('s_housename');
			$data['s_city']=$this->input->post('s_city');
			$data['s_state']=$this->input->post('s_state');
			$data['s_pincode']=$this->input->post('s_pincode');
			
				$this->db->insert('shippingdetails',$data);
				//echo '<script>alert("Your Shipping Details have been Saved Succesfully")</script>';
				redirect(base_url('check'));
		}
}
