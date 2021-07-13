<title>ลงทะเบียนอบรม</title>
<?php
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<body>
		<?php
		$strDate = date("Y-m-d h:i:s");
		DateThai($strDate); ?>
		<?php
		$perid = $_SESSION['user_info']->personal_id;
		?>
		<main>
			<center>
				<div class="container ">
					<br><br>
					<section class="card" style="width: 100%;">
						<div class="row text-center">
							<div class="col-md-12 mb-4">
								<br><br>
								<center>
									<h5 class="font-weight-bold dark-grey-text h6" style="font-size: 20px; ">ยืนยันการลงทะเบียน</h5> <br>
									<img style="width: 30%; height: 20%; box-shadow: 0px 0px 5px;" src="<?php echo base_url() . "files/microsoft/" . $program[0]->program_imge; ?>" alt="">
									<!-- <?php echo $program_type[0]->program_imge; ?> -->
								</center>
								<!-- database -->
								<input type="text" style="display:none" id="train_room_id" value="<?php echo $program[0]->train_room_id; ?>" />
								<input type="text" style="display:none" id="personal_id" value="<?php echo $_SESSION['user_info']->personal_id; ?>" />



								<div class="card-body card-body-cascade" style="text-align: left; margin-left: 10px;">
									<div class="row">

										<div class="col-lg-6">
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
										<div class="col-lg-6">
											<div class="md-form form-sm mb-0">
												<h6 class="h6">โปรแกรมที่เลือก : <?php echo '<strong style="color:#000169;">' . $program[0]->program_name . '</strong>'; ?></h6>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="md-form form-sm mb-0">
												<h6 class="h6">กลุ่มอบรม : <?php echo '<strong style="color:#000169;">' .  $program[0]->train_room_name . '</strong>'; ?></h6>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="md-form form-sm mb-0">
												<?php $date = $program[0]->train_room_date_ex; ?>
												<h6 class="h6">วันที่หมดเขตลงทะเบียน : <?php echo '<strong style="color:#000169;">' .  DateThaiNotTime($date) . '</strong>'; ?></h6>
											</div>
										</div>

									</div>
									<div class="col-lg-12">
										<div class="md-form form-sm mb-0"><br>
											<h6 class="h6" style="color:red">
												**หมายเหตุ**
											</h6>
											<h6 class="h6" style="color:red">
												- ผู้ใช้งานสามารถลงทะเบียนได้ 1 โปรแกรมเท่านั้น หากต้องการเปลี่ยนโปรแกรมที่ต้องการอบรมกรุณายกเลิกการลงทะเบียนปัจจุบันของท่านก่อน
											</h6>
										</div>
									</div>
									<center>

										<div class="col-lg-12">
											<div class="md-form form-sm mb-0">
											</div>
											<a style="text-align: center;" class="h6 btn btn-info btn-red" onclick="history.go(-1)">
												<i class="fas fa-ban"></i><strong> ยกเลิก </strong></a>
											<a style="text-align: center;" class="h6 btn btn-info btn-rounde" onclick="program_register()">
												<i class="far fa-save"></i><strong> ยืนยันการลงทะเบียน </strong></a>
											<hr>
										</div>
									</center>
								</div>
								<div class="row"></div>
							</div>
						</div>
				</div>
				</section>
				<br><br>
				</div>
			</center>
		</main>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		console.log(new Date);
	</script>

	</html>
<?php
	// echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';
} else {
?>
	<style>
		.phone {
			font-size: 18pt;
			color: #02A6E3;
		}

		.phonebody {
			font-size: 14pt;
			color: #3d4345;
		}

		.desktop {
			font-size: 26pt;
			color: #02A6E3;
		}

		.desktopbody {
			font-size: 18pt;
			color: #3d4345;
		}
	</style>
	<section class="bg-light py-10">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="text-content-404">
						<div id="head" class="mb-2" style="font-family: prompt;">คุณยังไม่ได้ลงชื่อเข้าใช้</div>
						<div id="body" class=" mb-5" style="font-family: prompt;">กรุณาลงชื่อเข้าใช้ก่อนทำการลงทะเบียน</div>
						<a href="<?php echo base_url() . 'login' ?>"> <button class="btn btn-orange btn-rounded waves-effect waves-light h2">ลงชื่อเข้าใช้</button></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		var head = document.getElementById("head");
		var body = document.getElementById("body");

		var size = window.screen.width;
		// console.log(window.screen.width);
		if (size < 1200 && size > 500) {
			head.className = "desktop";
			body.className = "desktopbody";
		} else if (size < 500) {
			head.className = "phone";
			body.className = "phonebody";
		} else {
			head.className = "desktop";
			body.className = "desktopbody";
		}
	</script>
<?php
} ?>

</div>