<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

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
		$this->load->model('Logindatamodel');
		$data=$this->session->userdata('user_id');

		if($data==0)
		{
			header('location:'.base_url().'Login1/index');
		}
		
    }
	public function index()
	{
		$this->load->view('vendor');
	}
	public function update_p_status()
	{

		
		$this->Datamodel->updateEditStatus('vendors'); 
		$id=$this->session->userdata('v_id');
		$data['info']=$this->Logindatamodel->getvendordetails('vendor',$id);
		//var_dump($data['info']);
		$this->load->view('vendor',$data);
	}

	public function get_vendorproduct_details()
    {
		//echo $this->input->post('pid');	
        if($this->input->post('pid'))
            echo $this->Datamodel->get_vendorproduct_det($this->input->post('pid'));
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
		$data['v_id']=$this->session->userdata('v_id');
		$data['v_email']=$this->session->userdata('v_email');
		$data1['info']=$this->Logindatamodel->getvendordetails('vendor',$data);
		$this->load->view('vendor',$data1);
	
	}

}
