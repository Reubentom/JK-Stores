<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Bw5001000 extends CI_Controller {

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
		
        $this->load->model('Logindatamodel');
		$data=$this->session->userdata('user_id');

		if($data==0)
		{
			header('location:'.base_url().'Login1/index');
		}
    }

    public function index()
	{
		$data['product']=$this->Logindatamodel->get_bw5001000('products');
	
	$this->load->view('productshow',$data);
	
	}
    

	
	
}