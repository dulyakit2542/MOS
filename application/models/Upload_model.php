<?php
class Upload_model extends CI_model
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
    public function upload_profile()
    {
        $config['upload_path']   = './files/user_img/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
        $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
        $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
        $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
        $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
        $config['encrypt_name']  = false; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน

        $this->load->library('upload', $config);

        //ตรวจสอบว่า การ Upload สำเร็จหรือไม่    
        if (!$this->upload->do_upload('img')) {
            redirect('user');
        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = $this->upload->data();
            $filename = $data['file_name'];
            $data = array(
                'img' => $filename
            );
            redirect('user');
        }
    }
    public function upload_program()
    {
        $config['upload_path']   = './files/program_image/'; //Folder สำหรับ เก็บ ไฟล์ที่  Upload
        $config['allowed_types'] = 'gif|jpg|png'; //รูปแบบไฟล์ที่ อนุญาตให้ Upload ได้
        $config['max_size']      = 0; //ขนาดไฟล์สูงสุดที่ Upload ได้ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
        $config['max_width']     = 0; //ขนาดความกว้างสูงสุด (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
        $config['max_height']    = 0;  //ขนาดความสูงสูงสดุ (กรณีไม่จำกัดขนาด กำหนดเป็น 0)
        $config['encrypt_name']  = false; //กำหนดเป็น true ให้ระบบ เปลียนชื่อ ไฟล์  อัตโนมัติ  ป้องกันกรณีชื่อไฟล์ซ้ำกัน

        $this->load->library('upload', $config);

        //ตรวจสอบว่า การ Upload สำเร็จหรือไม่    
        if (!$this->upload->do_upload('program_image')) {
            redirect('admin/manage_program');
        } else {
            //ตัวแปร $data เก็บข้อมูล ของไฟล์ที่ Upload
            $data = $this->upload->data();
            $filename = $data['file_name'];
            $data = array(
                'program_image' => $filename
            );
            redirect('admin/manage_program');
        }
    }
}
