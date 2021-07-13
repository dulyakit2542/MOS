<title>ลงทะเบียนสอบ</title>
<?php
// date
$strDate = date("Y-m-d h:i:s");
DateThai($strDate);
$permission_user = false;
if (count($_SESSION) > 1) {
    foreach ($_SESSION['permission'] as $row) {
        if ($row->text_type == 'user') {
            $permission_user = true;
        }
    }
}
$permission_admin = false;
if (count($_SESSION) > 1) {
    foreach ($_SESSION['permission'] as $row) {
        if ($row->text_type == 'admin') {
            $permission_admin = true;
        }
    }
}
if ($permission_user || $permission_admin) {
    if (count($check_status) > 1) {

        // echo '<pre>';
        // var_dump($program);
        // echo '</pre>';
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <section class="pt-7 pt-md-5">
            <div class="container">
                <div class="section-title">
                    <h6 class="h6" style="font-size: 16pt;"><strong>กรุณาเลือกห้องสอบ</strong></h6>
                </div>

                <div class="row justify-content-center">
                    <?php
                    foreach ($program as $p) { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card rounded-0 card-hover-overlay">
                                <div class="position-relative">
                                    <img class="card-img rounded-0" src="<?php echo base_url() . 'files/microsoft/' . $p->program_imge; ?>" alt="Card image cap">
                                    <div class="card-img-overlay">
                                        <h3>
                                            <a  class="h6" style="font-size: 14pt;">
                                                <?php echo $p->program_name; ?> <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </a>
                                        </h3>
                                        <p class="text-white"> Date : <?php echo $p->exam_room_date; ?></p>
                                        <p class="text-white"> Time : <?php echo $p->exam_room_time; ?></p>

                                    </div>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <h6 class="h6" style="justify-content: center; align-items: center;">
                                    <?php
                                    $date = $p->exam_room_date;
                                    ?>
                                        <strong>วันที่สอบ : <?php echo DateThaiNotTime($date);?></strong>
                                    </h6>
                                    <h6 class="h6" style="justify-content: center; align-items: center;">
                                        <strong>เวลาสอบ : <?php echo $p->exam_room_time; ?></strong>
                                    </h6>
                                    <h6 class="h6" style="justify-content: center; align-items: center;">
                                        <strong>สถานที่สอบ : <?php echo $p->exam_room_address; ?></strong>
                                    </h6>
                                    <h6 class="h6" style="justify-content: center; align-items: center;">
                                        <strong>ลงทะเบียนแล้ว : <?php echo 'test' . '/' . $p->exam_room_max; ?> คน</strong>
                                    </h6>
                                    <div class="d-flex flex-row-reverse bd-highlight">
                                        <!-- embed code -->
                                        <input type="text" style="display:none" id="exam_room_id" value="<?php echo $p->exam_room_id;?>" />
                                        <input type="text" style="display:none" id="exam_member_status" value="wait" />

                                        <!-- <?php echo $_SESSION["user_info"]->personal_id;?> -->
                                        <!-- <?php echo $p->exam_room_id;?> -->
                                        <input type="text" style="display:none" id="personal_id" value="<?php echo $_SESSION["user_info"]->personal_id; ?>">
                                        <!-- embed code -->
                                        <div>
                                            <a class="btn btn-dark-green waves-effect waves-light h6" style="color: white;font-size:11pt;" onclick="exam_register()">
                                                ลงทะเบียน
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <?php } ?>
                </div>
            </div>
        </section><br>
<?php
    } else {
        redirect('program/error404');
    }
} else {
    redirect('program/error404');
} ?>