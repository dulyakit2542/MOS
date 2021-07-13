<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function user($type = "", $key = "", $value = "")
	{
		$json = new stdClass;
		$json->status = 'fail';
		$json->message = "Unknown error";
		switch ($this->input->method(true)) {

			case 'POST':
				$r = false;
				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				if ($type == 'edit_profile') {
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
			case 'INSERT':
				$r = false;
				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				if ($type == 'insert_useraaa') {
					$id = $key;
					$this->load->model('game');
					$r = $this->game->insert_game($data);
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
	public function exam($type = "", $key = "", $value = "")
	{
		$json = new stdClass;
		$json->status = 'fail';
		$json->message = "Unknown error";
		switch ($this->input->method(true)) {
			case 'POST':
				$r = false;
				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				$data1 = $var;
				if ($type == 'new_exam_room') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->new_exam_room($data);
				} else if ($type == 'history_exam_room') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->history_exam_room($data1);
				} else if ($type == 'exam_register') {
					$this->load->model('Program_model');
					$r = $this->Program_model->exam_register($data);
				} else if ($type == 'edit_exam_room') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->edit_exam_room($id, $data);
				} else if ($type == 'exam_member_approve') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->exam_member_approve($id, $data);
				} else if ($type == 'new_exam_archive') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->new_exam_archive($data);
				} else if ($type == 'delete_exam_archive') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->delete_exam_archive($id);
				} else if ($type == 'save_exam_archive') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->save_exam_archive($id, $data);
				}else if ($type == 'history_exam_user') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->history_exam_user($data1);
				}
				
				break;

			case 'DELETE':
				$r = false;
				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				if ($type == 'delete_exam_room') {
					$id = $key;
					$this->load->model('Program_model');
					$r = $this->Program_model->delete_exam_room($id, $data);
				}
				break;
		}
		echo json_encode($json);
	}
	public function program($type = "", $key = "", $value = "")
	{
		$json = new stdClass;
		$json->status = 'fail';
		$json->message = "Unknown error";
		switch ($this->input->method(true)) {
			case 'POST':
				$r = false;
				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				if ($type == 'edit_program') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->edit_program($id, $data);
				} else 
				if ($type == 'edit_mprogram') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->edit_mprogram($id, $data);
				} else 
				if ($type == 'insert_program') {
					$this->load->model('program_model');
					$r = $this->program_model->insert_program($data);
				} else 
				if ($type == 'program_register') {
					$this->load->model('program_model');
					$r = $this->program_model->program_register($data);
				} else 
				if ($type == 'program_train_regis') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->program_train_regis($id, $data);
				} else 
				if ($type == 'program_train') {
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
				if ($type == 'new_program') {
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
				if ($type == 'delete_program_open') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->del_program_open($id);
				} else if ($type == 'delete_program') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->del_program($id);
				} else if ($type == 'delete_program_member') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->del_program_member($id);
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

	public function home($type = "", $key = "", $value = "")
	{
		$json = new stdClass;
		$json->status = 'fail';
		$json->message = "Unknown error";
		$r = false;
		switch ($this->input->method(true)) {
			case 'POST':

				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				if ($type == 'program') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->get_program();
				} else if ($type == 'insert_program') {
					$this->load->model('program_model');
					$r = $this->program_model->insert_program($data);
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
			case 'INSERT':
				$r = false;
				parse_str(file_get_contents("php://input"), $var);
				$data = $var;
				if ($type == 'new_program') {
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
				if ($type == 'delete_program_open') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->del_program_open($id);
				} else if ($type == 'delete_program') {
					$id = $key;
					$this->load->model('program_model');
					$r = $this->program_model->del_program($id);
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

	public function users($type = '', $key = '', $value = '', $option1 = '', $option2 = '')
	{

		$r = new stdClass;
		$r->rerult = false;
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'GET':
				if ($type == 'get_user') {
					$this->load->model('user');
					$r->result = $this->session;
					var_dump($r->result);
				}
				break;
			case 'PUT':
				break;
			case 'POST':
				break;
			case 'DELETE':
				break;
		}
		echo json_encode($r);
	}


	//end
}
