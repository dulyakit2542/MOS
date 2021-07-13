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
        <div class="container wow fadeIn">
            <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
                <strong>
                    <h2 class="h2" style="color: #323232; font-size:16pt;"><strong> แก้ไขชุดข้อสอบ</strong></h2>
                </strong>
                <ul class="list-unstyled d-flex p-1 m-1">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'exam/exam_archive'; ?>">จัดการชุดข้อสอบ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">แก้ไขชุดข้อสอบ</li>
                </ul>
            </nav>

            <body>
                <center>
                    <div class="container  wow fadeIn">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <br>
                                <div>
                                    <h5 style="color:#505050 ; font-size:20px" class="modal-title h2 "><i class="fas fa-edit"></i> แก้ไขชุดข้อสอบ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <hr>
                                <div class="container" align="left">
                                    <div class="row mt-1 ">
                                        <div class="col-md-12"><br>
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
                                    </div><br>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label>รหัสชุดข้อสอบ</label>
                                            <input id="exam_archive_id" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_id; ?>"><br>
                                        </div>
                                        <div class="col-md-6">
                                            <label>ชื่อชุดข้อสอบ</label>
                                            <input id="exam_archive_name" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_name; ?>"><br>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label>จำนวนข้อสอบ</label>
                                            <input id="exam_archive_amount" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_amount; ?>"><br>
                                        </div>
                                        <div class="col-md-6">
                                            <label>ชุดข้อสอบคงเหลือ</label>
                                            <input id="exam_archive_balance" type="text" class="form-control pass-swap" value="<?php echo $exam_archive_byId[0]->exam_archive_balance; ?>"><br>
                                        </div>
                                    </div>

                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            <div class="md-form">
                                                <label>วันหมดอายุ</label> <br><br>
                                                <input value="<?php echo $exam_archive_byId[0]->exam_archive_ex; ?>" type="date" class="datepicker" id="exam_archive_ex">
                                            </div>
                                        </div>
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
                                <input type="text" style="display:none" id="edit_exam_archive_date" value="<?php echo $strDate; ?>" />

                                <div class="modal-footer">
                                    <a href="javascript:history.go(-1)"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                                    <?php $id = $exam_archive_byId[0]->exam_archive_id; ?>
                                    <button type="button" class="btn btn-primary" onclick="save_exam_archive(<?php echo $id ?>)"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
            </body><br><br>
        </div>
        </div>
        <script>
            $('.program_date').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '-3d'
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
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