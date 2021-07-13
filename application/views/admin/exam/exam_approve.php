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
    <title>กำหนดชุดข้อสอบ : ADMIN</title>

    <head>
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

    <!-- ====================================
    ——— CONTENT WRAPPER
    ===================================== -->
    <div class="content-wrapper">
        <div class="content">

            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <!-- <h2>Products Inventory</h2> -->
                    <a href="<?php echo base_url() . 'admin/exam_approve_define' ?> "><button type="button" class="btn text-white btn-pill mb-3 mb-xxl-0 btn-success" style="font-size: 11pt;">
                    <i class="fas fa-user-check"></i> ผู้ใช้ที่กำหนดชุดข้อสอบแล้ว</button></a>
                    <br><br>
                </div>

                <div class="card-body overflow-auto">
                    <table id="myTable" class="table table-hover table-product" style="width:100%;">
                        <thead>
                            <tr align="center" class="h6">
                                <th style="color: #323232; font-weight: bold;">ลำดับ</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อ</th>
                                <th style="color: #323232; font-weight: bold;">รหัสบัตรประชาชน</th>
                                <th style="color: #323232; font-weight: bold;">หน่วยงาน</th>
                                <th style="color: #323232; font-weight: bold;">โปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อห้องสอบ</th>
                                <!-- <th style="color: #323232; font-weight: bold;">สถานะ</th> -->
                                <th style="color: #323232; font-weight: bold;">ลงทะเบียน</th>
                                <th style="color: #323232; font-weight: bold;">เลือกชุดข้อสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($exam_approve as $exa) {
                            ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center; font-size: 12px;">
                                        <?php
                                        echo $exa->exam_member_id;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $exa->prefix . $exa->fname . ' ' . $exa->lname;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $exa->personal_id;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $exa->name;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $exa->program_name;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php

                                        echo $exa->exam_room_name;

                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        $date = $exa->exam_member_date;
                                        echo DateThai($date);
                                        ?>
                                    </td>
                                    <td align="center">

                                        <!-- embed code -->
                                        <input type="text" style="display:none" id="exam_member_status" value="waiting_exam" />
                                        <input type="text" style="display:none" id="exam_alert" value="yes" />
                                        <input type="text" style="display:none" id="canExam_alert" value="" />
                                        <input type="text" style="display:none" id="canExam_archive" value="" />
                                        <input type="text" style="display:none" id="exam_member_status_wait" value="wait" />
                                        <input type="text" style="display:none" id="admin_approve" value="<?php echo $_SESSION["user_info"]->fname_en . " " . $_SESSION["user_info"]->lname_en; ?>">
                                        <!-- embed code -->

                                        <div style="vertical-align: middle;" class="row mt-3">
                                            <select class="form-control" id="exam_archive_id" name="exam_archive" style="max-width:60%;">
                                                <?php
                                                foreach ($exam_archive as $ex_ar) {
                                                ?>
                                                    <option value="<?php echo $ex_ar->exam_archive_id; ?>"><?php echo $ex_ar->exam_archive_name . ' (<h6 style="color:red;">' . $ex_ar->exam_archive_balance . '</h6>)'; ?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="col-18">
                                                <button type="button" class="btn btn-success" style="font-size: 11pt;justify-content: center; align-items: center;" onclick="exam_approve(<?php echo $exa->exam_member_id; ?>,this)"><i class="fas fa-check"></i> ยืนยัน</button>
                                                <h6 style="display: none; justify-content: center; align-items: center; color:#00CE48; font-size:25pt;"><i class="fas fa-check-circle"></i></h6>
                                                <button type="button" class="btn btn-danger" onclick="canExam_approve(<?php echo $exa->exam_member_id; ?>,this)" style="display: none;">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        console.log(new Date);
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        document.getElementById("exam_approve").className = "active";
        document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">อนุมัติเข้าสอบ/</span>กำหนดชุดข้อสอบ`;
    </script>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>