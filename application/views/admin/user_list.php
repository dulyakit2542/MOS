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

    <html>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <body>
        <br>
        <div class="container wow fadeIn">
            <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
                <strong>
                    <h2 class="h2" style="color: #323232; font-size:16pt;"><strong> ข้อมูลผู้ใช้ในระบบ</strong></h2>
                </strong>
                <ul class="list-unstyled d-flex p-1 m-1">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ข้อมูลผู้ใช้ในระบบ</li>
                </ul>
            </nav>
           <br>
            <table id="myTable" class="table " cellspacing="0" style="box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);">
                <thead>
                    <tr align="center">
                        <th style="color: #323232; font-weight: bold;">ลำดับที่</th>
                        <th style="color: #323232; font-weight: bold;">ชื่อ - สกุล</th>
                        <th style="color: #323232; font-weight: bold;">รหัสประจำตัวประชาชน</th>
                        <th style="color: #323232; font-weight: bold; width:20%">สาขา / หน่วยงาน</th>
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
                            <td style="text-align: center; font-size: 12px;">
                                <?php
                                echo $user->user_id;
                                ?>
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                <?php
                                echo $user->prefix.$user->fname." ".$user->lname;
                                ?>
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                <?php
                                echo $user->personal_id;
                                ?>
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                <?php
                                echo $user->name;
                                ?>
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                <?php
                                echo $user->phone;
                                ?>
                            </td>
                            <td style="text-align: left; font-size: 12px;">
                                <?php
                                echo $user->advisor;
                                ?>
                            </td>
                            <input type="text" id="admin" style="display: none" value=""></input>
                            
                            <td align="center">
                                <a class="btn btn-green h7"  style="font-size:8pt;" id="edit_program_id" onclick="detail_user_list(<?php echo $user->personal_id;?>)">
                                    ดูข้อมูล
                                </a>
                                <a class=" btn-rounded btn btn-yt waves-effect waves-light h7" style="font-size:8pt;" onclick="delete_user(<?php echo $user->personal_id;?>)">
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