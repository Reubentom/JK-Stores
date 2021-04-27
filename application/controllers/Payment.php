<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
	//$this->load->helper('pdf_helper');
	$data1['user_id']=$this->session->userdata('user_id');
	echo "hii";

	$data=$this->session->userdata('user_id');

		if($data==0)
		{
			header('location:'.base_url().'Login1/index');
		}
		else
		{
			$data['data']=$this->Datamodel->aboutuserdata($data1);
		
	
	
	$this->Datamodel->ordersconfirmation();	
	$data['data1']=$this->Datamodel->ordersbill('orders',$data1);
	$data['order_date']=$this->Datamodel->ordersdate($data1);
	$data['s_housename']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_housename;
	$data['s_city']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_city;
	$data['s_pincode']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_pincode;
	$data['s_state']=$this->db->where('user_id',$this->session->userdata('user_id'))->get('shippingdetails')->row()->s_state;


	$this->load->view('paymentreciept',$data);
		}
	
	}
	
	



	
    

	
	
}