<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Datamodel');
		if(!$this->session->userdata('user_id'))
		{
			header('location:'.base_url().'Login1/index');
		}
    }
	public function index()
	{
        $this->load->helper('pdf_helper'); 
		//$this->load->view('cart',$data);
        $data1['user_id']=$this->session->userdata('user_id');
	
	$data['data']=$this->Datamodel->aboutuserdata($data1);
	
	$this->Datamodel->ordersconfirmation();
	$data['data1']=$this->Datamodel->ordersbill('orders',$data1);
	$data['order_date']=$this->Datamodel->ordersdate($data1);
		$this->load->view('checkout', $data);
	}
}