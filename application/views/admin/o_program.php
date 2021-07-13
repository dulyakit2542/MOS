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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <body>
        <br>
        <div class="container wow fadeIn">
            <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
                <strong>
                    <h2 class="h2" style="color: #323232; font-size:16pt;"><strong> จัดการห้องอบรม</strong></h2>
                </strong>
                <ul class="list-unstyled d-flex p-1 m-1">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">จัดการห้องอบรม</li>
                </ul>
            </nav>
            <a class="btn btn-info waves-effect waves-light h6" onclick="show_openprogram()" style="color: #323232;">
                <strong>
                    <i class="fas fa-plus"></i> เพิ่มห้องอบรม
                </strong>
            </a><br><br>
            <table id="myTable" class="table " cellspacing="0" style="box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);">
                <thead>
                    <tr align="center">
                        <th style="color: #323232; font-weight: bold;">ลำดับที่</th>
                        <th style="color: #323232; font-weight: bold;">ชื่อโปรแกรม</th>
                        <th style="color: #323232; font-weight: bold;">สถานะ</th>
                        <th style="color: #323232; font-weight: bold;">วันที่สิ้นสุด</th>
                        <th style="color: #323232; font-weight: bold;">กลุ่ม</th>
                        <th style="color: #323232; font-weight: bold;">จำนวน</th>
                        <th style="color: #323232; font-weight: bold;">แก้ไขล่าสุด</th>
                        <th style="color: #323232; font-weight: bold;">จัดการโปรแกรม</th>
                    </tr>
                </thead>
                <tbody>
                    <script>
                        var progarm_ = '<?php echo json_encode($program) ?>';
                        var progarm = JSON.parse(progarm_);
                    </script>
                    <?php
                    foreach ($program as $p) {
                    ?>
                        <tr>
                            <td style="text-align: center; font-size: 12px;">
                                <?php $edit_program_id = $p->program_open_id; ?>
                                <?php
                                echo $p->program_open_id;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo $p->program_name;
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
                                if ($pd == $p->program_date) {
                                    echo '<h6 style="color: red;">วันนี้</h6>';
                                } elseif ($pd > $p->program_date) {
                                    echo '<span class="badge badge-danger px-2 py-1">หมดเขต</span>';
                                } else {
                                    $date = $p->program_date;
                                    echo DateThaiNotTime($date);
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                echo $p->program_room;
                                ?>
                            </td>

                            <td style="text-align: center;">
                                <?php
                                $pc1 = $p->program_count;
                                if ($pc1 == 0 || $pc1 == '') {
                                    $pc1 = '0';
                                    echo $pc1 . '/' .  $p->program_max;
                                } elseif ($pc1 < $p->program_max) {
                                    $pc1 = $p->program_count;
                                    echo $pc1 . '/' .  $p->program_max;
                                } elseif ($pc1 >= $p->program_max) {
                                    $pc1 = $p->program_count;
                                    echo '<h6 style="color: red;">';
                                    echo $pc1 . '/' .  $p->program_max;
                                    echo '</h6>';
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                $date = $p->edit_program_date;
                                echo $p->edit_program . ', ' . DateThai($date);
                                ?>
                            </td>
                            <td align="center">
                                <a class="btn btn-green h7" id="edit_program_id" onclick="edit_program_open(<?php echo $p->program_open_id; ?>)">
                                    แก้ไข
                                </a>
                                <a class=" btn-rounded btn btn-yt waves-effect waves-light h7" onclick="show_addprogram()">
                                    เก็บถาวร
                                </a>
                                <a class=" btn-rounded btn btn-yt waves-effect waves-light h7" onclick="delete_program_open(<?php echo $p->program_open_id; ?>)">
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
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-plus-circle"></i> เพิ่มห้องอบรม</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="container">
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label>โปรแกรม</label>
                            <select class="form-control" id="new_program_id" name="new_program_id">
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
                            <label>จำนวนผู้ลงทะเบียนสูงสุด</label>
                            <select class="form-control" id="new_program_max" name="new_program_max">
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
                            <label>กรุณาตั้งชื่อกลุ่มอบรม</label>
                            <input name="new_program_room" id="new_program_room" type="text" class="form-control pass-swap">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <label>สถานะ</label>
                            <select class="form-control" id="new_program_status" name="new_program_status">
                                <option value="1000">เปิดลงทะเบียน</option>
                                <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="md-form">
                            <div class="col-md-12">
                                <label style="margin-left: 12pt; color:black; ">วันที่สิ้นสุด</label> <br><br>
                                <input type="date" class="datepicker" id="new_program_date" name="new_program_date">
                            </div>
                        </div>
                    </div>
                    <?php
                    $strDate = date("Y-m-d h:i:s");
                    ?>
                    <input type="text" id="edit_program" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                    <input type="text" style="display:none" id="edit_program_date" value="<?php echo $strDate; ?>" />
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="new_program()"><i class="fas fa-plus-circle"></i> สร้างห้องอบรม</button>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <script>
        // SideNav Initialization

        $('.datepicker').on('mousedown', function preventClosing(event) {
            event.preventDefault();
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


    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>