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

    <html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


    <body>
        <br>
        <div class="container-fluid wow fadeIn">
            <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
                <strong>
                    <h2 class="h2" style="color: #323232; font-size:16pt;"><strong> จัดการห้องสอบ</strong></h2>
                </strong>
                <ul class="list-unstyled d-flex p-1 m-1">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">จัดการห้องสอบ</li>
                </ul>
            </nav>
            <a class="btn btn-warning btn-rounded waves-effect waves-light h6" onclick="show_openprogram()" style="color: #323232;">
                <strong>
                    <i class="fas fa-plus"></i> เพิ่มห้องสอบ
                </strong>
            </a><br><br>

            <table id="myTable" class="table " cellspacing="0" style="box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);">

                <thead>
                    <tr align="center">
                        <th style="color: #323232; font-weight: bold;">ลำดับที่</th>
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
                    // echo '<pre>';
                    // var_dump($exam_room);
                    // echo '</pre>';
                    foreach ($exam_room as $p) {
                    ?>
                        <tr>
                            <td style="text-align: center; font-size: 12px;">
                                <?php
                                echo $p->exam_room_id;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $p->program_name;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $p->exam_room_name;
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                if ($p->status_name == 'ปิดลงทะเบียนชั่วคราว') {
                                    echo '<span class="badge badge-warning px-2 py-1">ปิด</span>';
                                } elseif ($p->status_name == 'เปิดลงทะเบียน') {
                                    echo '<span class="badge badge-success px-2 py-1">เปิด</span>';
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                $pd = date("Y-m-d");
                                if ($pd == $p->exam_room_date) {
                                    echo '<h6 style="color: red;">วันนี้</h6>';
                                } elseif ($pd > $p->exam_room_date) {
                                    echo '<h6 style="color: red;">หมดเขต</h6>';
                                } else {
                                    $date = $p->exam_room_date;
                                    echo DateThaiNotTime($date);                                 
                                    // echo ($date("d" . "/" . "m" . "/" )).$year;
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                echo $p->exam_room_time;
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                echo $p->exam_room_address;
                                ?>
                            </td>

                            <td style="text-align: center;">
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
                            <td style="text-align: center;">
                                <?php
                                $date = $p->edit_exam_date;
                                echo $p->edit_exam . ', ' . DateThai($date);
                                ?>
                            </td>
                            <td align="center">
                                <a class="btn btn-dark-green waves-effect waves-light h7" id="exam_room_id" onclick="exam_room_edit(<?php echo $p->exam_room_id; ?>)">
                                    แก้ไข
                                </a>
                                <a class=" btn-rounded btn btn-yt waves-effect waves-light h7" onclick="history_exam_room()">
                                    นำเข้าประวัติ
                                </a>
                                <a class=" btn-rounded btn btn-yt waves-effect waves-light h7" onclick="delete_exam_room(<?php echo $p->exam_room_id; ?>)">
                                    ลบ
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <br><br>
    </body>
    <div class="modal fade bd-example-modal-lg h6" id="addprogramopen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มห้องสอบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row mt-1">
                        <div class="col-md-12">
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
                            </select>
                        </div>
                    </div><br>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label>กรุณาใส่ชื่อห้องสอบ</label>
                            <input name="exam_room_name" id="exam_room_name" type="text" class="form-control pass-swap">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label>จำนวนผู้ลงทะเบียนสูงสุด</label>
                            <select class="form-control" id="exam_max" name="new_program_max">
                                <option value="null">กรุณาเลือกจำนวน</option>
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
                            <label>กรุณาใส่ที่อยู่ห้องสอบ</label>
                            <input name="new_program_room" id="exam_address_room" type="text" class="form-control pass-swap">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label>สถานะ</label>
                            <select class="form-control" id="exam_status" name="new_program_status">
                                <option value="1000">เปิดลงทะเบียน</option>
                                <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="md-form">
                            <div class="col-md-12">
                            <label style="margin-left: 12pt; color:black; ">วันที่สอบ</label> <br><br>
                                <input type="date" class="datepicker" id="exam_date" name="new_program_date">
                            </div>
                        </div>
                    </div>
                    <div class="well">
                        เวลาสอบ
                        <div id="datetimepicker3" class="input-append">
                            <input data-format="hh:mm:ss" type="text"></input>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                </i>
                            </span>
                        </div>
                    </div>
                    <?php
                    $strDate = date("Y-m-d h:i:s");
                    ?>
                    <input type="text" id="edit_exam" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                    <input type="text" style="display:none" id="edit_exam_date" value="<?php echo $strDate; ?>" />
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="history_exam_room()"><i class="fas fa-plus-circle"></i> เพิ่มห้องสอบ</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#input_starttime').pickatime({
            twelvehour: false
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({});
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . 'theme/bootstrap-datetimepicker-0.0.11' ?>/js/bootstrap-datetimepicker.min.js"></script>

    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>