<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminaccount extends CI_Controller {

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
	 * 
	 */
	function __construct()
    {
        parent::__construct();
        $this->load->model('Datamodel');
	
		
    }
	public function index()
	{
		$d=$this->session->userdata('admin_id');

		if($d==0)
		{
			header('location:'.base_url().'Welcome');
		}
		else{
			$data['orders']=$this->Datamodel->allorders('orders'); 
			$data['ord']=$this->Datamodel->allorderstoday('orders'); 
			$data['vendor']=$this->Datamodel->vendorlist('vedors'); 
			$this->load->view('admin_account',$data);
		}
		
	}
	public function showbilladmin()
	{
		$data=$this->session->userdata('admin_id');

		if($data==0)
		{
			header('location:'.base_url().'Welcome');
		}
		$data['order_no']=$this->uri->segment(3);
		$this->session->set_userdata('order_no',$data['order_no']);
		$data['data1']=$this->Datamodel->showuserorderreciept($data);
		$this->db->where('order_id',$data['order_no']);
	$user_id=$this->db->get('orders')->row()->user_id; 
		//$data1['user_id']=$this->session->userdata('user_id');
		$data['data']=$this->Datamodel->aboutuserdataadmin($user_id);
		//var_dump($data['data']);
		$data['order_date']=$this->Datamodel->ordersdateadmin();
		$data['s_housename']=$this->db->where('user_id',$user_id)->get('shippingdetails')->row()->s_housename;
	$data['s_city']=$this->db->where('user_id',$user_id)->get('shippingdetails')->row()->s_city;
	$data['s_pincode']=$this->db->where('user_id',$user_id)->get('shippingdetails')->row()->s_pincode;
	$data['s_state']=$this->db->where('user_id',$user_id)->get('shippingdetails')->row()->s_state;
		$this->load->view('paymentrecieptadmin',$data);
		//echo $data['order_no'];
		//redirect(base_url('updatecart'));
		
	}

public function login()
{
	$data1['admin_id']=$this->input->post('user_id');
	$data1['admin_password']=$this->input->post('user_password');
	
	
	
if($data1['admin_password']=="Admin" && $data1['admin_id']=="Admin")
		{
			
		//$data['product']=$this->Logindatamodel->get_data('products');
		$this->session->set_userdata('admin_id',$data1['admin_id']);
		$id=$this->session->userdata('admin_id');
		if(isset($id)=="true")
		{
			$data['orders']=$this->Datamodel->allorders('orders'); 
		$data['ord']=$this->Datamodel->allorderstoday('orders'); 
		$data['vendor']=$this->Datamodel->vendorlist('vedors'); 
		$this->load->view('admin_account',$data);
		}
		//$this->load->view('loginadmin');
		
		else
		{
			//$data['message']="Admin id and passwords do not match";
			$this->load->view('loginadmin');
		}
		
		
		
	

		
	}	
	else
		{
			//$data['message']="Admin id and passwords do not match";
			$this->load->view('loginadmin');
		}

	
	

	
	
}

	public function logout()
	{
		session_destroy();
		$this->load->view('loginadmin');

	}
	public function get_product_details()
    {
		//echo $this->input->post('pid');	
        if($this->input->post('pid'))
            echo $this->Datamodel->get_product_det($this->input->post('pid'));
    }

	public function checkproductid()
    {
		//echo $this->input->post('pid');	
        if($this->input->post('product_id'))
            echo $this->Datamodel->checkpid($this->input->post('product_id'));
    }

	public function updateProductEntries()
	{
		$data['product_id']=strtoupper($this->input->post('pid'));
		$data['p_title']=$this->input->post('p_title');
		//$data['p_name']=$this->input->post('p_name');
		$data['p_cost']=$this->input->post('p_cost');
		$data['p_size']=$this->input->post('p_size');
		$data['p_type']=$this->input->post('p_type');
		$data['p_brand']=$this->input->post('p_brand');
		$data['p_imagepath']=$this->input->post('p_imagepath');
		$data['p_description']=$this->input->post('p_description');
	
		

		$this->Datamodel->update_product_details($data);
		redirect(base_url('admin'));
		
	
	}

	


	public function deleteorders()
	{
		$data['order_id']=$this->uri->segment(3);
		echo $data['order_id'];
		$this->Datamodel->deleteorderdetails($data);
		redirect(base_url('admin'));
	}

	public function addnewproduct()
	{
		$data['product_id']=$this->input->post('product_id');
		$data['p_category']=$this->input->post('p_category');
		$data['p_title']=$this->input->post('p_title');
		$data['p_cost']=$this->input->post('p_cost');
		$data['p_brand']=$this->input->post('p_brand');
		$data['p_description']=$this->input->post('p_description');
		$data['p_imagepath']=$this->input->post('p_imagepath');
		$data['p_size']=$this->input->post('p_size');
		$data['p_type']=$this->input->post('p_type');
		echo $data['product_id'];
		echo $data['p_category'];
		echo $data['p_title'];
		echo $data['p_cost'];
		echo $data['p_brand'];
		echo $data['p_description'];
		echo $data['p_imagepath'];
		echo $data['p_size'];
		echo $data['p_type'];
		$this->Datamodel->addnewproduct($data);
		redirect(base_url('admin'));
		
	}
	public function reject()
	{
		$data['v_id']=$this->uri->segment(3);
		$this->Datamodel->rejectvendorstatus($data);
		redirect(base_url('admin'));
	}
	public function accept()
	{
		$data['v_id']=$this->uri->segment(3);
		$this->Datamodel->acceptvendorstatus($data);
		redirect(base_url('admin'));
	}
}
