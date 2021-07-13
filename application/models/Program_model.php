<?php
class Program_model extends CI_model
{
	private $f = '';		// filter
	private $o = '';		// order
	private $q = Null;		// query
	private $rs = Null;		// record set
	private $r = Null;		// current record
	private $c = 0;			// record count
	public function __construct()
	{
		$this->load->database();
	}
	public function get_program()
	{
		$sql = "
		SELECT
	*
FROM
	train_room
	INNER JOIN
	program_status
	ON 
		train_room.train_room_status = program_status.program_status_id
	INNER JOIN
	program_type
	ON 
		train_room.program_type_id = program_type.program_type_id
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function program_type()
	{
		$sql = "
		SELECT * FROM `program_type`
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function get_train_room_id($data)
	{
		$sql = "
		SELECT
	*
FROM
	train_room
	INNER JOIN
	program_type
	ON 
		train_room.program_type_id = program_type.program_type_id
	INNER JOIN
	program_status
	ON 
		train_room.train_room_status = program_status.program_status_id
		WHERE train_room.train_room_id = '$data'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function program_type_id($id)
	{
		$sql = "
		SELECT
			program_type.*
		FROM
			program_type
		WHERE program_type.program_type_id = '$id'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function get_program_id($data)
	{
		$sql = "
		SELECT
	*
FROM
	train_room
	INNER JOIN
	program_status
	ON 
		train_room.train_room_status = program_status.program_status_id
	INNER JOIN
	program_type
	ON 
		train_room.program_type_id = program_type.program_type_id
		WHERE train_room_id = '$data'
			";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	// Program manage
	public function new_program($data)
	{
		$this->db->insert('program_type', $data);
	}
	public function del_program($id)
	{
		$this->db->where('program_type_id', $id);
		$this->db->delete('program_type');
	}
	public function edit_mprogram($id, $data)
	{
		$this->db->where('program_type_id', $id);
		$this->db->update('program_type', $data);
	}

	// Exam
	public function new_exam_room($data)
	{
		$this->db->insert('exam_room', $data);
		// $this->db->insert('history_exam_room', $data);
	}
	public function history_exam_room($data1)
	{
		$this->db->insert('history_exam_room', $data1);
	}
	public function history_exam_user($data1)
	{
		$this->db->insert('history_exam_user', $data1);
	}
	public function new_exam_archive($data)
	{
		$this->db->insert('exam_archive', $data);
	}
	public function delete_exam_archive($id)
	{
		$this->db->where('exam_archive_id', $id);
		$this->db->delete('exam_archive');
	}
	public function delete_exam_room($id)
	{
		$this->db->where('exam_room_id', $id);
		$this->db->delete('exam_room');
	}
	public function exam_register($data)
	{
		$this->db->insert('exam_member', $data);
	}
	public function edit_exam_room($id, $data)
	{
		$this->db->where('exam_room_id', $id);
		$this->db->update('exam_room', $data);
	}
	public function exam_member_approve($id, $data)
	{
		$this->db->where('exam_member_id', $id);
		$this->db->update('exam_member', $data);
	}
	public function save_exam_archive($id, $data)
	{
		$this->db->where('exam_archive_id', $id);
		$this->db->update('exam_archive', $data);
	}
}
