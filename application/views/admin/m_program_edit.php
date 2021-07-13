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
    <!-- CSS only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <br>

    <body>
        <center>
            <?php
            // echo '<pre>';
            // var_dump($program);
            // echo '</pre>';
            ?>
            <div class="container  wow fadeIn">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <br>
                        <div>
                            <h5 style="color:#505050 ; font-size:20px" class="modal-title h2 "><i class="fas fa-edit"></i> แก้ไขโปรแกรมในระบบ</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <hr>
                        <div class="container" align="left">
                            <div class="row mt-1 ">
                                <div class="col-md-12"><br>
                                    <div class="row" style="margin:auto">
                                        <div class="form-group col-md-12">
                                            <label for="inputtext">หมายเลขโปรแกรม</label>
                                            <input name="id" type="text" class="form-control" id="id" placeholder="" value="<?php echo $program[0]->program_type_id; ?>">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="col-md-12"><br>
                                    <div class="row" style="margin:auto">
                                        <div class="form-group col-md-12">
                                            <label for="inputtext">ชื่อโปรแกรม</label>
                                            <input name="name" type="text" class="form-control" id="name" placeholder="" value="<?php echo $program[0]->program_name; ?>">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="col-md-12"><br>
                                    <div class="row" style="margin:auto">
                                        <div class="form-group col-md-12">
                                            <label for="inputtext">รูปภาพโปรแกรม</label>
                                            <input name="img" type="text" class="form-control" id="img" placeholder="" value="<?php echo $program[0]->program_imge; ?>">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="modal-footer" style="margin:auto;"><br><br>
                                    <a href="<?php echo base_url() . 'program/manage_pogram' ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ</button></a>
                                    <button type="button" class="btn btn-primary" onclick="save_mprogram(<?php echo $program[0]->program_type_id; ?>)"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </center>
    </body><br><br>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>
