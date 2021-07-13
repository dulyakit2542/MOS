<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function index()
	{
        $this->load->model('Upload_model');
        $this->Upload_model->upload_profile();
    }

    public function upload_program()
    {   
        $this->load->model('Upload_model');
        $this->Upload_model->upload_program();
    }
}
    
?>
 