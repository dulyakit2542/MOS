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

        td {
            color: #424242;
            font-size: 11pt
        }
    </style>
    <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    </head>
    <!-- TimePicker -->
    <script src="<?php echo base_url() . 'theme/bootstrap4-datetime-picker-rails-master/vendor/assets/javascripts' ?>/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url() . 'theme/bootstrap4-datetime-picker-rails-master/vendor/assets/stylesheets' ?>/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />


    <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
    <div class="content-wrapper">
        <div class="content">

            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <!-- <h2>Products Inventory</h2> -->
                    <button type="button" class="btn btn-warning text-white btn-pill mb-3 mb-xxl-0" data-toggle="modal" data-target="#addExamRoom">
                        <strong>
                            <i class="fas fa-plus" style="color:#323232; font-weight: bold;"></i> <span class="h6" style="font-size:12pt; color:#323232; font-weight: bold;">เพิ่มห้องสอบ</span>
                        </strong>
                    </button>
                    <br><br>
                </div>
                <div class="card-body overflow-auto">
                    <table id="myTable" class="table table-hover table-product" style="width:100%;">

                        <thead>
                            <tr align="center" class="h6">
                                <th style="color: #323232; font-weight: bold;">รหัสห้องสอบ</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อโปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อห้องสอบ</th>
                                <th style="color: #323232; font-weight: bold;">สถานะ</th>
                                <th style="color: #323232; font-weight: bold;">วันที่สอบ</th>
                                <th style="color: #323232; font-weight: bold;">เวลาสอบ</th>
                                <th style="color: #323232; font-weight: bold;">สถานที่สอบ</th>
                                <th style="color: #323232; font-weight: bold;">จำนวน</th>
                                <th style="color: #323232; font-weight: bold;">แก้ไขล่าสุด</th>
                                <th style="color: #323232; font-weight: bold;">จัดการห้องสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($exam_room as $p) {
                            ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: left; ">
                                        <?php
                                        echo $p->exam_room_id;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->program_name;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->exam_room_name;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        if ($p->status_name == 'ปิดลงทะเบียนชั่วคราว') {
                                            echo '<span class="badge badge-pill badge-warning px-2 py-1">ปิด</span>';
                                        } elseif ($p->status_name == 'เปิดลงทะเบียน') {
                                            echo '<span class="badge badge-pill badge-success px-2 py-1">เปิด</span>';
                                        }
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        $pd = date("m/d/Y");
                                        if ($pd > $p->exam_room_date) {
                                            echo '<span class="badge badge-pill badge-danger">หมดเขต</span>';
                                        } else {
                                            $date = $p->exam_room_date;
                                            echo DateThaiNotTime1($date);
                                        }
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $p->exam_room_time;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->exam_room_address;
                                        ?>
                                    </td>

                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        $pc1 = 10;
                                        if ($pc1 == 0 || $pc1 == '') {
                                            $pc1 = '0';
                                            echo $pc1 . '/' .  $p->exam_room_max;
                                        } elseif ($pc1 < $p->exam_room_max) {
                                            echo $pc1 . '/' .  $p->exam_room_max;
                                        } elseif ($pc1 >= $p->exam_room_max) {
                                            echo '<h6 style="color: red;">';
                                            echo $pc1 . '/' .  $p->exam_room_max;
                                            echo '</h6>';
                                        }
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $p->edit_exam.", ".DateThai($p->edit_exam_date);
                                        ?>
                                    </td>
                                    <td align="center">
                                        <button type="button" class="mb-1 btn btn-pill btn-success" onclick="exam_room_edit('<?php echo $p->exam_room_id; ?>')"> แก้ไข</button>
                                        <button type="button" class="mb-1 btn btn-pill btn-danger" onclick="delete_exam_room('<?php echo $p->exam_room_id; ?>')"> ลบ</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="modal fade bd-example-modal-lg h6" id="addExamRoom" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มห้องสอบ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label>กรุณาใส่รหัสห้องสอบ</label>
                                <input name="exam_room_name" id="exam_room_id" type="text" class="form-control pass-swap" placeholder="เช่น MOS21001"><br>
                            </div>
                            <div class="col-md-6">
                                <label>กรุณาใส่ชื่อห้องสอบ</label>
                                <input name="exam_room_name" id="exam_room_name" type="text" class="form-control pass-swap" placeholder="เช่น EXM21001">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label>กรุณาใส่ที่อยู่ห้องสอบ</label>
                                <input name="new_program_room" id="exam_address_room" type="text" class="form-control pass-swap" placeholder="เช่น อาคารสำนักวิทยบริการฯ ชั้น4 ห้องปฏิบัติการคอมพิวเตอร์1">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label>โปรแกรม</label>
                                <select class="form-control" id="program_name_id" name="new_program_id">
                                    <option value="">กรุณาเลือกโปรแกรม</option>
                                    <?php
                                    foreach ($program_id as $p_id) {
                                    ?>
                                        <option value="<?php echo $p_id->program_type_id; ?>"><?php echo $p_id->program_name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                            </div>
                            <div class="col-md-6">
                                <label>จำนวนผู้ลงทะเบียนสูงสุด</label>
                                <input name="exam_room_name" id="exam_max" type="text" class="form-control pass-swap" placeholder="เช่น 100">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label>วันที่สอบ</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text py-1">
                                            <i class="mdi mdi-calendar-range"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="exam_date" name="dateRange" value="" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>เวลาสอบ</label>
                                <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                    <input type="text" id="exam_room_time" class="form-control datetimepicker-input" data-target="#datetimepicker3" />
                                    <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label>สถานะ</label>
                                <select class="form-control" id="exam_status" name="new_program_status">
                                    <option value="1000">เปิดลงทะเบียน</option>
                                    <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                                </select>
                            </div>
                        </div>
                        <input type="text" id="edit_exam" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                        <br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> ปิด</button>
                        <button type="button" class="btn btn-primary" onclick="history_exam_room()"><i class="fas fa-plus-circle"></i> เพิ่มห้องสอบ</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $('#datetimepicker3').datetimepicker({
                    format: 'H:mm'
                });
            });
        </script>
        <script src="<?php echo base_url() . 'js' ?>/date_custom.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>


    <?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
    ?>