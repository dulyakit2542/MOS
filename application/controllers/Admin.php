<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/dashboard');
        $this->load->view('core/admin/footer_admin');
    }

    //TRAIN
    public function manage_room_train()
    {
        $this->load->model('Program_model');
        $this->load->model('User_model');
        $r['program'] = $this->Program_model->get_program();
        $r['program_type'] = $this->Program_model->program_type();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/train/train_room', $r);
        $this->load->view('core/admin/footer_admin');
    }
    public function manage_room_train_edit($data = "")
    {
        if (isset($data)) {
            $this->load->model('Program_model');
            $result['program'] = $this->Program_model->get_train_room_id($data);
            $result['program_type'] = $this->Program_model->program_type();
            $this->load->view('core/admin/header_admin');
            $this->load->view('admin/train/train_room_edit', $result);
            $this->load->view('core/admin/footer_admin');
        }
    }
    public function training_approve()
    {
        $this->load->model('Train_room');
        $r['training_wait'] = $this->Train_room->training_status_wait();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/train/train_approve', $r);
        $this->load->view('core/admin/footer_admin');
    }

    public function training_pass()
    {
        $this->load->model('Train_room');
        $r['training_pass'] = $this->Train_room->training_status_pass();
        $r['training_wait'] = $this->Train_room->training_status_wait();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/train/train_pass', $r);
        $this->load->view('core/admin/footer_admin');
    }


    //EXAM
    public function manage_exam_room()
    {
        $this->load->model('Exam_room');
        $this->load->model('Program_model');
        $r['exam_room'] = $this->Exam_room->exam_room();
        $r['program_id'] = $this->Program_model->program_type();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/exam/exam_room', $r);
        $this->load->view('core/admin/footer_admin');
    }
    public function manage_exam_room_edit($id = "")
    {
        if (isset($id)) {
            $this->load->model('Exam_room');
            $this->load->model('Program_model');
            $result['program'] = $this->Exam_room->get_exam_room($id);
            $result['program_type'] = $this->Program_model->program_type();
            $this->load->view('core/admin/header_admin');
            $this->load->view('admin/exam/exam_room_edit', $result);
            $this->load->view('core/admin/footer_admin');
        }
    }
    public function exam_approve()
    {
        $this->load->model('Exam_room');
        $r['checktraining'] = $this->Exam_room->program_check_training();
        $r['exam_approve'] = $this->Exam_room->exam_approve();
        $r['exam_archive'] = $this->Exam_room->exam_archive();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/exam/exam_approve', $r);
        $this->load->view('core/admin/footer_admin');
    }
    public function exam_approve_define()
    {
        $this->load->model('Exam_room');
        $r['checktraining'] = $this->Exam_room->program_check_training();
        $r['exam_approve'] = $this->Exam_room->exam_approve();
        $r['exam_define'] = $this->Exam_room->exam_define();
        $r['exam_archive'] = $this->Exam_room->exam_archive();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/exam/exam_approve_define', $r);
        $this->load->view('core/admin/footer_admin');
    }

    // Archive
    public function exam_archive()
    {
        $this->load->model('Program_model');
        $this->load->model('Archive');
        $r['program_type'] = $this->Program_model->program_type();
        $r['exam_archive'] = $this->Archive->exam_archive();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/exam/exam_archive', $r);
        $this->load->view('core/admin/footer_admin');
    }
    public function exam_archive_edit($id = "")
    {
        if (isset($id)) {
            $this->load->model('Program_model');
            $this->load->model('Archive');
            $result['program_type'] = $this->Program_model->program_type();
            $result['exam_archive_byId'] = $this->Archive->exam_archive_byId($id);
            $this->load->view('core/admin/header_admin');
            $this->load->view('admin/exam/exam_archive_edit', $result);
            $this->load->view('core/admin/footer_admin');
        }
    }

    //Program   
    public function manage_program()
    {
        $this->load->model('Program_model');
        $r['program_type'] = $this->Program_model->program_type();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/program/manage_program', $r);
        $this->load->view('core/admin/footer_admin');
    }
    public function manage_program_edit($id = "")
    {
        if (isset($id)) {
            $this->load->model('Program_model');
            $result['program'] = $this->Program_model->program_type_id($id);
            $result['program_type'] = $this->Program_model->program_type();
            $this->load->view('core/admin/header_admin');
            $this->load->view('admin/program/manage_program_edit', $result);
            $this->load->view('core/admin/footer_admin');
        }
    }

    //USER
    public function user_list()
    {
        $program = $_SESSION['user_info']->section;
        $sec = substr($program, 0, 2);
        $section1 = $sec * 100;
        $this->load->model('User_model');
        $r['section'] = $this->User_model->get_section($_SESSION['user_info']->section);
        $r['faculty'] = $this->User_model->get_faculty($section1);
        $r['user_list'] = $this->User_model->user_list();
        $this->load->view('core/admin/header_admin');
        $this->load->view('admin/user/user_list', $r);
        $this->load->view('core/admin/footer_admin');
    }

    public function user_list_detail($id = "")
    {
        if (isset($id)) {
            $this->load->model('User_model');
            $result['user_list'] = $this->User_model->user_list_byId($id);
            $this->load->view('core/admin/header_admin');
            $this->load->view('admin/user/user_list_detail',$result);
            $this->load->view('core/admin/footer_admin');
        }
    }
}
