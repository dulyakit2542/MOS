<?php
$permission_admin = false;
if (count($_SESSION) > 1) {
    foreach ($_SESSION['permission'] as $row) {
        if ($row->text_type == 'admin') {
            $permission_admin = true;
        }
    }
}
if ($permission_admin) {
?>
    <title>จัดการห้องสอบ : ADMIN</title>
    <style>
        .card1 {
            background-color: white;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
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
                            <h5 style="color:#505050 ; font-size:20px"><i class="fas fa-edit"></i> แก้ไขชุดข้อสอบในระบบ</h5>
                        </div>
                        <hr>
                        <div class="container " align="left">
                            <div class="row -1 ">
                                <div class="col-md-6">
                                    <label>ชื่อโปรแกรม</label>
                                    <?php
                                    ?>
                                    <select class="form-control" id="program_id" name="program_name_id">
                                        <option value="<?php echo $exam_archive_byId[0]->program_id; ?>"><?php echo $exam_archive_byId[0]->program_name; ?></option>
                                        <?php
                                        foreach ($program_type as $pt) {
                                        ?>
                                            <option value="<?php echo $pt->program_type_id; ?>"> <?php echo $pt->program_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>รหัสชุดข้อสอบ</label>
                                    <input id="exam_archive_id" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_id; ?>"><br>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label>ชื่อชุดข้อสอบ</label>
                                    <input id="exam_archive_name" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_name; ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label>จำนวนข้อสอบ</label>
                                    <input id="exam_archive_amount" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_amount; ?>"><br>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label>ชุดข้อสอบคงเหลือ</label>
                                    <input id="exam_archive_balance" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_balance; ?>"><br>
                                </div>
                                <div class="col-md-6">

                                    <label>วันหมดอายุ</label>
                                    <input value="<?php echo $exam_archive_byId[0]->exam_archive_ex; ?>" type="date" class="form-control" id="exam_archive_ex">
                                </div>
                            </div>

                            <div class="row mt-1">

                            </div>

                            <br>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <h6 class="h6" style="font-size: 11pt;"> แก้ไขล่าสุดโดย
                                        <?php
                                        $date = $exam_archive_byId[0]->edit_exam_archive_date;
                                        echo $exam_archive_byId[0]->edit_exam_archive . ' เมื่อ ' . DateThai($date);
                                        ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        $strDate = date("Y-m-d h:i:s");
                        // DateThai($strDate);
                        // echo $strDate;
                        ?>
                        <input type="text" id="edit_exam_archive" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                        <div align="center" class="mb-5 mt-5">
                            <a href="javascript:history.go(-1)"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                            <?php $id = $exam_archive_byId[0]->exam_archive_id; ?>
                            <button type="button" class="btn btn-primary" onclick="save_exam_archive('<?php echo $id ?>')"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("exam_archive").className = "active";
        document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">ชุดข้อสอบในระบบ/</span>แก้ไขชุดข้อสอบ`;

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