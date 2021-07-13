<?php
class Train_room extends CI_model
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
    // CRUD
    public function add_train_room($data)
    {
        $this->db->insert('train_room', $data);
    }
    public function edit_train_room($id, $data)
    {
        $this->db->where('train_room_id', $id);
        $this->db->update('train_room', $data);
    }
    public function delete_train_room($id)
    {
        $this->db->where('train_room_id', $id);
        $this->db->delete('train_room');
    }


    // GET
    public function training_status_wait()
    {
        $sql = "
		SELECT
	*
FROM
	train_member
	INNER JOIN
	`user`
	ON 
		train_member.personal_id = `user`.personal_id
	INNER JOIN
	program_type
	INNER JOIN
	train_room
	ON 
		program_type.program_type_id = train_room.program_type_id AND
		train_member.train_room_id = train_room.train_room_id
	INNER JOIN
	user_section
	ON 
		`user`.section = user_section.`code`
WHERE
	train_member.train_member_status = 'wait'
		";
        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }
    public function training_status_pass()
    {
        $sql = "
		SELECT
	*
FROM
	train_member
	INNER JOIN
	`user`
	ON 
		train_member.personal_id = `user`.personal_id
	INNER JOIN
	program_type
	INNER JOIN
	train_room
	ON 
		program_type.program_type_id = train_room.program_type_id AND
		train_member.train_room_id = train_room.train_room_id
	INNER JOIN
	user_section
	ON 
		`user`.section = user_section.`code`
WHERE
	train_member.train_member_status = 'pass'
		";
        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }

    //Train_approve
    public function train_member($id, $data)
	{
		$this->db->where('train_member_id', $id);
		$this->db->update('train_member', $data);
	}
    
    
}
