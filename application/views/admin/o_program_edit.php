<?php
$permission_admin = false;
if (count($_SESSION) > 1) {
    foreach ($_SESSION['permission'] as $row) {
        if ($row->text_type == 'admin') {
            $permission_admin = true;
        }
    }
}
// var_dump($_SESSION);
if ($permission_admin) {
?>
    <title>เพิ่ม/แก้ไขโปรแกรมที่เปิด : ADMIN</title>
    <style>
        .card1 {
            background-color: white;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
    <html>
    <!-- CSS only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <br>

    <body>
        <center>
            <div class="container  wow fadeIn">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <br>
                        <div>
                            <h5 style="color:#505050 ; font-size:20px" class="modal-title h2 "><i class="fas fa-edit"></i> แก้ไขโปรแกรมที่เปิดอบรม</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <hr>
                        <div class="container" align="left">
                            <div class="row mt-1 ">
                                <div class="col-md-12"><br>
                                    <label>ชื่อโปรแกรม</label>
                                    <select class="form-control" id="edit_program_id" name="edit_program_id">
                                        <option value="<?php echo $program[0]->program_name_id; ?>"><?php echo $program[0]->program_name; ?></option>
                                        <?php
                                        foreach ($program_type as $pt) {
                                        ?>
                                            <option value="<?php echo $pt->program_type_id; ?>"> <?php echo $pt->program_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <label>จำนวนผู้ลงทะเบียนสูงสุด</label>
                                    <select class="form-control" id="edit_program_max" name="edit_program_max">
                                        <option value="<?php echo $program[0]->program_max; ?>"> <?php echo $program[0]->program_max; ?></option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <label>ชื่อกลุ่มอบรม</label>
                                    <input name="edit_program_room" id="edit_program_room" type="text" class="form-control pass-swap" value="<?php echo $program[0]->program_room ?>"><br>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <label>สถานะ</label>
                                    <select class="form-control" id="edit_program_status" name="edit_program_status">
                                        <option value="<?php echo $program[0]->program_status; ?>"><?php echo $program[0]->status_name; ?></option>
                                        <option value="1000">เปิดลงทะเบียน</option>
                                        <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <div class="md-form">
                                        <label>วันที่สิ้นสุด</label> <br><br>
                                        <?php
                                        $date = $program[0]->program_date;
                                        echo DateThaiNotTime($date) ;
                                        ?><br>
                                        <!-- <input placeholder="วันที่สิ้นสุด" disabled type="text" id="date-picker-example" class="form-control datepicker" > -->
                                        <input value="<?php echo $program[0]->program_date; ?>" type="date" class="datepicker" id="program_date">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-1">
                                <div class="col-md-12"><h6 class="h6" style="font-size: 11pt;">แก้ไขล่าสุดโดย 
                                <?php 
                                $date = $program[0]->edit_program_date;
                                     echo $program[0]->edit_program . ' เมื่อ ' . DateThai($date);
                                ?>
                                </h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        $strDate = date("Y-m-d h:i:s");
                        DateThai($strDate);
                        ?>
                        <input type="text" id="edit_program" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                        <input type="text" style="display:none" id="edit_program_date" value="<?php echo $strDate; ?>" />

                        <div class="modal-footer">
                            <a href="<?php echo base_url() . 'program' ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                            <?php $id = $program[0]->program_open_id; ?>
                            <button type="button" class="btn btn-primary" onclick="save_program(<?php echo $id ?>)"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </body><br><br>
    <script>
        $('.program_date').datepicker({
            format: 'dd/mm/yyyy',
            startDate: '-3d' ,
            setTime : new Date().setHours(00, 00, 00)
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>