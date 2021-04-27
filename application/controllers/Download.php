<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

	public function index()
	{
		
		$this->load->view('download_v');
	}

    public function down($filename)
	{
		$file_data=file_get_contents(base_url('uploads/'.$filename));
        force_download($filename,$file_data);
		//$this->load->view('download_v');
	}
}
