<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_program extends CI_Controller
{
    public function home($type = "", $key = "", $value = "")
    {
        $json = new stdClass;
        $json->status = 'fail';
        $json->message = "Unknown error";
        switch ($this->input->method(true)) {
            
            case 'GET':
                $r = false;
                parse_str(file_get_contents("php://input"), $var);
                $data = $var;
                if ($type == 'get_program') {
                    $this->load->model('program_model');
                    $r = $this->program_model->get_program();

                } else if ($type == 'edit_profile') {
                    $id = $key;
                    $this->load->model('User_model');
                    $r = $this->User_model->update_user($id, $data);
                } else if ($type == 'insert_user') {
                    $this->load->model('User_model');
                    $r = $this->User_model->insert_user($data);
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
