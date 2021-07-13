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
    <title>แก้ไขห้องสอบ : ADMIN</title>
    <style>
        .card1 {
            background-color: white;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
    <html>
<!-- TimePicker -->
<script src="<?php echo base_url() . 'theme/bootstrap4-datetime-picker-rails-master/vendor/assets/javascripts' ?>/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/bootstrap4-datetime-picker-rails-master/vendor/assets/stylesheets' ?>/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />

    <div class="content-wrapper">
        <div class="content">
            <!-- For Components documentaion -->
            <div class="row">

                <div class="col-xl-12">
                    <!-- Form Square -->
                    <div class="card card-default">
                        <br>
                        <div align="center">
                            <h5 style="color:#505050 ; font-size:20px"><i class="fas fa-edit"></i> แก้ไขห้องอบรม</h5>
                        </div>
                        <hr>
                        <div class="container " align="left">
                        <div class="row mt-1">
                        <div class="col-md-6">
                                    <label>รหัสห้องสอบ</label>
                                    <input name="exam_room_address" id="exam_room_id" type="text" class="form-control pass-swap" value="<?php echo $program[0]->exam_room_id; ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label>ชื่อห้องสอบ</label>
                                    <input name="exam_room_address" id="exam_room_name" type="text" class="form-control pass-swap" value="<?php echo $program[0]->exam_room_name;?>"><br>
                                </div>
                            </div>
                            <div class="row mt-1 ">
                                <div class="col-md-6">
                                    <label>ชื่อโปรแกรม</label>
                                    <?php
                                    ?>

                                    <select class="form-control" id="program_name_id" name="program_name_id">
                                        <option value="<?php echo $program[0]->program_name_id; ?>"><?php echo $program[0]->program_name; ?></option>
                                        <?php
                                        foreach ($program_type as $pt) {
                                        ?>
                                            <option value="<?php echo $pt->program_type_id; ?>"> <?php echo $pt->program_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select><br>
                                </div>
                                <div class="col-md-6">
                                <label>จำนวนผู้ลงทะเบียนสูงสุด</label>
                                <input name="exam_room_name" id="exam_room_max" type="text" value="<?php echo $program[0]->exam_room_max;?>" class="form-control pass-swap" placeholder="เช่น 100"><br>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label>สถานที่สอบ</label>
                                    <input name="exam_room_address" id="exam_room_address" type="text" class="form-control pass-swap" value="<?php echo $program[0]->exam_room_address ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label>สถานะ</label>
                                    <select class="form-control" id="program_status" name="program_status">
                                        <option value="<?php echo $program[0]->program_status; ?>"><?php echo $program[0]->status_name; ?></option>
                                        <option value="1000">เปิดลงทะเบียน</option>
                                        <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                                    </select><br>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="md-form">
                                        <div class="form-group">
                                            <label for="firstName">วันที่สอบ</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text py-1">
                                                        <i class="mdi mdi-calendar-range"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="exam_room_date" name="dateRange" value="<?php echo $program[0]->exam_room_date; ?>"" placeholder=" Date"><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                <label>เวลาสอบ</label>
                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                    <input type="text" id="exam_room_time" value="<?php echo $program[0]->exam_room_time; ?>"class="form-control datetimepicker-input" data-target="#datetimepicker3" />
                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <br>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <h6 class="h6" style="font-size: 11pt;"> แก้ไขล่าสุดโดย
                                        <?php
                                        $date = $program[0]->edit_exam_date;
                                        echo $program[0]->edit_exam . ' เมื่อ ' . DateThai($date);
                                        ?>
                                    </h6>
                                </div>
                            </div>

                            <input type="text" id="edit_exam" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">

                            <div class="mb-5 mt-5" align="center">
                                <a href="<?php echo base_url() . 'admin/manage_exam_room' ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                                <?php $id = $program[0]->exam_room_id; ?>
                                <button type="button" class="btn btn-primary" onclick="save_exam_room('<?php echo $id ?>')"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("manage_exam_room").className = "active";
            document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">จัดการห้องสอบ/</span>แก้ไขห้องสอบ`;
        </script>
        <script src="<?php echo base_url() . 'js' ?>/train.js"></script>
        <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
            var date = document.getElementById("get_program_date").value;
            console.log(date);
            document.getElementById("date").innerHTML = dateThaiJs(date);
        </script>
        <script type="text/javascript">
            $(function() {
                $('#datetimepicker3').datetimepicker({
                    format: 'H:mm'
                });
            });
        </script>

    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>