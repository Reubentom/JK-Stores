<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
	
		
		$id=$this->session->userdata('user_id');
		if(isset($id)=="true")
			{
				$data['cart_item']=$this->Datamodel->showcartdetails('cart'); 
				$this->load->view('cart',$data);
				
			}
			else
			{
				echo "please login first";
			}
		
	}
	public function addproducttocart()
	{
		$data['product_id']=$this->uri->segment(3);
		$data['user_id']=$this->session->userdata('user_id');
		
		$this->Datamodel->keepincart('cart',$data);

		//$this->index();
		//$back=$this->session->userdata('previous_url');
		//$this->load->view('productshow');
		redirect(base_url('pro'));																																						
	}

	public function removefromcart()
	{
		$data['product_id']=$this->uri->segment(3);
		//$data['user_id']=$this->session->userdata('user_id');
		
		$this->Datamodel->deleteproductfromcart('cart',$data);

		//$this->index();
		//$back=$this->session->userdata('previous_url');
		//$this->load->view('productshow');
		redirect(base_url('updatecart'));																																						
	}


	public function updateqtycart()
	{
		$data1['product_id']=$this->uri->segment(3);
		$data1['user_id']=$this->session->userdata('user_id');
		$data1['qty']=$this->input->post('qty');
		$this->Datamodel->updateqtyincart('cart',$data1);

	
		redirect(base_url('updatecart'));																																						
	}



	public function addtocart()
	{
		$data1['product_id']=$this->uri->segment(3);
		$data1['user_id']=$this->session->userdata('user_id');
		$data1['qty']=$this->input->post('qty');

	
		
		$this->Datamodel->productpageqty('cart',$data1);
		redirect(base_url('pro'));
	
																																							
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
			redirect(base_url('check'));
	}

	public function proceedtocheckout()
	{
		$data['user_id']=$this->session->userdata('user_id');
		$data['order_total']=$this->uri->segment(3);
		$data['order_date']=$this->session->userdata('current_date');
		echo $data['order_date'];
		echo $data['user_id'];
		echo $data['order_total'];
		$this->Datamodel->addorder('orders',$data);
		redirect(base_url('check'));

																																						
	}


}
