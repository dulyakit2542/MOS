<?php
echo '<pre>';
var_dump($user_list);
echo '</pre>';
?>

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
            <div class="row">
                <div class="col-xl-3">
                    <!-- Settings -->
                    <div class="card card-default">
                        <div class="card-body pt-0 mt-5" align="center">
                            <img class="rounded-circle" style="width: 120pt; height: 120pt; " src="<?php echo base_url() . 'files/user_img'; ?>/<?php echo $user_list[0]->user_image ?>">
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <!-- Account Settings -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h2 class="mb-5">Account Settings</h2>

                        </div>

                        <div class="card-body">

                            <form>
                                <div class="row mb-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="firstName">First name</label>
                                            <input type="text" class="form-control" id="firstName">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lastName">Last name</label>
                                            <input type="text" class="form-control" id="lastName">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="userName">User name</label>
                                    <input type="text" class="form-control" id="userName">
                                    <span class="d-block mt-1">Accusamus nobis at omnis consequuntur culpa tempore saepe animi.</span>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="newPassword">New password</label>
                                    <input type="password" class="form-control" id="newPassword">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="conPassword">Confirm password</label>
                                    <input type="password" class="form-control" id="conPassword">
                                </div>

                                <div class="d-flex justify-content-end mt-6">
                                    <button type="submit" class="btn btn-primary mb-2 btn-pill">Update Profile</button>
                                </div>

                            </form>
                        </div>
                    </div>




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
        document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">ดูข้อมูลผู้ใช้/</span>ข้อมูลผู้ใช้`;
    </script>

    </html>
<?php
    // <!-- ไม่ใช่ ADMIN -->
} else {
    redirect('program/error404');
}
?>