<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
        $this->load->model('program_model');
        $r['program'] = $this->program_model->get_program();
        $this->load->view('core/header');
        $this->load->view('home',$r);
        $this->load->view('core/footer');
    }
    public function error()
	{
        $this->load->view('core/header');
        $this->load->view('error404');
        $this->load->view('core/footer');
    }
}     
?>