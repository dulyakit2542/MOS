<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
            $program = $_SESSION['user_info']->section;
            $sec = substr($program,0,2);
            $section1 = $sec * 100;
            $this->load->model('User_model');
            $r['user'] = $this->User_model->get_user_id($_SESSION['user_info']->user_id);
            $r['section'] = $this->User_model->get_section($_SESSION['user_info']->section);
            $r['faculty'] = $this->User_model->get_faculty($section1);
            $this->load->view('core/header');
            $this->load->view('user/user_profile',$r);
            $this->load->view('core/footer');

    }
   public function user_edit()
   {   
        $program = $_SESSION['user_info']->section;
        $sec = substr($program,0,2);
        $section1 = $sec * 100;
        $this->load->model('User_model');
        $r['user'] = $this->User_model->get_user_id($_SESSION['user_info']->user_id);
        $r['section'] = $this->User_model->get_section($_SESSION['user_info']->section);
        $r['faculty'] = $this->User_model->get_faculty($section1);
        $this->load->view('core/header');
        $this->load->view('user/user_edit',$r);
        $this->load->view('core/footer');
    }
    public function user_create()
   {   
        $program = $_SESSION['user_info']->section;
        $sec = substr($program,0,2);
        $section1 = $sec * 100;
        $this->load->model('User_model');
        $r['user'] = $this->User_model->get_user_id($_SESSION['user_info']->user_id);
        $r['section'] = $this->User_model->get_section($_SESSION['user_info']->section);
        $r['faculty'] = $this->User_model->get_faculty($section1);
        $this->load->view('user/user_create',$r);
    }
    public function upload()
    {   
        $this->load->model('Upload_model');
        $this->Upload_model->upload_file($_SESSION['user_info']->personal_id);
    }
    
   
    
}
    
?>
 