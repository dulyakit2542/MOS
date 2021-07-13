<!DOCTYPE html>
<html lang="en">

<head>
    <!-- SITE TITTLE -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="shortcut icon" href="<?php echo base_url() . 'files/rmuti_logo/favicon.png' ?>" type="image/png">
    <style>

    </style>
    <!-- PLUGINS CSS STYLE -->
    <script>
        // base_url ใช้กับ js
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- <link href="<?php echo base_url() . 'theme/Fonts' ?>/promt/stylesheet.css" rel="stylesheet" /> -->
    <link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/MDB' ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/css' ?>/style.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/listtyicons/style.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/menuzord/css/menuzord.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/selectric/selectric.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/dzsparallaxer/dzsparallaxer.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/revolution/css/settings.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/rateyo/jquery.rateyo.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/listtyicons/style.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/menuzord/css/menuzord.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/listty-2-2/Static HTML' ?>/assets/css/style.css" rel="stylesheet" id="option_style">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

</head>

<style>
    .text_head {
        font-family: 'Prompt';
        font-size: 11pt;
        font-weight: bold;
        transition: 0.3s;
        filter: alpha(opacity=100);
        color: #505050;
    }

    .text_head:hover {
        font-family: 'Prompt';
        color: #FF6100;
        opacity: 2.0;
        filter: alpha(opacity=100);
    }

    .text_drop {
        font-family: 'Prompt';
        color: #707070;
        opacity: 1.0;
        filter: alpha(opacity=100);
    }

    .text_drop:hover {
        font-family: 'Prompt';
        color: #FF6100;
        color: #FF6100;
        opacity: 1.0;
        filter: alpha(opacity=100);
    }

    .h2 {
        font-family: 'Prompt';
        color: aliceblue;
    }

    .h6 {
        font-family: 'Prompt';
        font-size: 11pt;
    }

    .h6left {
        font-family: 'Prompt';
        margin-left: auto;
    }

    .card {
        background-color: white;
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);

        /* padding: 14px 80px 18px 36px; */
        cursor: pointer;
    }

    .card:hover {
        /* transform: scale(1.03); */
        box-shadow: 0 0px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 70px;
        right: 30px;
        z-index: 99;
        font-size: 18pt;
        border: none;
        outline: none;
        background-color: red;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
        box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
    }

    #myBtn:hover {
        background-color: #555;
    }

    .logo_ipad {
        width: 30%;
        margin-top: 20px;
        margin: left;
    }

    .logo_desktop {
        margin: left;
        width: 45%;
        margin-top: 15px;
    }

    .logo_phone {
        margin: left;
        width: 80%;
        margin-top: 5px;
    }
</style>
<?php
$permission_admin = false;
if (count($_SESSION) > 1) {
    foreach ($_SESSION['permission'] as $row) {
        if ($row->text_type == 'admin') {
            $permission_admin = true;
        }
    }
}
$permission_user = false;
if (count($_SESSION) > 1) {
    foreach ($_SESSION['permission'] as $row) {
        if ($row->text_type == 'user') {
            $permission_user = true;
        }
    }
}
?>

<body id="body" class="up-scroll">
    <!-- Preloader -->
    <div id="preloader" class="smooth-loader-wrapper">
        <div class="smooth-loader">
            <div class="loader1">
                <div class="loader-target">
                    <div class="loader-target-main"></div>
                    <div class="loader-target-inner"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <!-- HEADER -->
        <header class="header" style="height: auto;">
            <nav class="nav-menuzord navbar-sticky">
                <div class="container-lg clearfix">
                    <div id="menuzord" class="menuzord menuzord-responsive mb-2">
                        <img class="logo" id="img" src="<?php echo base_url() . 'files/logo3.png' ?>" loading="lazy">
                        <div class="test" style="display:none;">hello</div>
                        <ul class="menuzord-menu menuzord-right">
                            <li>
                                <a class="" href="<?php echo base_url() . 'home' ?> ">
                                    <span id="home" class="text_head">หน้าหลัก</span>
                                </a>
                            </li>
                            <li>
                                <a class="" href="<?php echo base_url() . 'program/list_program' ?> ">
                                    <span id="program" class="text_head">โปรแกรมที่เปิดสอบ</span>
                                </a>
                            </li>
                            <?php
                            if ($permission_admin) {
                            ?>
                                <li class="text_head">
                                    <a href="<?php echo base_url() . 'admin'; ?>" style="font-family:Prompt;font-size: 11pt;font-weight: bold;transition: 0.3s; color: #505050;">Admin</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="<?php echo base_url() . 'program' ?>">Program</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() . 'program' ?>">เปิด/ปิด ห้องอบรม</a></li>
                                                <li><a href="<?php echo base_url() . 'program/manage_pogram' ?>">เปิด/ปิด ห้องสอบ</a></li>
                                                <li><a href="<?php echo base_url() . 'program/manage_pogram' ?>">จัดการโปรแกรม</a></li>
                                                <li><a href="<?php echo base_url() . 'program/manage_pogram' ?>">จัดการชุดข้อสอบ</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:0">User</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() . 'user/user_list' ?>">ข้อมูลผู้ใช้ในระบบ</a></li>
                                                <li><a href="<?php echo base_url() . 'program/check_training' ?>">อนุมัติการเข้าสอบ</a></li>
                                                <li><a href="my-bookings.html">ประวัติการสอบ</a></li>
                                                <li><a href="my-favourites.html">จัดการโปรแกรม</a></li>
                                                <li><a href="my-reviews.html">จัดการชุดข้อสอบ</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:0">สรุปผล</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo base_url() . 'dashboard' ?>">ผู้ลงทะเบียน</a></li>
                                                <li><a href="my-bookings.html">การสอบทั้งหมด</a></li>
                                                <li><a href="my-favourites.html">โปรแกรม</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            <?php
                            }
                            if ($permission_user || $permission_admin) {
                            ?>
                                <input id="personal_id" type="text" style="display: none;" value="<?php echo $_SESSION['user_info']->personal_id; ?>">

                                <li class="text_head">
                                    <!-- <div id="get_user_img" class="avatar-img"></div> -->
                                    <a id="user" href="javascript:0" style="font-family:Prompt;font-size: 11pt;font-weight: bold;transition: 0.3s; color: #505050;"><?php echo $_SESSION['user_info']->fname; ?></h6></a>
                                    <ul " class=" dropdown">
                                        <li>
                                            <a onclick="program_member_list(<?php echo $_SESSION['user_info']->personal_id; ?>)">โปรแกรมที่ลงทะเบียน</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() . 'program/manage_pogram' ?>">จองที่นั่งสอบ</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() . 'program/pogram_regis' ?>">จองที่นั่งอบรม</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() . 'program/manage_pogram' ?>">ผลการสอบ</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() . 'user' ?>">ข้อมูลส่วนตัว</a>
                                        </li>
                                        <li>
                                            <hr>
                                        </li>
                                        <li>
                                            <a class="text_head " href="<?php echo base_url() . 'login/logout' ?>">
                                                ออกจากระบบ
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                                if (count($_SESSION) < 2) {
                                    session_destroy();
                                    redirect('login', 'refresh');
                                }
                            } else {
                                ?>
                                <li>
                                    <a class="text_head" href="<?php echo base_url() . 'login' ?>">
                                        <span class="text_head">Login</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            <li id="manual">
                                <a class="" href="<?php echo base_url() . '' ?> ">
                                    <span class="text_head">คู่มือ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- JAVASCRIPTS -->
        <div style="background-color: #F7F7F7;">
            <div class="container">
                <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button>
                <script src="<?php echo base_url(); ?>assets/angular-1.8.2/angular.min.js"></script>
                <script src="<?php echo base_url() . 'js' ?>/button.js"></script>
                <script src="<?php echo base_url() . 'js' ?>/program.js"></script>
                <script src="<?php echo base_url() . 'js' ?>/user.js"></script>
                <script src="<?php echo base_url() . 'js' ?>/exam.js"></script>
                <script src="<?php echo base_url() . 'js' ?>/nav_button.js"></script>

                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/jquery/jquery-3.4.1.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/bootstrap/js/bootstrap.bundle.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/menuzord/js/menuzord.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/selectric/jquery.selectric.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/dzsparallaxer/dzsparallaxer.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/dzsparallaxer/dzsparallaxer.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/isotope/isotope.pkgd.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/revolution/js/jquery.themepunch.tools.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/revolution/js/jquery.themepunch.revolution.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/smoothscroll/SmoothScroll.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/owl-carousel/owl.carousel.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML' ?>/assets/js/map.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML' ?>/assets/js/listty.js"></script>
                <!-- <script src="<?php echo base_url() . 'theme/MDB' ?>/js/bootstrap.js"></script> -->

                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/daterangepicker/moment.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/daterangepicker/daterangepicker.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/rateyo/jquery.rateyo.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/apexcharts/apexcharts.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/fancybox/jquery.fancybox.min.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/flot/jquery.flot.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML/assets/plugins' ?>/flot/jquery.flot.time.js"></script>
                <script src="<?php echo base_url() . 'theme/listty-2-2/Static HTML' ?>/assets/js/chart.js"></script>

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


                <script src="<?php echo base_url() . 'js' ?>/date_custom.js"></script>
                <?php
                function DateThaiNotTime($strDate)
                {
                    $strYear = date("Y", strtotime($strDate)) + 543;
                    $strMonth = date("n", strtotime($strDate));
                    $strDay = date("j", strtotime($strDate));
                    $strHour = date("H", strtotime($strDate));
                    $strMinute = date("i", strtotime($strDate));
                    $strSeconds = date("s", strtotime($strDate));
                    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                    $strMonthThai = $strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear";
                }

                function DateThai($strDate)
                {
                    $strYear = date("Y", strtotime($strDate)) + 543;
                    $strMonth = date("n", strtotime($strDate));
                    $strDay = date("j", strtotime($strDate));
                    $strHour = date("H", strtotime($strDate));
                    $strMinute = date("i", strtotime($strDate));
                    $strSeconds = date("s", strtotime($strDate));
                    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                    $strMonthThai = $strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
                }
                $strDate = date("Y-m-d h:i:s +9");
                DateThai($strDate);
                ?>
                <script>
                    var img = document.getElementById("img");
                    var size = window.screen.width;
                    // console.log(window.screen.width);
                    if (size < 1200 && size > 500) {
                        img.className = "logo_ipad";
                    } else if (size < 500) {
                        img.className = "logo_phone";
                    } else {
                        img.className = "logo_desktop";
                    }

                    //Get the button
                    var mybutton = document.getElementById("myBtn");
                    window.onscroll = function() {
                        scrollFunction()
                    };

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            mybutton.style.display = "block";
                        } else {
                            mybutton.style.display = "none";
                        }
                    }
                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>

</html>