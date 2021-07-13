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
	public function get_program_open()
	{
		$sql = "
		SELECT 
			*
		FROM 
			program_open
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
			program_open
		INNER JOIN
			program_status
		ON 
			program_open.program_status = program_status.program_status_id
		INNER JOIN
			program_type
		ON 
			program_open.program_name_id = program_type.program_type_id
		WHERE program_open_id = '$data'
			";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function program_id()
	{
		$sql = "
		SELECT
			*, 
			program_type.program_name, 
			program_type.program_type_id
		FROM
			program_type
		
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
		SELECT
			program_type.*
		FROM
			program_type
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	

	public function get_status()
	{
		$sql = "
		SELECT
			program_status.status_name
		FROM
			program_open,
			program_status
		WHERE
			program_status.program_status_id = program_open.program_status
			";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function program_train_wait()
	{
		$sql = "
		SELECT
			*
		FROM
			program_train_wait
			";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	
	public function program_training_pass()
	{
		$sql = "
		SELECT
	*, 
			program_type.program_type_id
		FROM
			program_member
		INNER JOIN
			program_open
		ON 
				program_member.program_open_id = program_open.program_open_id
		INNER JOIN
			`user`
		ON 
				program_member.personal_id = `user`.personal_id
		INNER JOIN
			program_type
		ON 
				program_open.program_name_id = program_type.program_type_id
		INNER JOIN
			user_section
		ON 
				`user`.section = user_section.`code`
		WHERE
			program_member.status_train = 'pass' OR program_member.status_train = 'notpass' 
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function exam_room()
	{
		$sql = "
		SELECT
			*
		FROM
			exam_room
			INNER JOIN
			program_type
			ON 
				exam_room.program_name_id = program_type.program_type_id
			INNER JOIN
			program_status
			ON 
				exam_room.program_status = program_status.program_status_id
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	// User
	public function exam_member($id)
	{
		$sql = "
		SELECT
		*
	FROM
		program_member
		INNER JOIN
		program_open
		ON 
			program_member.program_open_id = program_open.program_open_id
		INNER JOIN
		`user`
		ON 
			program_member.personal_id = `user`.personal_id
		INNER JOIN
		program_type
		ON 
			program_open.program_name_id = program_type.program_type_id
		INNER JOIN
		exam_member
		ON 
			`user`.personal_id = exam_member.personal_id
		INNER JOIN
		exam_room
		ON 
			exam_member.exam_room_id = exam_room.exam_room_id
	WHERE
		`user`.personal_id  = $id
			";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function train_member($id)
	{
		$sql = "
		SELECT
	*
FROM
	program_member
	INNER JOIN
	program_open
	ON 
		program_member.program_open_id = program_open.program_open_id
	INNER JOIN
	`user`
	ON 
		program_member.personal_id = `user`.personal_id
	INNER JOIN
	program_type
	ON 
		program_open.program_name_id = program_type.program_type_id
WHERE
	`user`.personal_id = $id
	";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	
	public function check_status($id)
	{
		$sql = "
		SELECT
		*
	FROM
		program_member
		INNER JOIN
		`user`
		ON 
			program_member.personal_id = $id
		WHERE program_member.status_train = 'pass'
	";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function program_train_regis($id, $data)
	{
		$this->db->where('program_member_id', $id);
		$this->db->update('program_member', $data);
	}

	// Program_open
	public function del_program_open($id)
	{
		$this->db->where('program_open_id', $id);
		$this->db->delete('program_open');
	}

	public function program_register($data)
	{
		$this->db->insert('program_member', $data);
	}
	public function edit_program($id, $data)
	{
		$this->db->where('program_open_id', $id);
		$this->db->update('program_open', $data);
	}
	


	public function del_program_member($id)
	{
		$this->db->where('program_member_id', $id);
		$this->db->delete('program_member');
	}

	

	//admin
	public function program_train($id, $data)
	{
		$this->db->where('train_member_id', $id);
		$this->db->update('train_member', $data);
	}
}
