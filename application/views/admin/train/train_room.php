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

        td {
            color: #424242;
            font-size: 11pt
        }
    </style>
    <script src="<?php echo base_url() . 'js' ?>/train.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    </head>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->

    <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
    <div class="content-wrapper">
        <div class="content">

            <!-- Products Inventory -->
            <div class="card card-default">
                <div class="card-header">
                    <!-- <h2>Products Inventory</h2> -->
                    <button type="button" class="btn bg-primary text-white btn-pill mb-3 mb-xxl-0" data-toggle="modal" data-target="#addProgram">
                        <strong>
                            <i class="fas fa-plus"></i> <span class="h6" style="font-size:12pt; color:white; font-weight:bold">เพิ่มห้องอบรม</span>
                        </strong>
                    </button>
                    <br><br>
                </div>
                <div class="card-body overflow-auto">
                    <table id="myTable" class="table table-hover table-product" style="width:100%;">
                        <thead>
                            <tr align="center" class="h6">
                                <th style="color: #323232; font-weight: bold;">รหัส</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อโปรแกรม</th>
                                <th style="color: #323232; font-weight: bold;">สถานะ</th>
                                <th style="color: #323232; font-weight: bold;">วันที่สิ้นสุด</th>
                                <th style="color: #323232; font-weight: bold;">กลุ่ม</th>
                                <th style="color: #323232; font-weight: bold;">จำนวน</th>
                                <th style="color: #323232; font-weight: bold; width: 20%;">แก้ไขล่าสุด</th>
                                <th style="color: #323232; font-weight: bold;">จัดการโปรแกรม</th>
                            </tr>
                        </thead>
                        <tbody id="get_program">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg h6" id="addProgram" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <br><label>กรุณาตั้งรหัสกลุ่มอบรม</label> <span style="color:red;"> ***ตัวย่อโปรแกรม, เลข2ตัวสุดท้ายของปีที่เปิดอบรม, ครั้งที่เปิดในปีนั้นๆ***</span>
                            <input name="train_room_id" id="train_room_id" type="text" class="form-control pass-swap" placeholder="เช่น MOS21001">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <br><label>กรุณาตั้งชื่อกลุ่มอบรม</label>
                            <input name="train_room_name" id="train_room_name" type="text" class="form-control pass-swap" placeholder="เช่น TC21001">
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12">
                            <br><label>โปรแกรม</label>
                            <select class="form-control" id="program_type_id" name="program_type_id">
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
                            <br><label>จำนวนผู้ลงทะเบียนสูงสุด</label>
                            <input name="train_room_max" id="train_room_max" type="text" class="form-control pass-swap" placeholder="เช่น 100">
                        </div>
                    </div><br>

                    <div class="row mt-1">
                        <div class="col-md-12">
                            <br><label>สถานะ</label>
                            <select class="form-control" id="train_room_status" name="train_room_status">
                                <option value="1000">เปิดลงทะเบียน</option>
                                <option value="5000">ปิดลงทะเบียนชั่วคราว</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <br><label>วันที่สิ้นสุด</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text py-1">
                                    <i class="mdi mdi-calendar-range"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="train_room_date_ex" name="dateRange" value="" placeholder="Date">
                        </div>
                    </div>
                    <input type="text" id="train_room_admin" style="display: none;" value="<?php echo $_SESSION['user_info']->fname_en; ?>">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
                    <button type="button" class="btn btn-primary" onclick="add_train_room()"><i class="fas fa-plus-circle"></i> สร้างห้องอบรม</button>
                </div>
            </div>
        </div>
    </div>


<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>