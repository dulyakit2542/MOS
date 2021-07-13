    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <style>
        .card:hover {
            transform: scale(1.001);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        @media(max-width: 990px) {
            .card {
                margin: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/MDB' ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/Fonts' ?>/promt/stylesheet.css" rel="stylesheet" />
    <style>
        .text_head {
            font-family: 'promptlight';
            font-weight: bold;
            color: #707070;
            opacity: 1.0;
            filter: alpha(opacity=100);
        }

        .text_head:hover {
            font-family: 'promptlight';
            font-weight: bold;
            color: #FF6100;
            opacity: 1.0;
            filter: alpha(opacity=100);
        }

        .text_drop {
            font-family: 'promptlight';
            color: #707070;
            opacity: 1.0;
            filter: alpha(opacity=100);
        }

        .text_drop:hover {
            font-family: 'promptlight';
            color: #FF6100;
            color: #FF6100;
            opacity: 1.0;
            filter: alpha(opacity=100);
        }

        .h2 {
            font-family: 'promptlight';
            color: aliceblue;
        }

        .h6 {
            font-family: 'promptlight';
            font-size: 90%;
        }

        .h6left {
            font-family: 'promptlight';
            margin-left: auto;
        }
    </style>

    <body>
        <?php
        $id = $_SESSION['user_info']->id;
        // echo $_SESSION['user_info']->section;
        // echo '<pre>';
        // echo var_dump($user[0]->fname);
        // echo '</pre>';
        // var_dump($section[0]->name);
        // var_dump($_SESSION['user_info']->prefix);
        // var_dump($_SESSION['user_info']->fname);
        ?>
        <main>
            <div class="container ">
                <section class="section team-section">
                    <div class="row text-center">
                        <div class="col-lg-12"><br><br><br>
                        </div>
                        <div class="col-md-8 mb-4">
                            <div>
                            </div>
                            <div class=" card card-cascade cascading-admin-card user-card">
                                <div class="admin-up d-flex justify-content-start">
                                </div>
                                <div class="card-body card-body-cascade" style="text-align: left; margin-left: 10px;">
                                    <div class="row">
                                        <div class="col-12 .col-md-8">
                                            <div class="data" style="font-size: 20px; text-align:center;"> <br>
                                                <h5 class="font-weight-bold dark-grey-text h6">กรุณาตรวจสอบข้อมูลส่วนตัวและข้อมูลติดต่อก่อนเข้าใช้งาน</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6" style="color:red; text-align:center">**กรณีต้องการแก้ไขข้อมูลส่วนตัวกรุณาติดต่อสํานักวิทยบริการและเทคโนโลยีสารสนเทศ**</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-5" style="margin-left: 20px;">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6"> ชื่อ : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->prefix, $_SESSION['user_info']->fname, '   ', $_SESSION['user_info']->lname . '</strong>'; ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6"> รหัสประจำตัวประชาชน : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->personal_id . '</strong>'; ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-5" style="margin-left: 20px;">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6"> รหัสนักศึกษา : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->student_id . '</strong>'; ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6"> สาขา : <?php echo '<strong style="color:#000169;">' . $section[0]->name . '</strong>'; ?>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="margin-left: 20px;">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6"> คณะ : <?php echo '<strong style="color:#000169;">' . $faculty[0]->name . '</strong>'; ?>
                                                </h6>
                                            </div><br>
                                            <hr>
                                        </div>
                                        <div class="col-lg-12" style="margin-left: 20px;">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6"> <strong> กรุณากรอกข้อมูลติดต่อ </strong>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-5" style="margin-left: 20px;">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6" style="text-align:left"> เบอร์มือถือ : </h6>
                                                <input type="text" id="phone" style="text-align:left">
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="md-form form-sm mb-0">
                                                <h6 class="h6" style="text-align:left"> อาจารย์ที่ปรึกษา : </h6>
                                                <input type="text" id="advisor" style="text-align:left">
                                                </h6>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row"></div>
                                </div>
                            </div><br><br>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class=" card profile-card">
                                <div class="avatar z-depth-1-half mb-4">
                                    <img src="<?php echo base_url() . 'files/user_img' ?>/<?php echo $_SESSION['user_info']->image ?>" class="rounded-circle" alt="First sample avatar image">
                                </div>
                                <div class="card-body pt-0 mt-0">
                                    <h4 class="h6 mb-3 font-weight-bold"><strong><?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->prefix, $_SESSION['user_info']->fname, '   ', $_SESSION['user_info']->lname . '</strong>'; ?></strong></h4>
                                    <h6 class="font-weight-bold cyan-text mb-4 h6">สถานะ : <?php echo '<strong style="color:;">' . $_SESSION['permission'][0]->text_type . '</strong>'; ?>
                                    </h6>
                                    <a class="h6 btn btn-dark-green btn-rounded waves-effect waves-light" onclick="create_user()"><i class="far fa-save"></i><strong> บันทึกข้อมูลผู้ใช้ </strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </body>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url() . 'js' ?>/user.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/fullcalendar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/mdb.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/Bootstrap-4-templates-master/full-page-image-carousel/' ?>js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'theme/Bootstrap-4-templates-master/full-page-image-carousel/' ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . 'theme/js' ?>/java.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- WB core JavaScript -->
    </body>

    </html>