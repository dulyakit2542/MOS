<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script>
        // base_url ใช้กับ js
        var base_url = '<?php echo base_url(); ?>';
    </script>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?php echo base_url() . 'files/rmuti_logo/favicon.png' ?>" type="image/png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- fONTS     -->
    <link href="<?php echo base_url() . 'theme/Fonts' ?>/promt/stylesheet.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/toaster/toastr.min.css" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/css/mono.css" />
    <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html/assets' ?>/plugins/nprogress/nprogress.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <input id="personal_id" type="text" style="display: none;" value="<?php echo $_SESSION['user_info']->personal_id; ?>">
    <script src="<?php echo base_url() . 'js' ?>/user.js"></script>


</head>
<style>
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

    span {
        font-family: 'Prompt';
        font-size: 14px;
    }

    .text_head {
        font-family: 'Prompt';
        font-size: 11pt;
        /* font-weight: bold; */
        transition: 0.1s;
        color: #D8DFE2;
        filter: alpha(opacity=100);
    }

    .text_head:hover {
        font-family: 'Prompt';
        color: orange;
        opacity: 2.0;
        /* font-weight: bold; */
        filter: alpha(opacity=100);
    }
    .text_user {
        font-family: 'Prompt';
        font-size: 11pt;
        /* font-weight: bold; */
        transition: 0.1s;
        filter: alpha(opacity=100);
    }

    .text_user:hover {
        font-family: 'Prompt';
        color: orange;
        opacity: 2.0;
        /* font-weight: bold; */
        filter: alpha(opacity=100);
    }

    .text_profile {
        font-family: 'Prompt';
        font-size: 11pt;
        font-weight: bold;
        transition: 0.3s;
        filter: alpha(opacity=100);
    }

    .text_profile:hover {
        font-family: 'Prompt';
        color: orange;
        opacity: 2.0;
        font-weight: bold;
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
        box-shadow: 0 0px 5px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);

        /* padding: 14px 80px 18px 36px; */
        /* cursor: pointer; */
    }

    .card:hover {
        /* transform: scale(1.03); */
        box-shadow: 0 0px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
    td {
            color: #424242;
            font-size: 11pt
        }
</style>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <!-- <div id="toaster"></div> -->

    <div class="wrapper">
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="">
                        <h7 style="color:white;">RMUTI.</h7>
                        <span style="color:orange;" class="brand-name">TESTCENTER </span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li>
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'home'; ?>">
                                <i class="mdi mdi-home"></i>
                                <span class="text_head">หน้าหลัก</span>
                            </a>

                        </li>
                        <li id="admin">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin'; ?>">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="text_head">Dashboard</span>
                            </a>

                        </li>


                        <li class="section-title">
                            Training
                        </li>

                        <li id="manage_room_train">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/manage_room_train'; ?>">
                                <i class="mdi mdi-passport"></i>
                                <span class="text_head">จัดการห้องอบรม</span>
                            </a>
                        </li>
                        <li id="check_training">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/training_approve'; ?>">
                                <i class="mdi mdi-account-check"></i>
                                <span class="text_head">อนุมัติการอบรม</span>
                            </a>
                        </li>




                        <li class="section-title">
                            EXAM
                        </li>

                        <li id="manage_exam_room">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/manage_exam_room'; ?>">
                                <i class="mdi mdi-square-edit-outline"></i>
                                <span class="text_head">จัดการห้องสอบ</span>
                            </a>
                        </li>
                        <li id="exam_approve">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/exam_approve'; ?>">
                                <i class="mdi mdi-account-arrow-right"></i>
                                <span class="text_head">อนุมัติเข้าสอบ/เลือกข้อสอบ</span>
                            </a>
                        </li>



                        <li class="section-title">
                            Advance
                        </li>
                        <li id="manage_pogram">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/manage_program'; ?>">
                                <i class="mdi mdi-folder-move"></i>
                                <span class="text_head">โปรแกรมในระบบ</span>
                            </a>
                        </li>
                        <li id="exam_archive">
                            <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/exam_archive'; ?>">
                                <i class="mdi mdi-floppy"></i>
                                <span class="text_head">คลังข้อสอบ</span>
                            </a>
                        </li>
                        <li id="user" class="has-sub ">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="users">
                                <i class="mdi mdi-account"></i>
                                <span class="text_head">User</span> <b class="caret"></b>
                            </a>
                            
                            <ul class="collapse" id="users" data-parent="#sidebar-menu">
                                <div class="sub-menu">


                                    <li id="user_list">
                                        <a class="sidenav-item-link" href="<?php echo base_url() . 'admin/user_list'; ?>">
                                            <span class="text_user">ดูข้อมูลผู้ใช้</span>
                                        </a>
                                    </li>
                                    <li id="user_history_exam">
                                        <a class="sidenav-item-link" href="user-activities.html">
                                            <span class="text_user">ประวัติการสอบ</span>

                                        </a>
                                    </li>

                                </div>
                            </ul>
                        </li>




                        <li class="section-title">
                            Master
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#authentication" aria-expanded="false" aria-controls="authentication">
                                <i class="mdi mdi-chart-areaspline"></i>
                                <span class="text_head">สรุปผล</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#other-page" aria-expanded="false" aria-controls="other-page">
                                <i class="mdi mdi-file-multiple"></i>
                                <span class="text_head">news</span>
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#other-page" aria-expanded="false" aria-controls="other-page">
                                <i class="mdi mdi-file-multiple"></i>
                                <span class="text_head">calendar</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">
                        <ul class="d-flex">
                            <li>
                                <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>


        <!-- ====================================
      ——— PAGE WRAPPER 
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span id="title" class="h2" style="color: #323232; font-size:14pt; font-weight: bold;"></span>

                    <div class="navbar-right ">

                        <ul class="nav navbar-nav">
                            <!-- Offcanvas -->

                            <li class="custom-dropdown">
                                <button class="notify-toggler custom-dropdown-toggler">
                                    <i class="mdi mdi-bell-outline icon"></i>
                                    <span class="badge badge-xs rounded-circle">21</span>
                                </button>
                                <div class="dropdown-notify">

                                    <header>
                                        <div class="nav nav-underline" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="all-tabs" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true">การแจ้งเตือน</a>

                                        </div>
                                    </header>

                                    <div class="" data-simplebar style="height: 325px;">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tabs">

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/img/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult behaviour he of. On disposal of as landlord horrible. Afraid at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/img/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your contact.</span>
                                                            <div class="buttons">
                                                                <a href="#" class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#" class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <footer class="border-top dropdown-notify-footer">
                                        <div class="d-flex justify-content-between align-items-center py-2 px-4">
                                            <span>Last updated 3 min ago</span>
                                            <a id="refress-button" href="javascript:" class="btn mdi mdi-cached btn-refress"></a>
                                        </div>
                                    </footer>
                                </div>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <div id="get_user_img"></div>
                                    <span class="d-none d-lg-inline-block"><?php echo $_SESSION['user_info']->fname_en . ' ' . $_SESSION['user_info']->lname_en; ?></span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="<?php echo base_url() . 'user'; ?>">
                                            <div class="text_profile">
                                                <i class="mdi mdi-account-outline"></i>
                                                <span class="nav-text">My Profile</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="<?php echo base_url() . 'login/logout'; ?>">
                                            <div class="text_profile">
                                                <i class="mdi mdi-logout"></i> Log Out
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>
            <script>
                console.log(window.location.href);
                console.log(base_url);
                var url = window.location.href;
                if (url == base_url + 'admin') {
                    document.getElementById("admin").className = "active";
                    document.getElementById("title").innerHTML = "Dashboard";

                } else if (url == base_url + 'admin/manage_room_train') {
                    document.getElementById("manage_room_train").className = "active";
                    document.getElementById("title").innerHTML = "จัดการห้องอบรม";

                } else if (url == base_url + 'admin/training_approve') {
                    document.getElementById("check_training").className = "active";
                    document.getElementById("title").innerHTML = "อนุมัติการอบรม";

                } else if (url == base_url + 'admin/manage_exam_room') {
                    document.getElementById("manage_exam_room").className = "active";
                    document.getElementById("title").innerHTML = "จัดการห้องสอบ";

                } else if (url == base_url + 'admin/manage_program') {
                    document.getElementById("manage_pogram").className = "active";
                    document.getElementById("title").innerHTML = "โปรแกรมในระบบ";

                } else if (url == base_url + 'admin/exam_archive') {
                    document.getElementById("exam_archive").className = "active";
                    document.getElementById("title").innerHTML = "ชุดข้อสอบในคลัง";

                } else if (url == base_url + 'admin/user_list') {
                    document.getElementById("title").innerHTML = "ดูข้อมูลผู้ใช้";

                }
            </script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/simplebar/simplebar.min.js"></script>
            <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/apexcharts/apexcharts.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/daterangepicker/moment.min.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
            <script>
                jQuery(document).ready(function() {
                    jQuery('input[name="dateRange"]').daterangepicker({
                        autoUpdateInput: false,
                        singleDatePicker: true,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });
                    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
                    });
                    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                        jQuery(this).val('');
                    });
                });
            </script>
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/plugins/toaster/toastr.min.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/js/mono.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/js/chart.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/js/map.js"></script>
            <script src="<?php echo base_url() . 'theme/mono-v1.2/mono-static-html' ?>/assets/js/custom.js"></script>
            <script src="<?php echo base_url() . 'js' ?>/date_custom.js"></script>
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button>

            <?php
            function DateThaiNotTime1($strDate)
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
                return "$strDay $strMonthThai $strYear, เวลา $strHour.$strMinute น.";
            }
            ?>
            <script>
                //Get the button
                var mybutton = document.getElementById("myBtn");
                // When the user scrolls down 20px from the top of the document, show the button
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