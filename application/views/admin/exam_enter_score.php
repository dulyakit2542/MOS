<?php
$strDate = date("Y-m-d h:i:s");
DateThai($strDate);
echo "<pre>";
echo '</pre>';
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
    <title>กรอกคะแนนสอบ : ADMIN</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <body>
        <br>
        <div class="container-fluid wow fadeIn" style="background-color: #F7F7F7;">
            <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
                <strong>
                    <h2 class="h2" style="color: #323232; font-size:16pt;">ผู้ใช้ที่สอบแล้ว</h2>
                </strong>
                <ul class="list-unstyled d-flex p-1 m-1">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">กรอกคะแนนสอบ</li>
                </ul>
            </nav>
            <div>
                <a href="<?php echo base_url() . 'exam/exam_enter_score_success' ?> "><button type="button" class="btn btn-success" style="font-size: 11pt;">
                        <i class="fas fa-check-circle"></i> ผู้ใช้ที่กรอกคะแนนแล้ว</button></a>
                <br><br>
            </div>
            <table id="myTable" class="table " cellspacing="0" style=" box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);">
                <thead>
                    <tr align="center">
                        <th style="color: #323232; font-weight: bold;">ลำดับ</th>
                        <th style="color: #323232; font-weight: bold;">ชื่อ</th>
                        <th style="color: #323232; font-weight: bold;">รหัสบัตรประชาชน</th>
                        <th style="color: #323232; font-weight: bold;">หน่วยงาน</th>
                        <th style="color: #323232; font-weight: bold;">ชุดข้อสอบ</th>
                        <th style="color: #323232; font-weight: bold;">ชื่อห้องสอบ</th>
                        <th style="color: #323232; font-weight: bold;">วันสอบ</th>
                        <th style="color: #323232; font-weight: bold;width:25%;">ป้อนคะแนน</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($exam_define as $exa) {
                    ?>
                        <tr>
                            <td style="text-align: center; font-size: 12px;">
                                <?php
                                echo $exa->exam_member_id;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $exa->prefix . $exa->fname . ' ' . $exa->lname;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $exa->personal_id;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $exa->name;
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                echo $exa->exam_archive_name;
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php

                                echo $exa->exam_room_name;

                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                $date = $exa->exam_room_date;
                                echo DateThaiNotTime($date) . ", " . $exa->exam_room_time;
                                ?>
                            </td>
                            <td style="text-align: center; ">

                                <!--embed code -->
                                <input type="text" style="display:none" id="date" value="<?php echo $strDate; ?>" />
                                <input type="text" style="display:none" id="admin" value="<?php echo $_SESSION["user_info"]->fname_en . " " . $_SESSION["user_info"]->lname_en; ?>">

                                <!-- EXAM -->
                                <input type="text" style="display:none" id="exam_alert" value="" />
                                <input type="text" style="display:none" id="exam_member_status_pass" value="success" />

                                <!-- NOT_EXAM -->
                                <input type="text" style="display:none" id="not_exam_member_status" value="not_exam" />
                                <input type="text" style="display:none" id="not_exam_member_score" value="not_exam" />

                                <!-- CANCEL -->
                                <input type="text" style="display:none" id="canExam_alert" value="yes" />
                                <input type="text" style="display:none" id="canExam_member_status_pass" value="waiting_exam" />
                                <input type="text" style="display:none" id="canExam_member_score" value="" />
                                
                                <!-- to History -->
                                <input type="text" style="display:none" id="exam_room_id" value="<?php echo $exa->exam_room_id; ?>" />
                                <input type="text" style="display:none" id="exam_archive" value="<?php echo $exa->exam_archive; ?>" />
                                <input type="text" style="display:none" id="user_personal" value="<?php echo $exa->personal_id; ?>" />

                                <!-- embed code -->
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="<?php echo $exa->exam_member_id; ?>exam_member_score" placeholder="enter score" >
                                    </div>
                                    <div class="col-18">
                                        <button type="button" class="btn btn-success" style="font-size: 11pt;" onclick="exam_member_score(<?php echo $exa->exam_member_id; ?>,this)"><i class="fas fa-check"></i> ยืนยัน</button>
                                        <h6 style="display: none; justify-content: center; align-items: center; color:#00CE48; font-size:25pt;"><i class="fas fa-check-circle"></i></h6>
                                        <button type="button" class="btn btn-danger" style="display: none;" onclick="canExam_member_score(<?php echo $exa->exam_member_id; ?>,this)">ยกเลิก</button>
                                        <button type="button" class="btn btn-danger" onclick="exam_not(<?php echo $exa->exam_member_id; ?>,this)"><i class="fas fa-times"></i> ไม่เข้าสอบ</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <br><br>
    </body>
    <script>
        $('.datepicker').on('mousedown', function preventClosing(event) {
            event.preventDefault();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>