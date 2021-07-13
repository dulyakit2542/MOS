<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	
	public function index()
	{
        $this->load->view('home');
    }
    public function register_exam($id=""){
        if(isset($id)){

            $this->load->model('Program_model');
			$result['program'] = $this->Program_model->program_exam_regis($id);
			$result['check_status'] = $this->Program_model->check_status($_SESSION['user_info']->personal_id);
            $this->load->view('core/header');
            $this->load->view('program/exam_regis',$result);
            $this->load->view('core/footer');
        }

    }
    public function program_regis($id=""){
        if(isset($id)){
			$this->load->model('Program_model');
			$result['program'] = $this->Program_model->get_program_id($id);
			$result['program_type'] = $this->Program_model->program_id();
			$this->load->view('core/header');
			$this->load->view('program/program_regis',$result);
			$this->load->view('core/footer');
		}
    }
   
    
    //admin
    public function exam_approve()
    {
        $this->load->model('Program_model');
        $r['checktraining'] = $this->Program_model->program_check_training();
        $r['exam_approve'] = $this->Program_model-> exam_approve();
        $r['exam_archive'] = $this->Program_model-> exam_archive();
        $r['exam_archive_score_null'] = $this->Program_model-> exam_archive_score_null();
        $this->load->view('core/header', $r);
        $this->load->view('core/nav_admin', $r);
        $this->load->view('admin/exam_approve', $r);
        $this->load->view('core/footer');
    }
    
    public function exam_define()
    {
        $this->load->model('Program_model');
        $r['checktraining'] = $this->Program_model->program_check_training();
        $r['exam_approve'] = $this->Program_model-> exam_approve();
        $r['exam_archive'] = $this->Program_model-> exam_archive();
        $r['exam_define'] = $this->Program_model-> exam_define();
        $r['exam_archive_score_null'] = $this->Program_model-> exam_archive_score_null();
        $this->load->view('core/header', $r);
        $this->load->view('core/nav_admin', $r);
        $this->load->view('admin/exam_define', $r);
        $this->load->view('core/footer');
    }
    public function exam_enter_score()
    {
        $this->load->model('Program_model');
        $r['checktraining'] = $this->Program_model->program_check_training();
        $r['exam_approve'] = $this->Program_model-> exam_approve();
        $r['exam_archive'] = $this->Program_model-> exam_archive();
        $r['exam_define'] = $this->Program_model-> exam_define();
        $r['exam_archive_score_null'] = $this->Program_model-> exam_archive_score_null();
        $this->load->view('core/header', $r);
        $this->load->view('core/nav_admin', $r);
        $this->load->view('admin/exam_enter_score', $r);
        $this->load->view('core/footer');
    }
    public function exam_enter_score_success()
    {
        $this->load->model('Program_model');
        $r['checktraining'] = $this->Program_model->program_check_training();
        $r['exam_approve'] = $this->Program_model-> exam_approve();
        $r['exam_archive'] = $this->Program_model-> exam_archive();
        $r['exam_define'] = $this->Program_model-> exam_define();
        $r['exam_score_success'] = $this->Program_model-> exam_score_success();
        $r['exam_archive_score_null'] = $this->Program_model-> exam_archive_score_null();
        $this->load->view('core/header', $r);
        $this->load->view('core/nav_admin', $r);
        $this->load->view('admin/exam_enter_score_success', $r);
        $this->load->view('core/footer');
    }
    public function exam_archive()
    {
        $this->load->model('Program_model');
        $r['program_type'] = $this->Program_model->program_type();
        $r['exam_archive'] = $this->Program_model->exam_archive();
        $r['checktraining'] = $this->Program_model->program_check_training();
        $r['exam_approve'] = $this->Program_model->exam_approve();
        $r['exam_archive_score_null'] = $this->Program_model-> exam_archive_score_null();
        $this->load->view('core/header', $r);
        $this->load->view('core/nav_admin', $r);
        $this->load->view('admin/exam_archive', $r);
        $this->load->view('core/footer');
    }
    public function exam_archive_edit($id=""){
        if(isset($id)){
            $this->load->model('Program_model');
            $result['program_type'] = $this->Program_model->program_type();
            $result['exam_archive_byId'] = $this->Program_model->exam_archive_byId($id);
            $r['checktraining'] = $this->Program_model->program_check_training();
            $r['exam_approve'] = $this->Program_model->exam_approve();
            $r['exam_archive_score_null'] = $this->Program_model-> exam_archive_score_null();
            $this->load->view('core/header', $r);
            $this->load->view('core/nav_admin', $r);
            $this->load->view('admin/exam_archive_edit', $result);
            $this->load->view('core/footer');
		}
    }
    

    
   
}
