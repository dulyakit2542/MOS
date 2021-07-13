<?php
class Exam_room extends CI_model
{
    private $f = '';        // filter
    private $o = '';        // order
    private $q = Null;        // query
    private $rs = Null;        // record set
    private $r = Null;        // current record
    private $c = 0;            // record count
    public function __construct()
    {
        $this->load->database();
    }

    // GET
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


	public function exam_archive_score_null()
	{
		$sql = "
	SELECT * FROM `exam_member`
	WHERE exam_member.exam_member_score = ''
	";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function exam_archive_byId($id)
	{
		$sql = "
		SELECT
	*
FROM
	exam_archive
	INNER JOIN
	program_type
	ON 
		exam_archive.program_id = program_type.program_type_id
		WHERE exam_archive.exam_archive_id = '$id'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function exam_archive()
	{
		$sql = "
		SELECT
	*
FROM
	exam_archive
	INNER JOIN
	program_type
	ON 
		exam_archive.program_id = program_type.program_type_id
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function exam_approve()
	{
		$sql = "
		SELECT
		*, 
		exam_member.*
	FROM
		exam_member
		INNER JOIN
		`user`
		ON 
			exam_member.personal_id = `user`.personal_id
		INNER JOIN
		exam_room
		ON 
			exam_member.exam_room_id = exam_room.exam_room_id
		INNER JOIN
		program_type
		ON 
			exam_room.program_name_id = program_type.program_type_id
		INNER JOIN
		user_section
		ON 
			`user`.section = user_section.`code`
	WHERE
		exam_member.exam_member_status = 'wait'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
	public function exam_define()
	{
		$sql = "
		SELECT
	*
FROM
	exam_member
	INNER JOIN
	exam_archive
	ON 
		exam_member.exam_archive = exam_archive.exam_archive_id
	INNER JOIN
	`user`
	ON 
		exam_member.personal_id = `user`.personal_id
	INNER JOIN
	exam_room
	ON 
		exam_member.exam_room_id = exam_room.exam_room_id
	INNER JOIN
	program_status
	ON 
		exam_room.program_status = program_status.program_status_id
	INNER JOIN
	program_type
	ON 
		exam_archive.program_id = program_type.program_type_id
	INNER JOIN
	user_section
	ON 
		`user`.section = user_section.`code`
WHERE
	exam_member_status = 'waiting_exam'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function exam_score_success()
	{
		$sql = "
		SELECT
	*
FROM
	exam_member
	INNER JOIN
	exam_archive
	ON 
		exam_member.exam_archive = exam_archive.exam_archive_id
	INNER JOIN
	`user`
	ON 
		exam_member.personal_id = `user`.personal_id
	INNER JOIN
	exam_room
	ON 
		exam_member.exam_room_id = exam_room.exam_room_id
	INNER JOIN
	program_status
	ON 
		exam_room.program_status = program_status.program_status_id
	INNER JOIN
	program_type
	ON 
		exam_archive.program_id = program_type.program_type_id
	INNER JOIN
	user_section
	ON 
		`user`.section = user_section.`code`
WHERE
	exam_member_score > 0 OR exam_member_score = 'not_exam'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
    public function program_exam_regis($id)
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
		WHERE program_type.program_type_id = '$id'
			";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

	public function get_exam_room($id)
	{
		$sql = "
		SELECT
	*
FROM
	program_status
	INNER JOIN
	program_type
	INNER JOIN
	exam_room
	ON 
		program_type.program_type_id = exam_room.program_name_id AND
		program_status.program_status_id = exam_room.program_status
WHERE
exam_room_id =  '$id'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}
    public function program_check_training()
	{
		$sql = "
		SELECT
	*, 
			program_type.program_type_id
		FROM
			train_member
		INNER JOIN
			train_room
		ON 
				train_member_id.train_room_id = train_room.train_room_id
		INNER JOIN
			`user`
		ON 
				train_member_id.personal_id = `user`.personal_id
		INNER JOIN
			program_type
		ON 
				train_room.program_name_id = program_type.program_type_id
		INNER JOIN
			user_section
		ON 
				`user`.section = user_section.`code`
		WHERE
			train_member_id.wait_for_test = 'wait'
		";
		$this->q = $this->db->query($sql);
		$this->rs = $this->q->result();
		$this->c = count($this->rs);
		$this->r = $this->q->row();
		return $this->rs;
	}

    
    
}
