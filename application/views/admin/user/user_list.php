<!-- <?php
        echo '<pre>';
        var_dump($user_list);
        echo '</pre>';
        ?> -->

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
    <title>ข้อมูลผู้ใช้ในระบบ : ADMIN</title>
    <style>
        .card1 {
            background-color: white;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
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
                </div>
                <div class="card-body overflow-auto">
                    <table id="myTable" class="table table-hover table-product" style="width:100%;">
                        <thead>
                            <tr align="center" class="h6">
                                <th style="color: #323232; font-weight: bold;">ลำดับที่</th>
                                <th style="color: #323232; font-weight: bold;">ชื่อ - สกุล</th>
                                <th style="color: #323232; font-weight: bold;">รหัสประจำตัวประชาชน</th>
                                <th style="color: #323232; font-weight: bold;">สาขา / หน่วยงาน</th>
                                <th style="color: #323232; font-weight: bold;">เบอรโทรศัพท์</th>
                                <th style="color: #323232; font-weight: bold;">อาจารย์ที่ปรึกษา</th>
                                <th style="color: #323232; font-weight: bold;">จัดการผู้ใช้</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($user_list as $user) {
                            ?>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <?php
                                        echo $user->user_id;
                                        ?>
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        <?php
                                        echo $user->prefix . $user->fname . " " . $user->lname;
                                        ?>
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        <?php
                                        echo $user->personal_id;
                                        ?>
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        <?php
                                        echo $user->name;
                                        ?>
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        <?php
                                        echo $user->phone;
                                        ?>
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;">
                                        <?php
                                        echo $user->advisor;
                                        ?>
                                    </td>
                                    <input type="text" id="admin" style="display: none" value=""></input>

                                    <td align="center">
                                        <button class="mb-1 btn btn-pill btn-success"" id="edit_program_id" onclick="user_list_detail('<?php echo $user->personal_id; ?>')">
                                            ดูข้อมูล
                                        </button>
                                        <button class="mb-1 btn btn-pill btn-danger" onclick="delete_user('<?php echo $user->personal_id; ?>')">
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


    <script type="text/javascript">
        $(function() {
            $('#datetimepicker3').datetimepicker({
                format: 'H:mm'
            });
        });
        
        document.getElementById("users").className = "show";
        document.getElementById("user").className = "active expand";
        document.getElementById("user_list").className = "active";
        document.getElementById("title").innerHTML = "ดูข้อมูลผู้ใช้";
    </script>
    <script src="<?php echo base_url() . 'js' ?>/date_custom.js"></script>
    <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>



    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>