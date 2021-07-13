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
    <title>จัดการโปรแกรม : ADMIN</title>
    <style>

    </style>
    <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>
    <script src="<?php echo base_url() . 'js' ?>/program.js"></script>
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
                            <i class="fas fa-plus" style="color:#323232; font-weight: bold;"></i> <span class="h6" style="font-size:12pt; color:#323232; font-weight: bold;">เพิ่มโปรแกรม</span>
                        </strong>
                    </button>
                    <br><br>
                </div>
                <div class="card-body overflow-auto">
                    <table id="myTable" class="table table-hover table-product" style="width:100%;">
                        <thead align="center">
                            <tr class="h6">
                                <th style="color: #323232; font-weight: bold;">รหัสโปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อโปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">รูปภาพโปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">แก้ไขล่าสุด</th>
                                <th style="color: #323232; font-weight: bold;">จัดการโปรแกรม</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($program_type as $p) {
                            ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php
                                        echo $p->program_type_id;
                                        ?>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->program_name;
                                        ?>
                                    </td>
                                    <th style="vertical-align: middle; text-align: center">
                                        <img style="width:100px; height: 50px;" src="<?php echo base_url().'files/program_image/'.$p->program_imge;?>" alt="" width="100px" height="50px">
                                    </th>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        echo $p->program_type_admin.', '.DateThai($p->program_type_admin_date);
                                        ?>
                                    </td>
                                    <td align="center">
                                        <button type="button" class="mb-1 btn btn-pill btn-success h6" id="edit_program_id" onclick="edit_program('<?php echo $p->program_type_id; ?>')">
                                            แก้ไข
                                        </button>
                                        <button type="button" class="mb-1 btn btn-pill btn-danger h6" id="edit_program_id" onclick="delete_program('<?php echo $p->program_type_id; ?>')">
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
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มโปรแกรม</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div><br>
                    <div class="container">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <label>รหัสโปรแกรม</label>
                                <input name="new_program_room" id="new_program_id" type="text" class="form-control pass-swap" required>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="container">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <label>ชื่อโปรแกรม</label>
                                <input name="new_program_room" id="new_program_name" type="text" class="form-control pass-swap" required>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="container">
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <label>รูปภาพโปรแกรม</label> 
                                <center>
                               <h6 style="color: red; font-size: 10pt;">***กรุณาเปลี่ยนชื่อรูปภาพโปรแกรมตามเวอร์ชันของโปรแกรมก่อนอัปโหลด***</h6>
                               </center>
                                <form class="" action="<?php echo base_url() .'upload/upload_program';?>" method="post" id="program_image" enctype="multipart/form-data">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="program_image" id="new_program_img" lang="es" value="" required accept="image/*">
                                        <label class="custom-file-label" for="program_image">เลือกรูปภาพ</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                    </div>
                    </form>
                    <input type="text" id="program_type_admin" style="display:none ;" value="<?php echo $_SESSION['user_info']->fname_en;?>">
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> ปิด</button>
                        <button type="submit" class="btn btn-primary" onclick="add_program()" required><i class="fas fa-plus-circle"></i> เพิ่มโปรแกรม</button>
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