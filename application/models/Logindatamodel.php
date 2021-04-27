<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  Logindatamodel extends CI_Model{

    function __construct()
    {
		
        parent::__construct();
		$this->load->library('session');
    	//$this->load->model('Logindatamodel');
    }
	
public function checknewuseremail($table,$data)
{
    $res=$this->db->where('user_email',$data['user_email'])->get("user");
    if($res->num_rows()>0)
    {   
        $data['check1']= "1";
        $data['check2']="";
        $data['check']="";
        return $data;
     //   $this->load->view('register',$data);
    //$this->db->insert($table,$data);
    }
    else
    {
        $data['check1']= "";
        $data['check2']="";
        $data['check']="";
        return $data;
    }
   
    }



    public function checknewusermobile($table,$data)
{
    $res=$this->db->where('user_mobile',$data['user_mobile'])->get("user");
    if($res->num_rows()>0)
    {
        $data['check1']="";
        $data['check2']="1";
        $data['check']="";
        return $data;
     //   $this->load->view('register',$data);
    //$this->db->insert($table,$data);
    }
    else
    {
        $data['check1']="";
        $data['check2']="";
        $data['check']="";
        return $data;
    }
   
    }
    
    


    



	public function add_user($table,$data)
    {
		

        $this->db->insert($table,$data);
      
        $query=$this->db->query('select user_id from user where user_mobile="'.$data['user_mobile'].'"');
        $data['user_id']=$query->row()->user_id;

        return $data['user_id'];
      
    }
	

    public function get_data($table)
    {
        $res=$this->db->get($table);
    
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }

    public function get_data_ref($data)
    {
        echo $data['1'];
        $res=$this->db->query('select * from products where  p_type="'.$data['1'].'" or p_type="'.$data['2'].'" or  p_type="'.$data['3'].'" ');
    
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }



    public function get_data_single($table,$d)
    {
 $query=$this->db->query('select * from products where product_id="'.$d.'"');
        $data['product_id']=$query->row()->product_id;
        $data['p_category']=$query->row()->p_category;
        $data['p_title']=$query->row()->p_title;
        $data['p_cost']=$query->row()->p_cost;
        $data['p_brand']=$query->row()->p_brand;
        $data['p_imagepath']=$query->row()->p_imagepath;
        $data['p_description']=$query->row()->p_description;
        $data['p_size']=$query->row()->p_size;
        $data['p_type']=$query->row()->p_type;
        return $data;
    }


    public function get_Addidas($table)
    {
        $brand="Addidas";
        $res=$this->db->where('p_brand',$brand)->get($table);
    
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }


    public function get_Nike($table)
    {
        $brand="Nike";
        $res=$this->db->where('p_brand',$brand)->get($table);
    
        
        return $res->result_array();
    }
    public function get_under500($table)
    {
     //   $brand="Nike";
        $query=$this->db->query('select * from products where p_cost <= "500"');
     //   $res=$this->db->where('p_brand',$brand)->get($table);
    
        
        return $query->result_array();
    }

    public function get_bw5001000($table)
    {
     //   $brand="Nike";
        $query=$this->db->query('select * from products where p_cost > "500" and p_cost <=1000');
     //   $res=$this->db->where('p_brand',$brand)->get($table);
    
        
        return $query->result_array();
    }

    public function get_bw10002500($table)
    {
     //   $brand="Nike";
        $query=$this->db->query('select * from products where p_cost > "1000" and p_cost <=2500');
     //   $res=$this->db->where('p_brand',$brand)->get($table);
    
        
        return $query->result_array();
    }
    


    public function get_bw25005000($table)
    {
     //   $brand="Nike";
        $query=$this->db->query('select * from products where p_cost > "2500" and p_cost <=5000');
     //   $res=$this->db->where('p_brand',$brand)->get($table);
        return $query->result_array();
    }

    public function get_abv5000($table)
    {
     //   $brand="Nike";
        $query=$this->db->query('select * from products where p_cost > "5000"');
     //   $res=$this->db->where('p_brand',$brand)->get($table);
        return $query->result_array();
    }
   



    public function get_woodlands($table)
    {
        $brand="Woodlands";
        $res=$this->db->where('p_brand',$brand)->get($table);
    
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }

    public function get_hushpuppies($table)
    {
        $brand="Hush Puppies";
        $res=$this->db->where('p_brand',$brand)->get($table);
    
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }

    public function get_skechers($table)
    {
        $brand="Skechers";
        $res=$this->db->where('p_brand',$brand)->get($table);
    
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }


    public function get_MensSportsAndOutdoors($table)
    {
        $category="Mens Sport And Outdoors";
        $res=$this->db->where('p_category',$category)->get($table);
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }

    public function get_WomensSportsAndOutdoors($table)
    {
        $category="Women's Sports and Outdoor Shoes";
        $res=$this->db->where('p_category',$category)->get($table);
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }


    public function get_MensFormalShoes($table)
    {
        $category="Men's Formal Shoes";
        $res=$this->db->where('p_category',$category)->get($table);
        //result set method to get the all the data of the table to be send to the controller
        return $res->result_array();
    }











	public function verify($table,$id)
{
    //using the query builder class of the codignitor
   $res=$this->db->where('user_id',$id)->get($table);
    
    foreach ($res->result() as $row)
{
    
   
    $data['user_id']=$row->user_id;
    $data['user_password']=$row->user_password;
	return $data;
   
}
$data['user_id']="";
$data['user_password']="";
return $data;
	
  
}



public function verify_vendor($table,$id)
{
    //using the query builder class of the codignitor
   $res=$this->db->where('v_id',$id)->get($table);
    
    foreach ($res->result() as $row)
{
    
   
    $data['v_id']=$row->v_id;
    $data['v_email']=$row->v_email;
	return $data;
   
}
$data['v_id']="";
$data['v_email']="";
return $data;
	
  
}



public function getvendordetails($table,$id)
{
    //using the query builder class of the codignitor
    $id=$this->session->userdata('v_id');

    $res=$this->db->where('v_id',$id)->get($table);
    //result set method to get the all the data of the table to be send to the controller
    $data['p_edit_status']=$res->row()->p_edit_status;
    $data['v_name']=$res->row()->v_name;
    $data['v_brand']=$res->row()->v_brand;
    $data['v_email']=$res->row()->v_email;
    $data['v_mobile']=$res->row()->v_mobile;
    $data['v_id']=$res->row()->v_id;
   
    return $data;
  
}


function sendVerificatinEmail($msg,$email){
    $config = Array(
       'protocol' => 'smtp',
       'smtp_host' => 'ssl://smtp.gmail.com',
       'smtp_port' => 465,
       'smtp_user' => 'reubenkoshy10@gmail.com', // change it to yours
       'smtp_pass' => 'Reuben@1996', // change it to yours
       'mailtype' => 'html',
       'charset' => 'iso-8859-1',
       'wordwrap' => TRUE
    );
     
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('mca332@rajagiri.edu', "Jk Stores");
    $this->email->to($email);  
    $this->email->subject("Your Old Password");
    $this->email->message($msg);
    $this->email->send();
}






}
