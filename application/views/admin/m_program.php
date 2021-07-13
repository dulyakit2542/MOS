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
        <div class="container  wow fadeIn">
        <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
                <strong>
                    <h2 class="h2" style="color: #323232; font-size:16pt;"><strong> จัดการโปรแกรม</strong></h2>
                </strong>
                <ul class="list-unstyled d-flex p-1 m-1">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">จัดการโปรแกรม</li>
                </ul>
            </nav>
            <a class="btn purple-gradient btn-rounded waves-effect waves-light h6" onclick="show_addprogram()">
                <strong>
                    เพิ่มโปรแกรม
                </strong>
            </a><br><br>
            <table id="myTable" class="table table-sm h6" cellspacing="0" width="100%" style="box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);">
                <thead align="center">
                    <tr >
                        <th style="color: #323232; font-weight: bold;">รหัสโปรแกรม</th>
                        <th style="color: #323232; font-weight: bold;">ชื่อโปรแกรม</th>
                        <th style="color: #323232; font-weight: bold;">รูปภาพโปรแกรม</th>
                        <th style="color: #323232; font-weight: bold;">จัดการโปรแกรม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($program_type as $p) {
                    ?>
                        <tr>
                            <td style="text-align: center;">
                                <?php
                                echo $p->program_type_id;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $p->program_name;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $p->program_imge;
                                ?>
                            </td>
                           
                            <td align="center">
                                <a class="btn btn btn-dark-green waves-effect waves-light h6" id="edit_program_id" onclick="edit_program(<?php echo $p->program_type_id; ?>)">
                                    แก้ไข
                                </a>
                                <a class="btn-rounded btn btn-yt waves-effect waves-light h6" id="edit_program_id" onclick="delete_program(<?php echo $p->program_type_id; ?>)">
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
    <div class="modal fade bd-example-modal-lg h6" id="addprogram" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มโปรแกรม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                            <input name="new_program_room" id="new_program_img" type="text" class="form-control pass-swap" required>
                        </div>
                    </div>
                    <br>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> ปิด</button>
                    <button type="submit" class="btn btn-primary" onclick="add_program()" required><i class="fas fa-plus-circle"></i> เพิ่มโปรแกรม</button>
                </div>
            </div>
        </div>
    </div>    
    <script>
        // SideNav Initialization

        $('.datepicker').on('mousedown', function preventClosing(event) {
            event.preventDefault();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
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
