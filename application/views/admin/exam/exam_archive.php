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
    <title>จัดการชุดข้อสอบในคลัง : ADMIN</title>
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
                    <button type="button" class="btn btn-info text-white btn-pill mb-3 mb-xxl-0" data-toggle="modal" data-target="#addExamRoom">
                        <strong>
                            <i class="fas fa-plus" style="color:#323232; font-weight: bold;"></i> <span class="h6" style="font-size:12pt; color:#323232; font-weight: bold;">เพิ่มชุดข้อสอบ</span>
                        </strong>
                    </button>
                    <br><br>
                </div>
                <div class="card-body overflow-auto">
                    <table id="myTable" class="table table-hover table-product" style="width:100%;">
                        <thead>
                            <tr align="center" class="h6">
                                <th style="color: #323232; font-weight: bold;">รหัสชุดข้อสอบ</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อชุดข้อสอบ</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อโปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">จำนวนข้อสอบ</th>
                                <th style="color: #323232; font-weight: bold;">จำนวนคงเหลือ</th>
                                <th style="color: #323232; font-weight: bold;">วันหมดอายุ</th>
                                <th style="color: #323232; font-weight: bold;">แก้ไขล่าสุด</th>
                                <th style="color: #323232; font-weight: bold;">จัดการชุดข้อสอบ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // echo '<pre>';
                            // var_dump($exam_archive);
                            // echo '</pre>';
                            foreach ($exam_archive as $p) {
                            ?>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <?php
                                        echo $p->exam_archive_id;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->exam_archive_name;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->program_name;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $p->exam_archive_amount;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $p->exam_archive_balance;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        $date_ex = $p->exam_archive_ex;
                                        echo DateThaiNotTime1($date_ex);
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        $date = $p->edit_exam_archive_date;
                                        echo $p->edit_exam_archive . ', ' . DateThai($date);
                                        ?>
                                    </td>
                                    <td align="center">
                                        <button class="mb-1 btn btn-pill btn-success h6" id="exam_room_id" onclick="exam_archive_edit('<?php echo $p->exam_archive_id; ?>')">
                                            แก้ไข
                                        </button>
                                        <button class="mb-1 btn btn-pill btn-danger h6" onclick="delete_exam_archive('<?php echo $p->exam_archive_id; ?>')">
                                            ลบ
                                        </button>
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มชุดข้อสอบ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><br>
                    <div class="container">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <label>โปรแกรม</label>
                                <select class="form-control" id="program_id">
                                    <option value="">กรุณาเลือกโปรแกรม</option>
                                    <?php
                                    foreach ($program_type as $p_id) {
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
                                <label>กรุณาใส่รหัสชุดข้อสอบ</label>
                                <input id="exam_archive_id" type="text" class="form-control pass-swap"><br>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <label>กรุณาใส่ชื่อชุดข้อสอบ</label>
                                <input id="exam_archive_name" type="text" class="form-control pass-swap"><br>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-6">
                                <label>จำนวนข้อสอบ</label>
                                <input id="exam_archive_amount" type="text" class="form-control pass-swap"><br>
                            </div>
                            <div class="col-md-6">
                                <label>วันหมดอายุ</label>
                                <input type="date" class="form-control" id="exam_archive_ex" name="new_program_date">
                            </div>
                        </div>

                        <?php
                        $strDate = date("Y-m-d h:i:s");
                        ?>
                        <input type="text" id="edit_exam_archive" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                        <input type="text" style="display:none" id="edit_exam_archive_date" value="<?php echo $strDate; ?>" />
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> ปิด</button>
                        <button type="button" class="btn btn-primary" onclick="exam_archive_new()"><i class="fas fa-plus-circle"></i> เพิ่มชุดข้อสอบ</button>
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
        <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>

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