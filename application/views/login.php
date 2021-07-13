<!-- style -->

<link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . 'theme/MDB' ?>/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . 'theme/MDB' ?>/css/mdb.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/fullcalendar.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . 'theme/Fonts' ?>/promt/stylesheet.css" rel="stylesheet" />
<!-- style -->

</head>

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
    }

    .h6 {
        font-family: 'promptlight';
    }
</style>

<!-- <script type="text/javascript"  src="<?php echo base_url(). 'Js' ?>/login.js"></script> -->
    <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
                    <form action="<?php echo base_url().'login/check_login' ?>" method="POST"  onsubmit="return login()" id="formlogin">
                        <!-- Form with header -->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="form-header purple-gradient">
                                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Log in:</h3>
                                </div>
                                
                                <!-- Body -->
                                <div class="md-form">
                                    <i class="fas fa-user prefix white-text"></i>
                                    <input type="text" id="username" name="username" class="form-control">
                                    <label for="orangeForm-name">Your name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fas fa-lock prefix white-text"></i>
                                    <input type="password" id="password" name="password" class="form-control">
                                    <label for="orangeForm-pass">Your password</label>
                                </div>

                                <div class="text-center">
                                    <button class="btn purple-gradient btn-lg" type="submit" >Sign up</button>
                                    <hr class="mt-4">
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                        <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text"></i></a>
                                        <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text"> </i></a>
                                        <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Form with header -->
                    </form>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/vendor/fullcalendar-3.10.0/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() . 'theme/MDB' ?>/js/mdb.js"></script>

<script src="<?php echo base_url() . 'theme/js' ?>/java.js"></script>
<!-- MDB core JavaScript -->
<script>
    function login (){
    const username = document.getElementById('username').value
    const password = document.getElementById('password').value  
    console.log(username, password);
    if(username == '' || password == ''){
        // เขียนเตือนฟอร์ม
        alert('กรุณากรอกข้อมูล');
        return false ;
    }else{
        // ทำการส่งข้อมูล
        return true ;
    }
    // alert('aaa');
}
</script>
<script type="text/javascript">
    new WOW().init();
</script>
