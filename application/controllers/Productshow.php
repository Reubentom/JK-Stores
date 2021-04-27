<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productshow extends CI_Controller {

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
	public function index()
	{
		$data['product']=$this->Logindatamodel->get_data('products');
	
		
		$this->load->view('productshow',$data);
		$data=$this->session->userdata('user_id');

		if($data==0)
		{
			header('location:'.base_url().'Login1/index');
		}
	}

	function __construct()
    {
		
        parent::__construct();
        $this->load->model('Logindatamodel');
	//	$this->load->view('productshow');
	
    }
	public function refine()
	{
	$data['1']=$this->input->post('c1');
 	$data['2']=$this->input->post('c2');
	$data['3']=$this->input->post('c3');
	$data['product']=$this->Logindatamodel->get_data_ref($data);
	$this->load->view('productshow',$data);
	}

	
	
}
