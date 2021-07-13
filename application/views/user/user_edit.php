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
		$id = $_SESSION['user_info']->user_id;
		?>
		<main>
			<div class="container ">
				<section class="section team-section">
					<div class="row text-center">
						<div class="col-md-4 mb-4">
							<div class=" card profile-card">
								<?php
								$imgp = $user[0]->user_image;
								$prefix = $user[0]->prefix;
								if ($imgp == null) {
									if ($prefix == 'นาย') {
								?>
										<div class="avatar z-depth-1-half mb-4">
											<img style="width: 120pt; height: 120pt; object-fit: contain;" class="rounded-circle" src="files/user_img/male.jpg">
										</div>
									<?php
									} elseif ($prefix == 'นาง' || $prefix == 'นางสาว') {
									?>
										<div class="avatar z-depth-1-half mb-4">
											<img style="width: 120pt; height: 120pt; object-fit: contain;" class="rounded-circle" src="<?php echo base_url() . 'files/user_img' ?>/female.jpg">
										</div>
									<?php
									}
								} else {
									?>
									<div class="avatar z-depth-1-half mb-4">
										<img style="width: 120pt; height: 120pt; " src="<?php echo base_url() . 'files/user_img' ;?>/<?php echo $user[0]->user_image ?>">
									</div>
								<?php } ?>
								<div class="card-body pt-0 mt-0">
									<form class="px-6" action="<?php echo base_url().'upload';?>"" method="post" id="user_img" enctype="multipart/form-data">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="img" id="img_profile" lang="es" value="" required accept="image/*">
											<label class="custom-file-label" for="img">เลือกรูปภาพ </label>
											<h6 align="center" style="color: red; font-size: 10pt;">กรุณาเปลี่ยนชื่อรูปภาพตามชื่อจริง</h6>
										</div>
									</form>
								</div>
								<div class="card-body pt-0 mt-0">
									<h4 class="h6 mb-3 font-weight-bold"><strong><?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->prefix, $_SESSION['user_info']->fname, '   ', $_SESSION['user_info']->lname . '</strong>'; ?></strong></h4>
									<h6 class="font-weight-bold cyan-text mb-4 h6">สถานะ : <?php echo '<strong style="color:;">' . $_SESSION['permission'][0]->text_type . '</strong>'; ?>
									</h6>
								</div>
							</div>
						</div>
						<div class="col-md-8 mb-4">
							<div class="card card-cascade cascading-admin-card user-card">
								<div class="admin-up d-flex justify-content-start">
									<div class="data"> <br>
										<h5 class="font-weight-bold dark-grey-text h6" style="font-size: 20px;">ข้อมูลส่วนตัว<span class="text-muted">
											</span></h5>
									</div>
								</div>
								<div class="card-body card-body-cascade" style="text-align: left; margin-left: 10px;">
									<div class="row">
										<div class="col-lg-12">
											<div class="md-form form-sm mb-0">
												<h6 class="h6" style="color:red">**กรณีต้องการแก้ไขข้อมูลส่วนตัวกรุณาติดต่อสํานักวิทยบริการและเทคโนโลยีสารสนเทศ**</h6>
											</div>
										</div>

										<div class="col-lg-5">
											<div class="md-form form-sm mb-0">
												<h6 class="h6"> ชื่อ : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->prefix, $_SESSION['user_info']->fname, '   ', $_SESSION['user_info']->lname . '</strong>'; ?>
												</h6>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="md-form form-sm mb-0">
												<h6 class="h6"> รหัสประจำตัวประชาชน : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->personal_id . '</strong>'; ?>
												</h6>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="md-form form-sm mb-0">
												<h6 class="h6"> รหัสนักศึกษา : <?php echo '<strong style="color:#000169;">' . $_SESSION['user_info']->student_id . '</strong>'; ?>
												</h6>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="md-form form-sm mb-0">
												<h6 class="h6"> สาขา : <?php echo '<strong style="color:#000169;">' . $section[0]->name . '</strong>'; ?>
												</h6>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="md-form form-sm mb-0">
												<h6 class="h6"> คณะ : <?php echo '<strong style="color:#000169;">' . $faculty[0]->name . '</strong>'; ?>
												</h6>
											</div>
											<br>
											<hr>
										</div>
										<div class="col-lg-12">
											<div class="md-form form-sm mb-0">
												<h6 class="h6"> <strong> ข้อมูลติดต่อ </strong>
												</h6>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="md-form form-sm mb-0">
												<h6 class="h6" style="text-align:left"> เบอร์มือถือ : </h6>
												<input type="text" id="phone" style="text-align:left" value="<?php echo $user[0]->phone;  ?>">
												</h6>
											</div>
										</div>
										<div class="col-lg-5">
											<div class="md-form form-sm mb-0">
												<h6 class="h6" style="text-align:left"> อาจารย์ที่ปรึกษา : </h6>
												<input type="text" id="advisor" style="text-align:left" value="<?php echo $user[0]->advisor; ?>">
												</h6>
											</div>
										</div>
										<div class="card-body pt-0 mt-0" align="center">
											<br><br>
											<a href="<?php echo base_url() . 'user' ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> กลับ </button></a>
											<a class="h6 btn aqua-gradient btn-rounded waves-effect waves-light" onclick="user_edit('<?php echo $_SESSION['user_info']->user_id ?>')"><i class="far fa-save"></i><strong> บันทึกข้อมูล </strong></a>
										</div>
									</div>
	
									<div class="row"></div>
								</div>
							</div><br><br>
						</div>

					</div>
				</section>
			</div>
		</main>
	</body>
	<script>
        document.getElementById('user').style.color = "#FF6100";
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$("#btnfile").click(function() {
			$("#uploadfile").click();
		});
	</script>

	</html>
<?php
	// echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';
} else {
	redirect('home');
} ?>