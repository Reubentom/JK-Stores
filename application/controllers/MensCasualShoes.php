<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensCasualShoes extends CI_Controller {



    function __construct()
    {
		
        parent::__construct();
        $this->load->model('Logindatamodel');
        $data=$this->session->userdata('user_id');

		if($data==0)
		{
			header('location:'.base_url().'Login1/index');
		}
    }

    public function index()
	{
		$data['product']=$this->Logindatamodel->get_MensCasualShoes('products');
	
	    $this->load->view('productshow',$data);
	}
}