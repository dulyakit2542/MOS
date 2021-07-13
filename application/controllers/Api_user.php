<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_user extends CI_Controller
{
    public function user($type = "", $key = "", $value = "")
    {
        $json = new stdClass;
        $json->status = 'fail';
        $json->message = "Unknown error";
        switch ($this->input->method(true)) {
           
            case 'GET':
                $r = false;
                parse_str(file_get_contents("php://input"), $var);
                $data = $var;
                if ($type == 'user_list') {
                    $this->load->model('user_model');
                    $r = $this->user_model->user_list();
                }else if ($type == 'get_user') {
                    $id = $key;
                    $this->load->model('user_model');
                    $r = $this->user_model->get_user_personal($id);
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
