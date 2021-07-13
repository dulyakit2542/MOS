<?php
class User_model extends CI_model
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
    public function get_user()
    {
        $sql = "
         SELECT
            `user`.*
        FROM
            `user`
        ";
        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }
    public function get_user_id($user_id)
    {
        $sql = "
         SELECT
            `user`.*
        FROM
            `user`
        WHERE
            `user`.user_id = '$user_id'
        ";

        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }

    public function get_section($section)
    {
        $sql = "
        SELECT
        *
    	FROM
        user_section
        WHERE
            user_section.`code` = $section
        ";
        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }
    public function get_faculty($section1)
    {
        $sql = "
        SELECT
        *
        FROM
        user_section
        
        WHERE
            user_section.`code` = $section1
             
         ";
        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }
    public function user_list()
    {
        $sql = "SELECT
        *
    FROM
        `user`
        INNER JOIN
        user_section
        ON 
            `user`.section = user_section.`code`
            ";

        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }
    public function user_list_byId($id)
    {
        $sql = "
        SELECT
        *
    FROM
        `user`
        INNER JOIN
        user_section
        ON 
            `user`.section = user_section.`code`
            WHERE personal_id = $id
            ";

        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }

    public function get_user_personal($id)
    {
       $sql = "
        SELECT
        *
    	FROM
        user
        WHERE
            user.`personal_id` = $id
        ";
        $this->q = $this->db->query($sql);
        $this->rs = $this->q->result();
        $this->c = count($this->rs);
        $this->r = $this->q->row();
        return $this->rs;
    }


    public function update_user($id, $data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('user', $data);
    }
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
    }

    public function new_game($data)
    {
        return ($this->db->insert('game', $data)) ? true : false;
    }
}
