<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index()
	{
        $this->load->view('login');
    }
    public function check_login(){
        $user_data = $this->input->post();
        $this->load->model('user');
        $r = $this->user->check_login($user_data);
        if($r){
            $this->session->set_userdata($r);
            redirect('/home', 'refresh');
        }else{
            redirect('/login', 'refresh');
        }
    }
    public function logout(){
        session_destroy();
        redirect('/home', 'refresh');
    }
}
