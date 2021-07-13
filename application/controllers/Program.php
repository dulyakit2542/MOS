<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');

class Program extends CI_Controller
{

    //Admin
    public function index()
    {
        $this->load->model('program_model');
        $r['program'] = $this->program_model->get_program();
        $this->load->view('core/header');
        $this->load->view('program', $r);
        $this->load->view('core/footer');
    }
   
    //User
    public function program_regis($id = "")
    {
        if (isset($id)) {
            $this->load->model('Program_model');
            $result['program'] = $this->Program_model->get_program_id($id);
            $result['program_type'] = $this->Program_model->program_type();
            $this->load->view('core/header');
            $this->load->view('program/program_regis', $result);
            $this->load->view('core/footer');
        }
    }
    public function program_member_list()
    {
        $this->load->model('Program_model');
        $r['tw'] = $this->Program_model->program_train_wait();
        $r['train_member'] = $this->Program_model->train_member($_SESSION['user_info']->personal_id);
        $r['exam_member'] = $this->Program_model->exam_member($_SESSION['user_info']->personal_id);
        $this->load->view('core/header');
        $this->load->view('program/program_member_list', $r);
        $this->load->view('core/footer');
    }
    
    public function error404()
    {
        $this->load->view('core/header');
        $this->load->view('error404');
        $this->load->view('core/footer');
    }
    // var_dump($user_data);

    //image
    public function upload_image_program()
    {
        $this->load->model('Upload_model');
        $this->Upload_model->upload_program_image();
    }
}
