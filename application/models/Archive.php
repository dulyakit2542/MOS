   <?php
class Archive extends CI_model
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

	
    
}
