<head>
    <title>หน้าหลัก : Testcenter</title>
</head>
<script src="<?php echo base_url() . 'js/' ?>program.js"></script>
<style>
    .card1 {
        background-color: white;
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        cursor: pointer;
    }

    .card1:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }

    @media(max-width: 990px) {
        .card {
            margin: 20px;
        }
    }
</style>
<!-- <?php
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>"; 
        ?> -->

<body id="body" class="up-scroll">
    <div class="container ">
        <br>
        <section>
            <div class="row pb-12">
                <div class="col-sm-8 mb-4">
                    <div id="carousel-example-1z" class="carousel slide  " data-ride="carousel" style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0px 0px 10px 0 rgba(0, 0, 0, 0.19); border-radius: 5px;">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img style=" border-radius: 5px; background-size:cover;width:50%; object-fit: contain;" src="files/microsoft/mini/word.png" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img style="border-radius: 5px; background-size:cover;width:50%; object-fit: contain;" src="files/microsoft/mini/excel.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img style="border-radius: 5px; background-size:cover;width:50%; object-fit: contain;" src="files/microsoft/mini/powerpoint.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <section>
                        <div class="card1">
                            <div class="view view-cascade overlay">
                                <img style="border-top-left-radius: 5px; border-top-right-radius: 5px;" src="<?php echo base_url() . 'files/microsoft/co1.jpg' ?>" class="card-img-top" alt="">
                                <a>
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
            </div><br>

            <div class="row">
                <!-- Visits -->
                <div class="col-sm-4" style="display: flex;align-items: center;">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h6 class="h6 " style="justify-content:center; font-size: 12pt;"><strong>ผู้เข้าสอบทั้งหมด</strong></h6>
                            <span class="badge badge-primary">total</span>
                        </div>

                        <div class="card-body widget-content">
                            <!-- <span class="widget-content-title"><?php echo count($history_user); ?></span> -->
                            <span class="widget-content-title">4,530</span>

                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Everyone who took the exam.</p>
                                <span class="text-success"> 13% <i class="fas fa-level-up-alt" aria-hidden="true"></i> </span>
                            </div>
                            <a href="#" class="btn btn-link">All listing</a>
                        </div>
                    </div>
                </div>

                <!-- Growth -->
                <div class="col-sm-4" style="display: flex;align-items: center;">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h6 class="h6 " style="justify-content:center; font-size: 12pt;"><strong>เปอร์เซ็นต์การสอบผ่าน</strong></h6>
                            <span class="badge badge-primary">total</span>
                        </div>

                        <div class="card-body widget-content">
                            <span class="widget-content-title">96%</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Compared to last year.</p>
                                <span class="text-danger"> 5% <i class="fas fa-level-up-alt" aria-hidden="true"></i> </span>
                            </div>
                            <a href="#" class="btn btn-link">See Growth</a>
                        </div>
                    </div>
                </div>

                <!-- Bookings -->
                <div class="col-sm-4" style="display: flex;align-items: center;">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h6 class="h6 " style="justify-content:center; font-size: 12pt;"><strong>กำลังอบรมอยู่ในขณะนี้</strong></h6>
                            <span class="badge badge-primary">total</span>
                        </div>

                        <div class="card-body widget-content">
                            <span class="widget-content-title">243</span>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-0">Compared to last round.</p>
                                <span class="text-success"> 6% <i class="fas fa-level-up-alt" aria-hidden="true"></i> </span>
                            </div>
                            <a href="#" class="btn btn-link">All Bookings</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container col-sm-12">
        <hr>
        <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-5" aria-label="breadcrumb">
            <h2 class="h6" style="font-size:18pt"><strong>โปรแกรมที่เปิดอบรม</strong></h2>
            <ul class="list-unstyled d-flex p-0 m-0">
                <li class="h6"><a href="<?php echo base_url() . 'program/list_program'; ?>"><strong>ดูทั้งหมด</strong></a></li>
            </ul>
        </nav>
        <div id="get_program" class="row pb-4">
        </div>
        </section>
    </div>
    <br>
    <br>
    </div>
    <script src="<?php echo base_url() . 'js' ?>/home.js"></script>
    <script>
        document.getElementById('home').style.color = "#FF6100";
    </script>
</body>