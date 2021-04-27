<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function index()
	{
		$data['msg']="";
		$this->load->view('upload_v',$data);
	}

    public function up()
	{
		$config['upload_path']="./uploads/";
        $config['allowed_types']="gif|pdf|jpg";
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('user_file'))
        {
            
            $msg=array('msg'=>$this->upload->display_errors());
           // $this->load->view('upload_v',$msg);
        }
      else{
         
            $msg= array('msg'=>'upload successfull');
            $this->load->view('upload_v',$msg);
      }
        
       
	}
}
