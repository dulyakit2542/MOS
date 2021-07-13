<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_train extends CI_Controller
{
    public function train_room($type = "", $key = "", $value = "")
    {
        $json = new stdClass;
        $json->status = 'fail';
        $json->message = "Unknown error";
        switch ($this->input->method(true)) {
            case 'POST':
                $r = false;
                parse_str(file_get_contents("php://input"), $var);
                $data = $var;
                if ($type == 'edit_train_room') {
                    $id = $key;
                    $this->load->model('Train_room');
                    $r = $this->Train_room->edit_train_room($id, $data);
                }else if ($type == 'program_train_approve') {
					$id = $key;
					$this->load->model('train_room');
					$r = $this->train_room->train_member($id, $data);
				} else 

                if ($r) {
                    $json->status = 'success';
                    $json->message = "Found $type, $key, $value";
                    $json->result = $r;
                } else {
                    $json->status = 'fail';
                    $json->message = "Not found $type, $key, $value";
                }
            break;
            case 'INSERT':
                $r = false;
                parse_str(file_get_contents("php://input"), $var);
                $data = $var;
                if ($type == 'add_train_room') {
                    $this->load->model('Train_room');
                    $r = $this->Train_room->add_train_room($data);
                } else if ($type == 'new_program') {
                    $this->load->model('program_model');
                    $r = $this->program_model->new_program($data);
                }
                if ($r) {
                    $json->status = 'success';
                    $json->message = "Found $type, $key, $value";
                    $json->result = $r;
                } else {
                    $json->status = 'fail';
                    $json->message = "Not found $type, $key, $value";
                    $json->result = $r;
                }
            break;
            case 'DELETE':
                $r = false;
                if ($type == 'delete_train_room') {
                    $id = $key;
                    $this->load->model('Train_room');
                    $r = $this->Train_room->delete_train_room($id);
                }
                if ($r) {
                    $json->status = 'success';
                    $json->message = "Found $type, $key, $value";
                    $json->result = $r;
                } else {
                    $json->status = 'fail';
                    $json->message = "Not found $type, $key, $value";
                }
            break;
        }
        echo json_encode($json);
    }
   
}
