<title>โปรแกรมที่ลงทะเบียน</title>
<?php
//วันที่
$strDate = date("Y-m-d h:i:s");
DateThai($strDate);

//ตรวจสอบสิทธิ์
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
?>
	<html lang="en">
	<style>
		.card2 {
			background-color: white;
			margin: center;
			align-items: center;
			align-content: center;
			border-radius: 5px;
			box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
			cursor: pointer;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<body>
		<section class="pt-7 pt-md-5">
			<div class="container">
				<nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
					<strong>
						<h2 class="h2" style="color: #323232; font-size:16pt;"><strong> โปรแกรมที่ลงทะเบียน</strong></h2>
					</strong>

					<ul class="list-unstyled d-flex p-1 m-1">
						<li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">โปรแกรมที่ลงทะเบียน</li>
					</ul>
				</nav>
				<div class="md-form form-sm mb-0">
					<h6 class="h6"> ชื่อ : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->prefix, $_SESSION['user_info']->fname, '   ', $_SESSION['user_info']->lname . '</strong>'; ?>
					</h6>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="md-form form-sm mb-0">
					<h6 class="h6"> รหัสประจำตัวประชาชน : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->personal_id . '</strong>'; ?>
					</h6><br>
				</div>
			</div>
			<div class="row justify-content-center">
				<?php
				$pc = count($train_member);
				if ($pc < 1) {
				?>
					<div class="col-lg-12"><br><br>
						<h6 class="h6">
							<center>"คุณยังไม่ได้ลงทะเบียนอบรม กรุณาลงทะเบียนอบรมแล้วเข้ามาตรวจสอบอีกครั้ง"</center>
						</h6>
					</div>
					<?php
				} elseif ($pc >= 1) {
					$ce = count($exam_member);
					if ($ce > 0) { ?>
						<?php
						foreach ($exam_member as $p) { ?>
							<div class="col-md-6 col-lg-4">
							
								<div class="card rounded-0 card-hover-overlay">
									<div class="position-relative">
										<img class="card-img rounded-0" src="<?php echo base_url() . 'files/microsoft/' . $p->program_imge; ?>" alt="Card image cap">
										<div class="card-img-overlay">
											<h3>
												<a class="h6" style="font-size: 14pt;">
													<?php echo $p->program_name; ?> <i class="fa fa-check-circle" aria-hidden="true"></i>
												</a>
											</h3>
											<?php
											$date = $p->exam_room_date;
											?>
											<p class="text-white"> Date : <?php echo $date; ?></p>
											<p class="text-white"> Time : <?php echo $p->exam_room_time; ?></p>

										</div>
									</div>
									<div class="card-footer bg-transparent">
										<h6 class="h6" style="justify-content: center; align-items: center;">
											วันที่สอบ : <strong><span><?php echo DateThaiNotTime($date); ?></span></strong>
										</h6>
										<h6 class="h6" style="justify-content: center; align-items: center;">
											เวลาสอบ : <strong><?php echo $p->exam_room_time; ?> น.</strong>
										</h6>
										<h6 class="h6" style="justify-content: center; align-items: center;">
											สถานที่สอบ : <strong><?php echo $p->exam_room_address; ?></strong>
										</h6>
										<?php
										if ($p->exam_member_status == 'wait') {
										?>
											<input type="text" style="display:none;" id="date" value="<?php echo $p->exam_member_date; ?>">
										<?php
											echo '<h5 class="h6">ลงทะเบียนเมื่อ : <strong style="color:#006EFF;"><span id="get_date"></span></strong></h5>';
											echo '<h5 class="h6">สถานะ : <strong style="color:#006EFF;">รอเจ้าหน้าที่อนุมัติ</strong></h5>';
										} elseif ($p->exam_member_status == 'waiting_exam') {
										?>
											<input type="text" style="display:none;" id="date" value="<?php echo $p->admin_date; ?>">
										<?php
											echo '<h5 class="h6">สถานะ : <strong style="color:#006EFF;">สามารถเข้าสอบได้</strong></h5>';
											echo '<h5 class="h6">อนุมัติเมื่อ : <strong style="color:#006EFF;"><span id="get_date"></span></strong></h5>';
											echo '<h5 class="h6" style="color:red;">กรุณาเข้าสอบตามวันและเวลาที่กำหนด</h5>';
											echo '<h5 class="h6" style="color:red;">หากไม่เข้าสอบถือว่าสละสิทธิ์ในการสอบ1ครั้ง</h5>';
										} else {
										}
										?>
										<div class="d-flex flex-row-reverse bd-highlight">
											<!-- embed code -->
											<input type="text" style="display:none" id="exam_room_id" value="<?php echo $p->exam_room_id; ?>" />
											<input type="text" style="display:none" id="exam_member_status" value="wait" />

											<!-- <?php echo $_SESSION["user_info"]->personal_id; ?> -->
											<!-- <?php echo $p->exam_room_id; ?> -->
											<input type="text" style="display:none" id="personal_id" value="<?php echo $_SESSION["user_info"]->personal_id; ?>">
											<!-- embed code -->
											<div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<?php }
						} else {
							foreach ($train_member as $p) {
							?>
								<div class="col-md-6 col-lg-4">
									<div class="card2">
										<div class="view view-cascade overlay">
											<img style="border-top-left-radius: 5px; border-top-right-radius: 5px;" src="<?php echo base_url() . 'files/microsoft/' . $p->program_imge ?>" class="card-img-top" alt="">
											<a>
												<div class="mask rgba-white-slight"></div>
											</a>
										</div>
										<form action="" method="POST">
											<div class="card-body card-body-cascade text-center">
												<h5 class="h6"><strong> <?php echo $p->program_name; ?> </strong></h5>
												<h5 class="h6">กลุ่มลงทะเบียน : <strong><?php echo $p->program_room; ?> </strong></h5>
												<?php
												$date = $p->status_train_date;
												$status = null;
												$status = $p->status_train;
												?>

												<input type="text" style="display:none;" id="status_train" value="<?php echo $status; ?>">
												<?php
												if ($p->status_train == 'pass') {
												?>
													<input type="text" style="display:none;" id="date" value="<?php echo $date; ?>">
													<h5 class="h6">สถานะ : <strong style="color:green;">ผ่านการอบรม<h5></strong>
														<h5 class="h6">อนุมัติเมื่อ : <strong><span id="get_date"></span></h5></strong><br>
													<?php
												} else if ($p->status_train == 'notpass') {
													?>
														<input type="text" style="display:none;" id="date" value="<?php echo $date; ?>">
														<h5 class="h6">สถานะ : <strong style="color:red;">ไม่ผ่านการอบรม<h5></strong>
															<h5 class="h6">อนุมัติเมื่อ : <strong><span id="get_date"></span></h5></strong>
															<h5 class="h6"><strong style="color:red;">หากต้องการอบรมอีกครั้งกรุณา<h5></strong>
															<h5 class="h6"><strong style="color:red;">กดยกเลิกลงทะเบียนแล้วลงทะเบียนใหม่<h5></strong>

															<?php
														} else if ($p->wait_for_test == 'wait') {
															?>
																<input type="text" style="display:none;" id="date" value="<?php echo $p->wait_date_for_test;; ?>">
																<h5 class="h6">ยืนยันการอบรมเมื่อ : <strong style="color:#006EFF;"><span id="get_date"></span>
																		<h5>
																	</strong>
																	<h5 class="h6">สถานะ : <strong style="color:#006EFF;">รอเจ้าหน้าที่ตรวจสอบ<h5></strong>
																	<?php
																} else if ($p->status_train == '') {
																	$date = $p->date;

																	?>
																		<input type="text" style="display:none;" id="date" value="<?php echo $date; ?>">
																		<h5 class="h6">สถานะ : <strong>กำลังอบรม<h5></strong>
																			<h5 class="h6">ลงทะเบียนเมื่อ : <strong><span id="get_date"></span>
																					<h5>
																				</strong>
																			<?php
																		}
																			?>
																			<br>
																			<?php
																			if ($p->status_train == 'pass') {
																				$id = $p->program_type_id;
																			?>
																				<a onclick="exam_page(<?php echo $id; ?>)"><strong class="h6 btn btn-info btn-green"> <i class="fas fa-sign-in-alt"></i> ลงทะเบียนเข้าสอบ </strong> </a>
																				<a><strong class="h6 btn btn-info btn-red" onclick="program_member_can(<?php echo $p->program_member_id; ?>)"> <i class="fas fa-ban"></i> ยกเลิกการลงทะเบียน </strong> </a>
																			<?php
																			} else if ($p->status_train == 'notpass') {
																			?>
																				<a><strong class="h6 btn btn-info btn-red" onclick="program_member_can(<?php echo $p->program_member_id; ?>)"> <i class="fas fa-ban"></i> ยกเลิกการลงทะเบียน </strong> </a>
																			<?php
																			} else if ($p->wait_for_test == 'wait') {
																			?>
																				<a><strong class="h6 btn btn-info btn-green" aria-disabled="">รอการตรวจสอบ </strong> </a>
																			<?php
																			} else if ($p->status_train == '') {
																			?>

																				<input type="text" style="display:none" id="status" value="wait" />
																				<a><strong class="h6 btn btn-info btn-green" onclick="program_train_regis(<?php echo $p->program_member_id; ?>)"> <i class="fas fa-sign-in-alt"></i> ยืนยันการอบรม </strong> </a>
																				<a><strong class="h6 btn btn-info btn-red" onclick="program_member_can(<?php echo $p->program_member_id; ?>)"> <i class="fas fa-ban"></i> ยกเลิกการลงทะเบียน </strong> </a>
																			<?php
																			}  ?>
										</form>
									</div>
								</div> <?php
									}
								}
							} ?>
			</div>
			<div class="col-lg-12">
				<div class="md-form form-sm mb-0"><br>
					<h6 style="color:red">
						**หมายเหตุ**
					</h6>
					<h6 style="color:red">
						- ผู้ใช้งานสามารถลงทะเบียนได้ 1 โปรแกรมเท่านั้น หากต้องการเปลี่ยนโปรแกรมที่ต้องการอบรมกรุณายกเลิกการลงทะเบียนปัจจุบันของท่านก่อน
					</h6>
					<h6 style="color:red">
						- เมื่อทำแบบทดสอบหลังอบรมเสร็จสิ้น กรุณาคลิกที่ปุ่ม "ยืนยันการอบรม"
					</h6>
					<h6 style="color:red">
						- หากยืนยันการอบรมแล้วจะไม่สามารถแก้ไขได้ จนกว่าเจ้าหน้าที่จะตรวจสอบเสร็จสิ้น
					</h6>
					<h6 style="color:red">
						- ผู้ใช้มีสิทธิ์เข้าสอบ 3 ครั้งเท่านั้น หากครั้งที่ 3 สอบไม่ผ่านจะต้องรอลงทะเบียนใหม่ครั้งถัดไป
					</h6>
				</div>
			</div>
		</section><br>
	</body>
	<script src="<?php echo base_url() . 'js' ?>/date_custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		// console.log(ce);

		var date = document.getElementById("date").value;
		document.getElementById("get_date").innerHTML = dateThaiJs(date);

		

		// console.log(dateThai2(date));
	</script>
<script>
        document.getElementById('user').style.color = "#FF6100";
    </script>
	</html>
<?php
	// echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';
} else {
	redirect('program/error404');
} ?>

</div>