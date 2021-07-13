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
                            <h5 style="color:#505050 ; font-size:20px"><i class="fas fa-edit"></i> แก้ไขโปรแกรมในระบบ</h5>
                        </div>
                        <hr>
                        <div class="container " align="left">
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label>รหัสโปรแกรม</label>
                                    <input name="exam_room_address" id="program_type_id" type="text" class="form-control pass-swap" value="<?php echo $program[0]->program_type_id; ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label>ชื่อโปรแกรม</label>
                                    <input name="exam_room_address" id="program_name" type="text" class="form-control pass-swap" value="<?php echo $program[0]->program_name; ?>"><br>
                                  <br>
                                </div>
                            </div>
                            <div class="row mt-1 ">
                                <div class="col-md-6" align="center">
                                    <img style="width:200px; height: 100px;" src="<?php echo base_url() . 'files/program_image/' . $program[0]->program_imge; ?>" >
                                </div>
                                <div class="col-md-6">
                                    <label>รูปภาพโปรแกรม</label>
                                    <center>
                                        <h6 style="color: red; font-size: 10pt;">***กรุณาเปลี่ยนชื่อรูปภาพโปรแกรมตามเวอร์ชันของโปรแกรมก่อนอัปโหลด***</h6>
                                    </center>
                                    <form  action="<?php echo base_url() . 'upload/upload_program'; ?>" method="post" id="program_image" enctype="multipart/form-data">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="program_image" id="new_program_img" lang="es" value="">
                                            <label class="custom-file-label" for="program_image">เลือกรูปภาพ</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    <input type="text" id="program_type_admin" style="display:none ;" value="<?php echo $_SESSION['user_info']->fname_en;?>">

                            <br>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <h6 class="h6" style="font-size: 11pt;"> แก้ไขล่าสุดโดย
                                        <?php
                                        $date = $program[0]->program_type_admin_date;
                                        echo $program[0]->program_type_admin . ' เมื่อ ' . DateThai($date);
                                        ?>
                                    </h6>
                                </div>
                            </div>
                            <input type="text" id="edit_exam" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                            <div class="mt-5 mb-5" align="center">
                                <a href="javascript:history.go(-1)"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                                <?php $id = $program[0]->program_type_id; ?>
                                <button type="button" class="btn btn-primary" onclick="save_mprogram('<?php echo $id ?>')"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("manage_pogram").className = "active";
            document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">โปรแกรมในระบบ/</span>แก้ไขโปรแกรมในระบบ`;

            var date = document.getElementById("get_program_date").value;
            console.log(date);
            document.getElementById("date").innerHTML = dateThaiJs(date);
        </script>
        <script src="<?php echo base_url() . 'js' ?>/program.js"></script>
        <script src="<?php echo base_url() . 'js' ?>/train.js"></script>
        <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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