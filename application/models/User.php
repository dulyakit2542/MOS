<?php
class User extends CI_model
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

    public function check_login($user_data)
    {
        $username = $user_data['username'];
        $password = $user_data['password'];
        $sql = "
        SELECT
            `user`.*
        FROM
             `user` 
        WHERE `user`.username = '$username' AND `user`.password = '$password'
        ";
        $q = $this->db->query($sql);
        $result = $q->result();
        if (count($result) > 0) {
            $user = array(
                'user_info' => $result[0],
                'permission' => $this->findPermission($result[0]->personal_id),
                'login' => true
            );
            return $user;
        } else {
            return false;
        }
    }
    public function findPermission($id)
    {
        $sql = "
        SELECT 
			`permission-type`.`text-type` as text_type
        FROM 
			`permission-list` 
        LEFT JOIN 
			`permission-type` 
        ON 
			`permission-list`.`permission-type-id` = `permission-type`.id 
        WHERE 
			`permission-list`.member_id = '$id'
        ";
        $q = $this->db->query($sql);
        return $q->result();
    }
    
    public function create_user($user_data)
    {
        $this->db->insert('user', $user_data);
    }

}
