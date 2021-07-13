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
                        <div class="container" align="left">
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label>รหัสห้องอบรม</label>
                                    <input name="edit_program_room" id="train_room_id" type="text" class="form-control pass-swap" value="<?php echo $program[0]->train_room_id ?>"><br>
                                </div>
                                <div class="col-md-6">
                                    <label>ชื่อกลุ่มอบรม</label>
                                    <input name="edit_program_room" id="train_room_name" type="text" class="form-control pass-swap" value="<?php echo $program[0]->train_room_name ?>"><br>
                                </div>
                            </div>
                            <div class="row mt-1 ">
                                <div class="col-md-6">
                                    <label>ชื่อโปรแกรม</label>
                                    <select class="form-control" id="program_type_id" name="edit_program_id">
                                        <option value="<?php echo $program[0]->program_type_id; ?>"><?php echo $program[0]->program_name; ?></option>
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
                                    <input name="train_room_max" id="train_room_max" type="text" value="<?php echo $program[0]->train_room_max; ?>" class="form-control pass-swap" placeholder="เช่น 100"><br>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <label>สถานะ</label>
                                    <select class="form-control" id="train_room_status" name="edit_program_status">
                                        <option value="<?php echo $program[0]->train_room_status; ?>"><?php echo $program[0]->status_name; ?></option>
                                        <option value="1000">เปิดลงทะเบียน</option>
                                        <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                                    </select><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName">วันที่สิ้นสุด</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text py-1">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" id="train_room_date_ex" name="dateRange" value="<?php echo $program[0]->train_room_date_ex; ?>" placeholder="Date"><br>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <h6 class="h6" style="font-size: 11pt;">แก้ไขล่าสุดโดย
                                        <?php
                                        $date = $program[0]->train_room_admin_date;
                                        echo $program[0]->train_room_admin . ' เมื่อ ';
                                        ?>
                                        <input id="get_program_date" type="text" style="display: none;" value="<?php echo $date;?>">
                                        <span id="date"></span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <input type="text" id="train_room_admin" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                        <hr>
                        <div align="center">
                            <a href="<?php echo base_url() . 'admin/manage_room_train'; ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                            <?php $id = $program[0]->train_room_id; ?>
                            <button type="button" class="btn btn-primary" onclick="save_train_room('<?php echo $id ?>')"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                        </div><br><br>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <script src="<?php echo base_url() . 'js' ?>/train.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        var date = document.getElementById("get_program_date").value;
        console.log(date);
        document.getElementById("manage_room_train").className = "active";
        document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">จัดการห้องอบรม/</span>แก้ไขห้องอบรม`;
        document.getElementById("date").innerHTML = dateThaiJs(date);
    </script>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>